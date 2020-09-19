<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'nome' => 'required|string',
            'cpf' => 'required|unique:pessoas|cpf',
            'email' => 'required|email:rfc,dns|unique:usuarios',
            'password' => 'required|confirmed'
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'cpf' => 'CPF',
            'email' => 'E-mail',
            'password' => 'Senha'
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
