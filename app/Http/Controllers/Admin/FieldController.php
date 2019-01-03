<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Admin\Field;
use Illuminate\Http\Request;

class FieldController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tableId = $request->input('table_id');
        $data = Field::query()
                    ->where('table_id', $tableId)
                    ->orderByDesc('id')
                    ->get();
        return $this->setParams($data)->success();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only((new Field())->getFillable());
        $data = Field::query()->create($input);
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
        $data = Field::query()->findOrFail($id);
        return $this->setParams($data)->success();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->only((new Field())->getFillable());
        $data = Field::query()->findOrFail($id);
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
        $res = Field::query()->findOrFail($id)->delete();
        return $res ? $this->success() : $this->error();
    }
}
