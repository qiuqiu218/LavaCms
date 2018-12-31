<?php
/**
 * Created by PhpStorm.
 * User: 万鑫
 * Date: 2018/12/28
 * Time: 14:52
 */

namespace App\Tools;

use Illuminate\Http\JsonResponse;

class Resource {
    private $statusCode = 200;
    private $status = 'success';
    private $message = '操作成功';
    private $params = [];

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function success($message = '')
    {
        return $this->setStatusCode(200)
                    ->setStatus('success')
                    ->setMessage($message)
                    ->response();
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function error($message = '操作失败')
    {
        $statusCode = $this->statusCode === 200 ? 422 : $this->statusCode;
        return $this->setStatusCode($statusCode)
            ->setStatus('error')
            ->setMessage($message)
            ->response();
    }

    /**
     * @param int $code
     * @return $this
     */
    public function setStatusCode($code = 200)
    {
        $this->statusCode = $code;
        return $this;
    }

    /**
     * @param string $status
     * @return $this
     */
    private function setStatus($status = '')
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    private function setMessage($message)
    {
        if (!$message) {
            $message = $this->getDefaultMessage();
        }
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    private function getDefaultMessage () {
        $statusMessage = $this->status === 'success' ? '成功' : '失败';
        switch (request()->getMethod())
        {
            case 'GET':
            {
                return '获取'.$statusMessage;
            }
            case 'POST':
            {
                return '提交'.$statusMessage;
            }
            case 'PUT':
            {
                return '修改'.$statusMessage;
            }
            case 'DELETE':
            {
                return '删除'.$statusMessage;
            }
            default:
            {
                return '操作'.$statusMessage;
            }
        }
    }

    /**
     * @param $data
     * @return $this
     */
    public function setParams($data)
    {
        $this->params = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getControllerName()
    {
        $baseController = class_basename(request()->route()->getActionName());
        $controller = explode("@", $baseController)[0];
        $controller = str_before($controller, 'Controller'); // 函数返回字符串中给定值之前的所有内容 (见辅助函数)
//        $controller = snake_case($controller); // 字符串转蛇形
        return $controller;
    }

    /**
     * 获取路由前缀
     * @return string
     */
    public function getPrefix()
    {
        return studly_case(request()->route()->getAction()['prefix'] ?? 'home');
    }

    public function response()
    {
        return new JsonResponse([
            'message' => $this->message,
            'status' => $this->status,
            'data' => $this->params,
            'code' => $this->statusCode
        ], $this->statusCode);
    }
}