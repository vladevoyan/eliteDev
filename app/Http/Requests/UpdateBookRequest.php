<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            "title" => "required",
            "id" => "required|numeric",
            "authors" => "array",
            'authors.*' => 'integer'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));
    }

    public function messages()

    {

        return [

            "title.required" => "Title is required",
            "id.required" => "Chose a book",
            "authors.*.integer" => "Array can only include integer"

        ];

    }
}
