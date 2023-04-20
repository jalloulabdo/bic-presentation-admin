<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {   
        $rules = [
            'name' => [
                'required', 
            ]
        ];
        if ($this->getMethod() == "POST") { 
            $rules +=[
                'email' => [
                    'required',
                    'email',
                    'max:191',
                    'unique:users,email',
                ],
                'password' => [
                    'required', 
                ], 
            ];
        }
        if ($this->getMethod() == "PUT") {
            $user = $this->route('user');
            $rules +=[
                'email' => [
                    'required',
                    'email',
                    'max:191',
                    Rule::unique('users')->ignore($user->id),
                ],
            ];
        }
        return  $rules;
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'email.email' => 'Please enter valid email',
            'password.required' => 'Please enter your password',
        ];
    }
}
