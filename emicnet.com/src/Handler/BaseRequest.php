<?php

namespace jzweb\voip\emicnet\Handler;


use jzweb\voip\emicnet\Lib\HttpRequest;

/**
 * 业务处理基类
 *
 * @author changge(1282350001@qq.com)
 */
abstract class BaseRequest
{
    protected $config;
    protected $httpRequest;

    /**
     * [__construct 构造函数]
     * @param   [type] $config                  [description]
     * @version <1.0>  2019-09-02T11:02:58+0800
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->httpRequest = new HttpRequest($config);
    }
}