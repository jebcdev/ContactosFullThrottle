<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:contacts,email'],
            'phone' => ['required', 'string', 'max:20', 'unique:contacts,phone'],
            'address' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'exists:users,id'], // Verifica que el usuario exista en la tabla `users`
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe superar los 255 caracteres.',

            'surname.required' => 'El campo apellido es obligatorio.',
            'surname.string' => 'El campo apellido debe ser una cadena de texto.',
            'surname.max' => 'El campo apellido no debe superar los 255 caracteres.',

            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El campo correo electrónico debe ser una dirección válida.',
            'email.max' => 'El campo correo electrónico no debe superar los 255 caracteres.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.string' => 'El campo teléfono debe ser una cadena de texto.',
            'phone.max' => 'El campo teléfono no debe superar los 20 caracteres.',
            'phone.unique' => 'El número de teléfono ya está registrado.',

            'address.required' => 'El campo dirección es obligatorio.',
            'address.string' => 'El campo dirección debe ser una cadena de texto.',
            'address.max' => 'El campo dirección no debe superar los 255 caracteres.',

            'user_id.required' => 'El campo usuario es obligatorio.',
            'user_id.exists' => 'El usuario especificado no existe en el sistema.',
        ];
    }
}
