<?php

namespace jzweb\voip\emicnet\Handler;

use jzweb\voip\emicnet\Exception\ClientException;
use jzweb\voip\emicnet\Handler\BaseRequest;

/**
 * 企业管理
 *
 * Class Applications
 * @package jzweb\voip\emicnet\Handler
 */
class Enterprises extends BaseRequest
{
    /**
     * 构造函数
     * Applications constructor.
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);
    }


    /**
     * 绑定云总机企业
     *
     * @param string appId 应用ID
     * @param string $switchNumber 云总机企业总机号码（必须带区号，首字符为‘0’）必选
     * @param string $workNumber 云总机企业管理员用户名用于校验绑定的企业是否是用户的必选
     * @param string $number 云总机企业管理员名称 必选
     * @param string $password 云总机企业管理员密码 必选
     * @param int $chargeMode 计费模式：0-应用计费（默认）；1-云总机开放平台计费可选
     * @param string $userData 用户私有数据，可用于通话状态推送鉴别 可选
     * @param string $callreqUrl 用户呼叫请求和鉴权服务器 Url。 可选
     */
    public function addEnterprise($appId, $switchNumber, $number, $password, $chargeMode = 0, $userData = "", $callreqUrl = "")
    {
        if (!$appId) {
            return ['return_code' => "FAIL", 'return_msg' => "应用ID输入不能为空"];
        }
        if (!$switchNumber) {
            return ['return_code' => "FAIL", 'return_msg' => "坐席工号输入不能为空"];
        }
        if (!$number) {
            return ['return_code' => "FAIL", 'return_msg' => "云总机企业管理员账号输入不能为空"];
        }
        if (!$password) {
            return ['return_code' => "FAIL", 'return_msg' => "云总机企业管理员密码输入不能为空"];
        }

        return $this->httpRequest->apiPost("Enterprises/addEnterprise", [
                'appId' => $appId,
                'switchNumber' => $switchNumber,
                'number' => $number,
                'password' => $password,
                'chargeMode' => $chargeMode,
                'userData' => $userData,
                'callreqUrl' => $callreqUrl
            ]
        );
    }


}