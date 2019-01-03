<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class FieldRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch (request()->route()->getActionMethod())
        {
            case 'index':
                return [
                    'table_id' => 'required|integer'
                ];
            case 'store':
            case 'update':
                return [
                    'name' => [
                        'required',
                        'alpha_dash',
                        'max:20',
                        Rule::unique('fields')->where(function ($query) {
                            return $query->where('table_id', $this->input('table_id'));
                        })->ignore($this->route('field'))
                    ],
                    'table_id' => 'required|integer',
                    'display_name' => 'required|string',
                    'type' => 'required|alpha_dash',
                    'type_length' => 'sometimes|integer',
                    'element' => 'required|string',
                    'default_value' => 'sometimes|string',
                    'option' => 'sometimes|array',
                    'belong' => 'required|integer',
                    'is_show' => 'required|boolean',
                    'is_import' => 'required|boolean',
                    'is_system' => 'required|boolean',
                    'sort' => 'sometimes|integer',
                ];
        }
    }
}
