<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends BaseController
{
    public function login(AdminRequest $request)
    {
        $input = $request->only(['username', 'password']);
        $res = $this->model->login($input['username'], $input['password']);
        if ($res['status'] === 'success') {
            return $this->setParams($res['data'])->success($res['message']);
        } else {
            return $this->setStatusCode($res['code'])->error($res['message']);
        }
    }
}
