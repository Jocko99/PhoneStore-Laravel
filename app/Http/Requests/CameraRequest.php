<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CameraRequest extends FormRequest
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
            "cameraName"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "cameraName.required"=>"Broj piksela je obavezan parametar"
        ];
    }
}
