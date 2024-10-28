<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
               'product_id' => 'exists:products,id',//ensure that product_id is excist in products table..
             'quantity' => 'required|numeric|min:1',//ensure that quantity >0.
              'paymentMethod' => 'required|array', // Ensure paymentMethod is required and an array
              'paymentMethod.*' => 'in:paypal,creditCard' // Ensure that each payment method is either "paypal" or "creditCard"

    ];
}}
