<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
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
     * @param Validator $validator
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        if ($this->ajax()) {
            $arr = [];
            foreach(json_decode($validator->errors()) as $key => $item) {
                $arr[] = [
                  'key' => $key,
                  'text' => $item[0]
                ];
            }
            throw new HttpResponseException(app('res')->setParams($arr)->error('验证错误'));
        } else {
            parent::failedValidation($validator);
        }
    }
}
