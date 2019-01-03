<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\TableRequest;
use App\Models\Admin\Table;

class TableController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Table::all();
        return $this->setParams($data)->success();
    }

    /**
     * @param TableRequest $request
     * @return mixed
     */
    public function store(TableRequest $request)
    {
        $input = $request->only((new Table())->getFillable());
        $data = Table::query()->create($input);
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
        $data = Table::query()->findOrFail($id);
        return $this->setParams($data)->success();
    }

    /**
     * @param TableRequest $request
     * @param $id
     * @return mixed
     */
    public function update(TableRequest $request, $id)
    {
        $input = $request->only((new Table())->getFillable());
        $data = Table::query()->findOrFail($id);
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
        $res = Table::query()->findOrFail($id)->delete();
        return $res ? $this->success() : $this->error();
    }
}
