<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
<<<<<<< HEAD
            // 'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'image' => ['mimes:jpeg,jpg,png,gif'],
            'team_id' => ['required', 'exists:teams,id'],
            'role_id' => ['required', 'exists:roles,id'],
            'type' => ['required', 'in:judge,member,admin'],
=======
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['mimes:jpeg,jpg,png,gif'],
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        ];
    }
}
