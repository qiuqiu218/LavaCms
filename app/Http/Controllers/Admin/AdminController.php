<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends BaseController
{
    public function login(AdminRequest $request)
    {
        $input = $request->only(['username', 'password']);
        return $this->setParams($input)->success();
    }
}
