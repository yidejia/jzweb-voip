<?php

/**
 * jzweb-voip集成测试
 *
 * @user 刘松森 <liusongsen@gmail.com>
 * @date 2020/2/12
 */

include "../vendor/autoload.php";

$config = [
    //调试模式
    'debug' => false,
    //版本
    'version' => '20170405',
    //字符编号 GBK|UTF-8
    'charSet' => 'utf-8',
    //数据格式，1:json,2:xml格式
    'dataType' => '2',
    //日志文件路径
    'cacheFilePath' => "",
    //应用ID
    'appId' => '',
    //授权访问token
    'accessToken' => "",
    //主账号
    'accountSid' => "",
    //云总机测试平台默认域名
    'apiHostUrl' => "",
    //云总机
    'cloudNumber' => "",
    //子账号
    'subAccountSid' => "",
    //授权访问token
    'subAccessToken' => "",
];

$sdk = new \jzweb\voip\emicnet\Client($config);

//创建子账号
//$result = $sdk->createSubAccount($config['appId']);
//print_r($result);
//exit;
//测试绑定云主机
//$result = $sdk->addEnterprise($config['appId'], $config['cloudNumber'], "admin_02028269410", "BwRV4MbAr6t6c");
//print_r($result);
//exit;
//活在通话语音文件
$result = $sdk->callRecordUrl("api016000003a11581584958953XQ03b");
print_r($result);
exit;
//获取话单详情
//$result = $sdk->callDetail("api016000003a11581584958953XQ03b");
//print_r($result);
//exit;
//下载话单
//$result = $sdk->billList("todo", "2020-02-11", date("Y-m-d"));
//print_r($result);
//exit;
//坐席签出
//$result = $sdk->signOff(8800);
//print_r($result);
//exit;
//坐席签入
//$result = $sdk->signIn(8800);
//print_r($result);
//exit;
//呼出电话
$result = $sdk->callOut(8800, "13202018503");
print_r($result);
exit;
//挂断电话
$result = $sdk->callCancel(8800, "asdfasdf");
print_r($result);
exit;
