<?php


/**
 * 南京易米云总机呼叫平台配置信息
 * 注：该部分配置要特别注意保密
 */

return [
    'default_dsn' => "default",
    'dsn' => [
        'default' => [
            //调试模式
            'debug' => true,
            //版本
            'version' => '20170405',
            //字符编号 GBK|UTF-8
            'charSet' => 'utf-8',
            //数据格式，1:json,2:xml格式
            'dataType' => '2',
            //应用ID
            'appId' => 'todo',
            //云总机
            'cloudNumber' => "02028269410",
            //主账号
            'accountSid' => "todo",
            //子账号
            'subAccountSid' => "todo",
            //授权访问token
            'accessToken' => "todo",
            //云总机测试平台默认域名
            'apiHostUrl' => "http://apiusertest.emic.com.cn/"
        ],
        'dev' => [
            //调试模式
            'debug' => true,
            //版本
            'version' => '20170405',
            //字符编号 GBK|UTF-8
            'charSet' => 'utf-8',
            //数据格式，1:json,2:xml格式
            'dataType' => '2',
            //应用ID
            'appId' => 'todo',
            //云总机
            'cloudNumber' => "todo",
            //主账号
            'accountSid' => "todo",
            //子账号
            'subAccountSid' => "todo",
            //授权访问token
            'accessToken' => "todo",
            //云总机测试平台默认域名
            'apiHostUrl' => "http://apiusertest.emic.com.cn/"

        ],
        'test' => [
            //调试模式
            'debug' => true,
            //版本
            'version' => '20170405',
            //字符编号 GBK|UTF-8
            'charSet' => 'utf-8',
            //数据格式，1:json,2:xml格式
            'dataType' => '2',
            //应用ID
            'appId' => 'todo',
            //云总机
            'cloudNumber' => "todo",
            //主账号
            'accountSid' => "todo",
            //子账号
            'subAccountSid' => "todo",
            //授权访问token
            'accessToken' => "todo",
            //云总机测试平台默认域名
            'apiHostUrl' => "http://apiusertest.emic.com.cn/"
        ],
        'prod' => [
            //调试模式
            'debug' => false,
            //版本
            'version' => '20170405',
            //字符编号 GBK|UTF-8
            'charSet' => 'utf-8',
            //数据格式，1:json,2:xml格式
            'dataType' => '2',
            //应用ID
            'appId' => 'todo',
            //云总机
            'cloudNumber' => "todo",
            //主账号
            'accountSid' => "todo",
            //子账号
            'subAccountSid' => "todo",
            //授权访问token
            'accessToken' => "todo",
            //云总机测试平台默认域名
            'apiHostUrl' => "http://apiusertest.emic.com.cn/"
        ],
    ]
];