<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $id = $this->route()->parameter('product');

        return [
            'name'        => ['required', 'string', 'max:255', 'unique:products,name,' . $id],
            'description' => 'required|string',
            'section_id'  => 'required|exists:sections,id',
            'status'      => 'required|string|in:active,inactive',
        ];
    }
}
