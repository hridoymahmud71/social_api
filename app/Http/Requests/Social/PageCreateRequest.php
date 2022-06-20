<?php

namespace App\Http\Requests\Social;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PageCreateRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Page name is required',
            'name.max' => 'Maximum 50 characters are allowed for Page name',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'result'   => false,
            'message'   => 'Request is not valid',
            'errors'      =>  $validator->errors()->all(),
        ], 422));
    }
}
