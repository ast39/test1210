<?php

namespace App\Http\Requests\Payments;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class PaymentUpdateRequest extends FormRequest {

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'amount'     => [
                'nullable',
                "regex:/^\d+(\.\d{1,2})?$/",
            ],
            'currency'   => "nullable|string",
            'ticket'     => 'nullable|int',
        ];
    }
}
