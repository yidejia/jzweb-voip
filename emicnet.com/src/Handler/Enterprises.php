<?php

namespace jzweb\voip\emicnet\Handler;

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

    /**
     * 创建企业用户
     *
     * @param string $appId 必填 应用Id
     * @param string $phone 必填 用户绑定电话号码，要求号码长度至少为10位，可以是手机号（以1开头），可以是固话号码（加区号，如02566687765），也可以是400和800开始的号码。替代旧版本中的mobile。
     * @param string $workNumber 选填 用户工号，与phone绑定，具有唯一性。如果不使用工号，则可以为空
     * @param string $displayName 选填 用户显示名称，不输入时用用户绑定号码代替。
     * @param string $directNumber 选填 用户直线号码，只在用户需要绑定直线时使用
     * @param int $callTime 选填 用户呼叫时间限制（分钟）
     * @param string $password 选填 用户密码 （必须是字母和数字的组合；至少包含一个字母；至少包含一个数字；长度范围为6-20。如果不输入密码，密码被默认设置为“123456”）
     * @param string $number 选填 用户分机号（如果不指定分机号，系统将会自动随机分配一个分机号）
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createUser($appId, $phone, $workNumber = "", $displayName = "", $directNumber = "", $callTime = "", $password = "", $number = "")
    {
        if (!$appId) {
            return ['return_code' => "FAIL", 'return_msg' => "应用ID输入不能为空"];
        }
        if (!$phone) {
            return ['return_code' => "FAIL", 'return_msg' => "用户绑定电话号码输入不能为空"];
        }


        return $this->httpRequest->apiPost("Enterprises/createUser", array_filter([
                'appId' => $appId,
                'workNumber' => $workNumber,
                'phone' => $phone,
                'displayName' => $displayName,
                'directNumber' => $directNumber,
                'callTime' => $callTime,
                'password' => $password,
                'number' => $number,
            ])
        );
    }

    /**
     * 更新企业用户工号
     * 存在就更新/不存在就添加
     *
     * @param string appId 应用ID
     * @param string $number 用户分机号（输入条件） 必选
     * @param string $workNumber 工号 必选
     */
    public function updateWorkNumber($appId, $number, $workNumber)
    {
        if (!$appId) {
            return ['return_code' => "FAIL", 'return_msg' => "应用ID输入不能为空"];
        }
        if (!$number) {
            return ['return_code' => "FAIL", 'return_msg' => "用户分机号输入不能为空"];
        }
        if (!$workNumber) {
            return ['return_code' => "FAIL", 'return_msg' => "工号输入不能为空"];
        }

        return $this->httpRequest->apiPost("Enterprises/updateWorkNumber", [
                'appId' => $appId,
                'number' => $number,
                'workNumber' => $workNumber
            ]
        );
    }


}