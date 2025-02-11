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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $invoiceId = $this->route('invoice') ? $this->route('invoice')->id : null;

        return [
            'invoice_number' => 'required|string|unique:invoices,invoice_number,' . $invoiceId,
            'invoice_date'   => 'required|date',
            'due_date'       => 'required|date|after_or_equal:invoice_date',
            'product'        => 'required|string|max:255',
            'section'        => 'required|string|max:255',
            'discount'       => 'required|string|max:255',
            'rate_vat'       => 'required|string|max:255',
            'value_vat'      => 'required|numeric',
            'total'          => 'required|numeric',
            'status'         => ['required', 'in:active,inactive'],
            'value_status'   => 'required|integer',
            'note'           => 'nullable|string',
            'user'           => 'required|string|max:255',
        ];
    }
}
