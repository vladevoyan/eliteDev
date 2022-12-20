<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "email" => "required|email:rfc,dns|unique:users,email",
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password",
            "name" => "required"
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([

            "success"   => false,

            "message"   => "Validation errors",

            "data"      => $validator->errors()

        ]));
    }
}
