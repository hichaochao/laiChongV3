<?php

namespace Wormhole\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Wormhole\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Wormhole\Protocols\Licence;

class BaseController extends Controller
{
    // 接口帮助调用
    use Helpers;

        // 请求
    protected $request;

    // 返回错误的请求
    protected function errorBadRequest($message = '')
    {
        return $this->response->array($message)->setStatusCode(400);
    }

    public function __construct(Request $request)
    {
        $this->request = $request;

        //判断访问ip是否正确
        //$res = app('License')->client_ip();

        return true;
    }
}
