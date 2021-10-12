<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmileDetectionRequest extends FormRequest
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
            "smileDetectionName"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "smileDetectionName.required"=>"Parametar za detekciju osmeha je obavezan"
        ];
    }
}
