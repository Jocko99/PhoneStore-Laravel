<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OsVersionRequest extends FormRequest
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
            "osVersionName"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "osVersionName.required"=>"OS verzija je obavezan parametar."
        ];
    }
}
