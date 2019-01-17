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
					'limit' => 'sometimes|integer'
                ];
            case 'getToken':
                return [
                    'username' => 'required|max:20|string',
                    'password' => 'required|between:6,20|string'
                ];
            case 'store':
				return [
					'username' => [
						'required',
						'string',
						'max:20',
						Rule::unique('admins')->ignore($this->route('admin'))
					],
					'password' => 'required|between:6,20|string',
					'nickname' => 'sometimes|max:20|nullable|string',
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
            case 'update':
				return [
					'username' => [
						'required',
						'string',
						'max:20',
						Rule::unique('admins')->ignore($this->route('admin'))
					],
					'password' => 'sometimes|between:6,20|string',
					'nickname' => 'sometimes|max:20|nullable|string',
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
