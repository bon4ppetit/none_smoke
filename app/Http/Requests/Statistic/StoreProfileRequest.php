<?php

namespace App\Http\Requests\Statistic;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'type_smoke' => 'string',
            'date_start_smoke' => 'required|date',
            'date_finish_smoke' => 'required|date',
            
            'price_jar' => 'integer',
            'count_jar_a_month' => 'integer',
            'price_vape_vaporizer' => 'integer',
            'count_vape_vaporizer_a_month' => 'integer',

            'money_on_pack_cigarette' => 'integer',
            'count_smoke_cigarettes_a_day' => 'integer',
            'nicotine_in_cigarette' => 'integer',
            'count_cigarettes_in_pack' => 'integer'
        ];
    }
}
