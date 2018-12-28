<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    /**
     * @var \Illuminate\Foundation\Application|mixed|null|res
     */
    protected $res = null;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->res = app('res');
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function success($message = '操作成功')
    {
        return $this->res->success($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function error($message = '操作失败')
    {
        return $this->res->error($message);
    }

    /**
     * @param int $code
     * @return mixed
     */
    public function setStatusCode($code = 200)
    {
        return $this->res->setStatusCode($code);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function setParams($data = [])
    {
        return $this->res->setParams($data);
    }
}
