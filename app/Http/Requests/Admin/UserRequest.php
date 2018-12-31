<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UserRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
            case 'store':
            case 'update':
                return [
                    'username' => [
                        'required',
                        'string',
                        'max:30',
                        Rule::unique('admins')->ignore($this->route('user'))
                    ],
                    'password' => 'required|between:6,20|string',
                    'nickname' => 'sometimes|nullable|string',
                    'phone' => [
                        'sometimes',
                        'nullable',
                        'numeric',
                        'digits_between:11,11',
                        Rule::unique('admins')->ignore($this->route('user'))
                    ],
                    'email' => [
                        'sometimes',
                        'nullable',
                        'email',
                        Rule::unique('admins')->ignore($this->route('user'))
                    ]
                ];
            default:
                return [];
        }
    }
}
