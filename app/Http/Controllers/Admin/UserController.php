<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\User;

class UserController extends BaseController
{
    /**
     * @param UserRequest $request
     * @return mixed
     */
    public function index(UserRequest $request)
    {
        $page = $request->input('page', 1);
        $limit = 10;
        $data = User::query()->orderByDesc('id')
            ->skip(($page - 1) * $limit)
            ->take($limit)
            ->get();
        return $this->setParams($data)->success();
    }

    /**
     * @param UserRequest $request
     * @return mixed
     */
    public function store(UserRequest $request)
    {
        $input = $request->only((new User())->getFillable());
        $data = User::query()->create($input);
        return $this->setParams($data)->success();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $data = User::query()->findOrFail($id);
        return $this->setParams($data)->success();
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UserRequest $request, $id)
    {
        $input = $request->only((new User())->getFillable());
        $data = User::query()->findOrFail($id);
        $res = $data->update($input);
        return $res ? $this->success() : $this->error();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $res = User::query()->findOrFail($id)->delete();
        return $res ? $this->success() : $this->error();
    }
}
