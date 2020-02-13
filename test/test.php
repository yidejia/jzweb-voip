<?php

/**
 * jzweb-voip集成测试
 *
 * @user 刘松森 <liusongsen@gmail.com>
 * @date 2020/2/12
 */

include "../vendor/autoload.php";

$config = [];

$sdk = new \jzweb\voip\emicnet\Client($config);
//活在通话语音文件
$result = $sdk->callRecordUrl("api016000003a11581584958953XQ03b");
print_r($result);
exit;
//获取话单详情
//$result = $sdk->callDetail("api016000003a11581584958953XQ03b");
//print_r($result);
//exit;
//下载话单
//$result = $sdk->billList("ce0df13133e6ea1c616fd3fa2aaece0e", "2020-02-11", date("Y-m-d"));
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
