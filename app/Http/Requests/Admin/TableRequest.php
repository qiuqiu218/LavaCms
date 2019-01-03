<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class TableRequest extends BaseRequest
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
            case 'store':
            case 'update':
                return [
                    'name' => [
                        'required',
                        'alpha_dash',
                        'max:20',
                        Rule::unique('tables')->ignore($this->route('table'))
                    ],
                    'display_name' => 'required|string|max:30',
                    'is_sub_table' => 'sometimes|boolean',
                    'is_classify' => 'sometimes|boolean',
                    'is_comment' => 'sometimes|boolean',
                    'is_search' => 'sometimes|boolean'
                ];
        }
    }
}
