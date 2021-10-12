<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "kontaktIme"=>"regex:/^([A-ZŽĐŠ][a-zčćžšđ]{2,20}\s*)+$/",
            "kontaktPrezime"=>"regex:/^([A-ZŽĐŠ][a-zčćžšđ]{2,20}\s*)+$/",
            "kontaktEmail"=>"regex:/^[\w\d\.]+@([a-z\.])+\.[a-z]{2,5}$/",
            "kontaktPoruka"=>"regex:/^.{15,}$/",
        ];
    }
}
