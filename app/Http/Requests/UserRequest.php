<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   public function rules(): array
{
   return [
    'username'  => ['required', 'regex:/^[A-Za-z\s-]+$/'],
    'useremail' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'],
    'userage'   => ['required', 'integer', 'min:18', 'max:110'],
    'usercity'  => ['required', 'regex:/^[A-Za-z\s-]+$/'],
];

}
public function messages(){
    return [
    'username.regex'   => 'The name may only contain letters, spaces, and hyphens.',
    'useremail.regex'  => 'Please enter a valid Gmail address (e.g., example@gmail.com).',
    'userage.integer'  => 'The age must be a valid number.',
    'userage.min'      => 'You must be at least 18 years old.',
    'userage.max'      => 'The age may not exceed 110 years.',
    'usercity.regex'   => 'The city name may only contain letters, spaces, and hyphens.',
];

}

}
