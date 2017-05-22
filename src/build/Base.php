<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace houdunwang\response\build;

use houdunwang\xml\Xml;

class Base
{
    /**
     * 状态码
     *
     * @var
     */
    protected $code;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * 发送HTTP 状态码
     *
     * @param $code
     *
     * @return $this
     */
    public function sendHttpStatus($code)
    {
        $status = [
            // Informational 1xx
            100 => 'Continue',
            101 => 'Switching Protocols',
            // Success 2xx
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            // Redirection 3xx
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',  // 1.1
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            // 306 is deprecated but reserved
            307 => 'Temporary Redirect',
            // Client Error 4xx
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            // Server Error 5xx
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            509 => 'Bandwidth Limit Exceeded',
        ];
        if (isset($status[$code])) {
            $this->setCode($status[$code]);
            header('HTTP/1.1 '.$code.' '.$status[$code]);
            header('Status:'.$code.' '.$status[$code]);

            return true;
        }

        return false;
    }

    /**
     * Ajax输出
     *
     * @param        $data 数据
     * @param string $type 数据类型 text xml json
     *
     * @return string
     */
    public function ajax($data, $type = "JSON")
    {
        switch (strtoupper($type)) {
            case "TEXT" :
                $res = $data;
                break;
            case "XML" :
                $res = (new Xml())->toSimpleXml($data);
                break;
            case 'JSON':
            default :
                $res = json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        return $res;
    }
}