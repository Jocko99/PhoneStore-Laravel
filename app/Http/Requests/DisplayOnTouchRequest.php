<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisplayOnTouchRequest extends FormRequest
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
            "displayOnTouchName"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "displayOnTouchName.required"=>"Ekran na dodir je obavezan podatak"
        ];
    }
}
