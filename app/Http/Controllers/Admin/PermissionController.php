<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\PermissionRequest;
use App\Models\Admin\Permission;

class PermissionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param PermissionRequest $request
     * @return mixed
     */
    public function store(PermissionRequest $request)
    {
        $input = $request->only((new Permission())->getFillable());
        $data = Permission::query()->create($input);
        return $this->setParams($data)->success();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param PermissionRequest $request
     * @param $id
     * @return mixed
     */
    public function update(PermissionRequest $request, $id)
    {
        $input = $request->only((new Permission())->getFillable());
        $res = Permission::query()->findOrFail($id)->update($input);
        return $res ? $this->success() : $this->error();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Permission::query()->findOrFail($id)->delete();
        return $res ? $this->success() : $this->error();
    }
}
