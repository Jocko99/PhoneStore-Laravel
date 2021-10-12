<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChipsetRequest extends FormRequest
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
            "chipsetName"=>"required|min:3"
        ];
    }
    public function messages()
    {
        return [
            "chipsetName.required"=>"Chipset je obavezan parametar",
            "chipsetName.min"=>"Chipset mora da sadrži minimalno 3 karaktera."
        ];
    }
}
