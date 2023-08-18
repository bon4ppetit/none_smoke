<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class CigaretteStructureRequest extends FormRequest
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
            'how_long_smoke' => 'required|integer|max_digits:3',
            'nicotine_in_cigarette' => 'required|integer|max_digits:3',
            'money_on_pack_cigarette' => 'required|integer|max_digits:4',
            'count_cigarettes_in_pack' => 'required|integer|max_digits:2',
            'count_smoke_cigarettes_a_day' => 'required|integer|max_digits:2',
        ];
    }
}
