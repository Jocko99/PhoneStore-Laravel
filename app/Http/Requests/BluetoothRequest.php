<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BluetoothRequest extends FormRequest
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
            "bluetoothName"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "bluetoothName.required"=>"Bluetooth je obavezan parametar"
        ];
    }
}
