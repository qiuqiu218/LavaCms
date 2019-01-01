<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends BaseRequest
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
                    'guard_name' => 'required|alpha_num|max:30',
                    'name' => [
                        'required',
                        'alpha_dash',
                        'max:30',
                        Rule::unique('permissions')->where(function ($query) {
                            return $query->where('guard_name', $this->input('guard_name'));
                        })->ignore($this->route('permission'))
                    ],
                    'display_name' => 'required|string|max:30'
                ];
        }
    }
}
