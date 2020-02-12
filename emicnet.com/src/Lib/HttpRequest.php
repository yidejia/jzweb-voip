<?php

namespace jzweb\voip\emicnet\Lib;

use GuzzleHttp\Client;
use jzweb\voip\emicnet\Exception\ServerException;

/**
 * 封装http请求接口
 *
 * Class HttpRequest
 * @package jzweb\voip\emicnet\Lib
 */
class  HttpRequest
{

    private $config;
    private $client;
    private $timeout = 30;

    /**
     * 构造函数
     *
     * HttpRequest constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->client = new Client(['base_uri' => $this->config['api_url'], 'timeout' => $this->timeout]);
    }


    /**
     * 构造请求访问地址
     *
     * @param string $api api访问地址
     * @param string $accountSid 账号ID或子账号ID
     * @param bool $isSubAccount 标记是否是子账号访问模式
     * @return string
     */
    private function buildRequestUrl($api, $accountSid, $isSubAccount = true)
    {
        if ($isSubAccount) {
            return sprintf("/%s/SubAccounts/%s/%s", $this->config['version'], $accountSid, $api);
        } else {
            return sprintf("/%s/Accounts/%s/%s", $this->config['version'], $accountSid, $api);
        }
    }

    /**
     * 构造签名
     *
     * @param string $accountId 账号ID或者子账号ID
     * @param string $accessToken 账户授权访问令牌
     * @param string $ts 时间戳是当前系统时间(24小时制),格式YYYYMMDDhhmmss
     * @return string
     */
    private function buildSign($accountId, $accessToken, $ts)
    {
        return strtoupper(md5($accountId . $accessToken . $ts));
    }

    /**
     * 生成报头验证信息
     * <账号Id:时间戳>，用base64编码，账号Id与SigParameter中相同
     *
     * @param string $accountId 账号ID或者子账号ID
     * @param string $ts 时间戳是当前系统时间（24小时制），格式: YYYYMMDDhhmmss,并与SigParameter中的时间戳相同
     * @return bool|string
     */
    private function authorization($accountId, $ts)
    {
        return base64_decode("$accountId:" . $ts);
    }

    /**
     * 数据XML编码
     * @param mixed $data 数据
     * @return string
     */
    private function data_to_xml($data)
    {
        $xml = '';
        foreach ($data as $key => $val) {
            $xml .= "<$key>";
            $xml .= (is_array($val) || is_object($val)) ? data_to_xml($val) : $val;
            list($key,) = explode(' ', $key);
            $xml .= "</$key>";
        }
        return $xml;
    }

    /**
     * XML编码
     * @param mixed $data 数据
     * @param string $encoding 数据编码
     * @param string $root 根节点名
     * @return string
     */
    private function xml_encode($data, $encoding = 'utf-8', $root = 'think')
    {
        $xml = '<?xml version="1.0" encoding="' . $encoding . '"?>';
        $xml .= '<' . $root . '>';
        $xml .= $this->data_to_xml($data);
        $xml .= '</' . $root . '>';
        return $xml;
    }


    /**
     * 构造请求数据
     *
     * @param string $api
     * @param array $data
     * @param bool $isSubAccount
     *
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function post($api, $data, $isSubAccount = true)
    {
        try {
            //分割API
            list($function, $operation) = explode("/", $api);
            //组装应用ID
            $data['appId'] = $this->config['appId'];
            //请求时间戳
            $ts = date("YYYYMMDDhhmmss");
            //生成签名
            $sigParameter = $this->buildSign(($isSubAccount ? $this->config['subAccountSid'] : $this->config['accountSid']), $this->config['accessToken'], $ts);
            //生成报头验证信息
            $authorization = $this->authorization(($isSubAccount ? $this->config['subAccountSid'] : $this->config['accountSid']), $ts);
            //组装请求地址
            $requestUrl = $this->buildRequestUrl($api, ($isSubAccount ? $this->config['subAccountSid'] : $this->config['accountSid']), $isSubAccount);
            //追加签名
            $requestUrl .= "?sig=" . $sigParameter;
            //转换数据
            if ($this->config['dataType'] == 2) {
                $body = $this->xml_encode($data, "UTF-8", $operation);
            } else {
                $body = json_encode([$operation => $data]);
            }
            //报文
            $res = $this->request('POST', $requestUrl, [
                'headers' => [
                    'Accept' => "application/xml",
                    'Content-Type' => 'application/xml;charset=utf-8',
                    'Content-Length' => strlen($body),
                    'Authorization' => $authorization
                ],
                'body' => $body,
            ]);
            $httpCode = $res->getStatusCode();
            //记录日志
            if ($this->config['debug']) {
                $log = "======Start " . date("Y-m-d H:i:s") . "======\n";
                $log .= "api:" . $api . "\n";
                $log .= "sign:" . $sigParameter . "\n";
                $log .= "ts=" . $ts . "\n";
                $log .= "authorization:" . $authorization . "\n";
                $log .= "request url:" . $requestUrl . "\n";
                $log .= "http code:" . $httpCode . "\n";
                if ($httpCode != 200) {
                    $log .= $res->getBody()->getContents() . "\n";
                }
                $log .= "======End " . date("Y-m-d H:i:s") . "======\n";
                @file_put_contents($this->config['cacheFilePath'], $log, FILE_APPEND);
            }
            if ($httpCode == 200) {
                $content = $res->getBody()->getContents();
            } else {
                throw  new ServerException("网络请求异常");
            }
            return $content;
        } catch (\Exception $e) {
            return ['return_code' => "FAIL", 'return_msg' => $e->getMessage()];
        }
    }


    /**
     * 构造apiPost请求
     *
     * @param string $api 请求的API
     * @param mixed $data 请求的数据
     * @param bool $isSubAccount 是否是子账号模式
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apiPost($api, $data, $isSubAccount = true)
    {
        return $this->post($api, $data, $isSubAccount);
    }


}