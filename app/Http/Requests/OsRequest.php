<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OsRequest extends FormRequest
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
            "osName"=>"required|min:3"
        ];
    }
    public function messages()
    {
        return [
            "osName.required"=>"Naziv sistema je obavezan parametar.",
            "osName.min"=>"Naziv sistema mora sadržati minimalno 3 karaktera."
        ];
    }
}
