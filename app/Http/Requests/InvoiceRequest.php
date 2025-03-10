<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
        $id = $this->route()->parameter('invoice');

        return [
            'invoice_number'    => 'required|string|unique:invoices,invoice_number,' . $id,
            'invoice_Date'      => 'required|date',
            'due_date'          => 'required|date|after_or_equal:invoice_date',
            'product'           => 'required|string|max:255',
            'section_id'        => 'required|exists:sections,id',
            'amount_collection' => 'required|numeric|min:0',
            'amount_commission' => 'required|numeric|min:0',
            'discount'          => 'required|numeric|min:0',
            'value_vat'         => 'required|numeric|min:0',
            'rate_vat'          => 'required|string',
            'total'             => 'required|numeric|min:0',
            'status'            => 'required|string|in:active,inactive',
            'user_id'           => 'required|exists:users,id',
            'note'              => 'nullable|string',
            'payment_date'      => 'nullable|date|after_or_equal:invoice_date',
            'value_status'      => 'required|numeric',
        ];
    }
}
