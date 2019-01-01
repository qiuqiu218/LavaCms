<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Admin\Menu;

class MenuController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::all()->toHierarchy();
        return $this->setParams($data)->success();
    }

    /**
     * @param MenuRequest $request
     * @return mixed
     */
    public function store(MenuRequest $request)
    {
        $input = $request->only((new Menu())->getFillable());
        $data = Menu::query()->create($input);
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
        $data = Menu::query()->findOrFail($id);
        return $this->setParams($data)->success();
    }

    /**
     * @param MenuRequest $request
     * @param $id
     * @return mixed
     */
    public function update(MenuRequest $request, $id)
    {
        $input = $request->only((new Menu())->getFillable());
        $data = Menu::query()->findOrFail($id);
        $res = $data->update($input);
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
        $res = Menu::query()->findOrFail($id)->delete();
        return $res ? $this->success() : $this->error();
    }
}
