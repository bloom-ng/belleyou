<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required', 'exists:orders,id'],
            'ref' => ['required', 'max:255', 'string'],
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:purchase,refund,wallet funding,payout'],
            'status' => ['required', 'in:succcessful,pending,failed'],
        ];
    }
}
