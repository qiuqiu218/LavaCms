<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    /**
     * @var \Illuminate\Foundation\Application|mixed|null|res
     */
    protected $res = null;

//    protected $model = null;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->res = app('res');
//        $controller = 'App\Models\\'.$this->res->getPrefix().'\\'.$this->res->getControllerName();
//        $this->model = new $controller();
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function success($message = '')
    {
        return $this->res->success($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function error($message = '')
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
     * @param $data
     * @return $this
     */
    public function setParams($data)
    {
        return $this->res->setParams($data);
    }
}
