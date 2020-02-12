<?php

/**
 * jzweb-voip集成测试
 *
 * @user 刘松森 <liusongsen@gmail.com>
 * @date 2020/2/12
 */

include "../vendor/autoload.php";

$config = [
   
];

$sdk = new \jzweb\voip\emicnet\Client($config);
