<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotacaoRequest extends FormRequest
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
            'peso_inicial' => ['required', 'numeric'],
            'peso_final' => ['required', 'numeric'],
            'cep_inicio' => ['required', 'numeric'],
            'cep_final' => ['required', 'numeric'],
        ];
    }
}
