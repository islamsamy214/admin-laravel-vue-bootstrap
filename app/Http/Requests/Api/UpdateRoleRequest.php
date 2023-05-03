<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'opening_rate' => 'required|numeric',
            'probing_rate' => 'required|numeric',
            'delivering_rate' => 'required|numeric',
            'objection_rate' => 'required|numeric',
            'closing_rate' => 'required|numeric',
            'product_rate' => 'required|numeric',
        ];
    }
}
