<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RamRequest extends FormRequest
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
            "ramName"=>"digits_between:1,3"
        ];
    }
    public function messages()
    {
        return [
            "ramName.digits_between"=>"Ram mora biti u opsegu od 1-999"
        ];
    }
}
