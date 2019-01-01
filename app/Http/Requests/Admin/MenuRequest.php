<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class MenuRequest extends BaseRequest
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
                    'parent_id' => 'sometimes|nullable|numeric',
                    'title' => 'required|max:30',
                    'description' => 'sometimes|nullable|max:120',
                    'route' => 'required|max:120',
                    'type' => 'sometimes|nullable|numeric',
                    'sort' => 'sometimes|nullable|numeric'
                ];
        }
    }
}
