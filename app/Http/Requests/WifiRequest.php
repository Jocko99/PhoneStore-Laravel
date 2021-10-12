<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WifiRequest extends FormRequest
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
            "wifiName"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "wifiName.required"=>"Wifi je obavezan parametar"
        ];
    }
}
