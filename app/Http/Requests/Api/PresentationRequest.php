<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PresentationRequest extends FormRequest
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
            'opening_rate' => 'required',
            'probing_rate' => 'required',
            'delivering_rate' => 'required',
            'objection_rate' => 'required',
            'closing_rate' => 'required',
            'product_rate' => 'required',
        ];
    }
}