<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class VapeStructureRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'price_jar' => 'integer|required|max_digits:4',
            'how_long_smoke' => 'integer|required|max_digits:3',
            'count_jar_a_month' => 'integer|required|max_digits:2',
            'price_vape_vaporizer' => 'integer|required|max_digits:4',
            'count_vape_vaporizer_a_month' => 'integer|required|max_digits:3',
        ];
    }
}
