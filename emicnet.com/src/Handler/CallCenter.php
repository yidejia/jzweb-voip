<?php

namespace jzweb\voip\emicnet\Handler;

use jzweb\voip\emicnet\Exception\ClientException;
use jzweb\voip\emicnet\Handler\BaseRequest;

/**
 * 呼叫中心
 *
 * Class CallCenter
 * @package jzweb\voip\emicnet\Handler
 */
class CallCenter extends BaseRequest
{
    /**
     * 构造函数
     *
     * CallCenter constructor.
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * 签入
     * 用户可通过本接口实现座席的签入，从而使座席进入可服务模式。
     * 通过 HTTPS POST 方式提交要求。
     *
     * @param string $workNumber 坐席工号
     * @param int $gid 坐席所属技能组 id（在座席属于多个技能组的情况下，指定当前登录技能组）
     * @param int $type 0-VOIP 模式或回拨话机（默认）1-sip 话机
     * @param string $deviceNumber 座席设备号码,我们统一采用默认值即可
     * @return array
     */
    public function signIn($workNumber, $gid = 0, $type = 0, $deviceNumber = "")
    {
        if (!$workNumber) {
            return ['return_code' => "FAIL", 'return_msg' => "坐席工号输入不能为空"];
        } else {
            return $this->httpRequest->apiPost("/CallCenter/signIn", [
                    'workNumber' => $workNumber,
                    'gid' => $gid,
                    'type' => $type,
                    'deviceNumber' => $deviceNumber
                ]
            );
        }
    }

    /**
     * 签出
     * 用户可通过本接口实现座席的签入，从而使座席进入可服务模式。
     * 通过 HTTPS POST 方式提交要求。
     *
     * @param string $workNumber 坐席工号
     * @return array
     */
    public function signOff($workNumber)
    {
        if (!$workNumber) {
            return ['return_code' => "FAIL", 'return_msg' => "坐席工号输入不能为空"];
        } else {
            return $this->httpRequest->apiPost("/CallCenter/signOff", [
                    'workNumber' => $workNumber
                ]
            );
        }
    }

    /**
     * 改变坐席模式
     *
     * 用户可通过本接口实现座席模式的切换：值班座席（移动座席）或固定座席。
     * 当前只支持模式从固定坐席切换成移动坐席，如果需要将模式从移动坐席切
     * 换成固定坐席，需要调用签入接口。
     * 关于坐席设备号码(deviceNumber)说明：
     *  1） 座席使用回拨模式时，此处必须输入回拨话机的号码，话机号码必须是真实的手机号、物联网卡号或固话号码；
     *  2） 座席使用 VoIP 模式时，该参数无需输入，或为空字符串。
     * 通过 HTTPS POST 方式提交要求。
     *
     * @param string $workNumber 坐席工号
     * @param int $mode 0-固定座席（默认值），1-值班座席
     * @param string $deviceNumber 座席设备号码
     * @return array
     */
    public function changeMode($workNumber, $mode = 0, $deviceNumber = "")
    {
        if (!$workNumber) {
            return ['return_code' => "FAIL", 'return_msg' => "坐席工号输入不能为空"];
        }
        if ($mode != 0 && $mode != 1) {
            return ['return_code' => "FAIL", 'return_msg' => "mode取值只能是0或1"];
        }
        return $this->httpRequest->apiPost("/CallCenter/changeMode", [
                'workNumber' => $workNumber,
                'mode' => $mode,
                'deviceNumber' => $deviceNumber
            ]
        );
    }

    /**
     * 改变坐席状态
     *
     * 用户可通过本接口实现座席状态的切换：示闲，示忙，整理。
     * 通过 HTTPS POST 方式提交要求。
     *
     * @param string $workNumber 坐席工号
     * @param int $status 0-示闲（默认）；1-示忙；2-整理
     * @return array
     */
    public function changeStatus($workNumber, $status = 0)
    {
        if (!$workNumber) {
            return ['return_code' => "FAIL", 'return_msg' => "坐席工号输入不能为空"];
        }
        if ($status != 0 && $status != 1 && $status != 2) {
            return ['return_code' => "FAIL", 'return_msg' => "status取值只能是0或1或2"];
        }
        return $this->httpRequest->apiPost("/CallCenter/changeStatus", [
                'workNumber' => $workNumber,
                'status' => $status
            ]
        );

    }


    /**
     * 坐席呼出
     *
     * 用户可通过本接口实现座席的呼出。调用接口成功后，同步返回本次通话的
     * callId。请保存 callId，以用于以后获取通话录音，进行挂断，转移等操作，并方便与通话状态推送进行比对。
     * 通过 HTTPS POST 方式提交要求。
     *
     * @param string $workNumber 坐席工号
     * @param string $to 客户号码
     * @param string $outNumber 呼出用总机号码，一般采取默认
     * @param int $displayMode 被叫来电号码显示方式：0-显示总机号码或直线号码（默认）；1-显示坐席绑定的手机号码（需运营商授权才可生效）；
     * @param string $userData 用户自定义数据
     * @return array
     */
    public function callOut($workNumber, $to, $outNumber = "", $displayMode = 0, $userData = "ds")
    {
        if (!$workNumber) {
            return ['return_code' => "FAIL", 'return_msg' => "坐席工号输入不能为空"];
        }
        if (!$to) {
            return ['return_code' => "FAIL", 'return_msg' => "客户号码输入不能为空"];
        }
        if ($displayMode != 0 && $displayMode != 1) {
            return ['return_code' => "FAIL", 'return_msg' => "被叫来电号码显示方式取值只能是0或1"];
        }
        return $this->httpRequest->apiPost("/CallCenter/callOut", [
                'workNumber' => $workNumber,
                'to' => $to,
                'outNumber' => $outNumber,
                'displayMode' => $displayMode,
                'userDate' => $userData
            ]
        );
    }

    /**
     * 挂断电话
     *
     * 通过呼叫中心呼出接口（6.5 座席呼出）发出的呼出通话，以及呼叫中心分
     * 配给本座席的呼入通话（座席必须先通过振铃推送获得 callId），座席可通过本
     * 接口实现通话的挂断。
     * 通过 HTTPS POST 方式提交要求。
     *
     * @param string $workNumber 坐席工号
     * @param string $callId 呼叫ID
     * @return array
     */
    public function callCancel($workNumber, $callId)
    {
        if (!$workNumber) {
            return ['return_code' => "FAIL", 'return_msg' => "坐席工号输入不能为空"];
        }
        if (!$callId) {
            return ['return_code' => "FAIL", 'return_msg' => "呼叫ID输入不能为空"];
        }
        return $this->httpRequest->apiPost("/CallCenter/callCancel", [
                'workNumber' => $workNumber,
                'callId' => $callId
            ]
        );
    }


}