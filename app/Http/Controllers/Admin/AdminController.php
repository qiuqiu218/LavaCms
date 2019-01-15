<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    /**
     * @param AdminRequest $request
     * @return mixed
     */
    public function getToken(AdminRequest $request)
    {
        $input = $request->only(['username', 'password']);
        $res = Admin::getToken($input['username'], $input['password']);
        if ($res['status'] === 'success') {
            return $this->setParams($res['data'])->success($res['message']);
        } else {
            return $this->setStatusCode($res['code'])->error($res['message']);
        }
    }

    /**
     * @return mixed
     */
    public function login()
    {
    	$user = Auth::user();
        return $this->setParams([
        	'userInfo' => $user,
			'menu' => $user->getMenu()
		])->success('登录成功');
    }

    /**
     * @param AdminRequest $request
     * @return mixed
     */
    public function index(AdminRequest $request)
    {
        $page = $request->input('page', 1);
        $limit = 10;
        $data = Admin::query()->orderByDesc('id')
                ->skip(($page - 1) * $limit)
                ->take($limit)
                ->get();
        return $this->setParams($data)->success();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $data = Admin::query()->findOrFail($id);
        return $this->setParams($data)->success();
    }

    /**
     * @param AdminRequest $request
     * @return mixed
     */
    public function store(AdminRequest $request)
    {
        $input = $request->only((new Admin())->getFillable());
        $data = Admin::query()->create($input);
        return $this->setParams($data)->success();
    }

    /**
     * @param AdminRequest $request
     * @param $id
     * @return mixed
     */
    public function update(AdminRequest $request, $id)
    {
        $input = $request->only((new Admin())->getFillable());
        $data = Admin::query()->findOrFail($id);
        $res = $data->update($input);
        return $res ? $this->success() : $this->error();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $res = Admin::query()->findOrFail($id)->delete();
        return $res ? $this->success() : $this->error();
    }
}
