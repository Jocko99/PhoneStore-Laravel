<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
            "ime"=>"regex:/^([A-ZŽĐŠ][a-zčćžšđ]{2,15}\s*)+$/",
            "prezime"=>"regex:/^([A-ZŽĐŠ][a-zčćžšđ]{2,15}\s*)+$/",
            "email"=>"regex:/^[\w\d\.]+@([a-z\.])+\.[a-z]{2,5}$/",
            "lozinka"=>"regex:/^.{6,50}$/",
            "lozinkaPonovo"=>"same:lozinka",
            "mesto"=>'regex:/^[\d]{5}$/',
            "brTelefon"=>"regex:/^[\d]{9,10}$/"
        ];
    }
    public function messages()
    {
        return [
            "ime.regex"=>"Ime mora početi velikim slovom i sadržati najamanje 3 karaktera.",
            "prezime.regex"=>"Prezime mora početi velikim slovom i sadržati najamanje 3 karaktera.",
            "email.regex"=>"Email treba biti u formatu primer@gmail.com",
            "lozinka.regex"=>"Lozinka mora sadržati najmanje 6 karaktera",
            "lozinkaPonovo.same"=>"Lozinke se ne poklapaju.",
            "mesto.regex"=>'Poštanski broj mora imati 5 cifara.',
            "brTelefon.regex"=>"Telefon mora imati najmanje 9,a najviše 10 brojeva."
        ];
    }
}
