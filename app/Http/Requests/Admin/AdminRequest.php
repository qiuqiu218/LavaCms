<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends BaseRequest
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
                    'page' => 'sometimes|integer'
                ];
            case 'login':
                return [
                    'username' => 'required|string',
                    'password' => 'required|between:6,20|string'
                ];
            case 'store':
            case 'update':
            return [
                'username' => [
                    'required',
                    'string',
                    'max:30',
                    Rule::unique('admins')->ignore($this->route('admin'))
                ],
                'password' => 'required|between:6,20|string',
                'nickname' => 'sometimes|nullable|string',
                'phone' => [
                    'sometimes',
                    'nullable',
                    'numeric',
                    'digits_between:11,11',
                    Rule::unique('admins')->ignore($this->route('admin'))
                ],
                'email' => [
                    'sometimes',
                    'nullable',
                    'email',
                    Rule::unique('admins')->ignore($this->route('admin'))
                ]
            ];
            default:
                return [];
        }
    }
}
