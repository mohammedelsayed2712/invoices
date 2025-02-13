<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SectionRequest extends FormRequest
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
        // Get the section ID from the route parameters (if it exists)
        // $sectionId = $this->route('section') ? $this->route('section')->id : null;
        $id = $this->route()->parameter('section');

        return [
            'name'        => ['required', 'string', 'max:255' . $id],
            'description' => 'required|string',
            'status'      => 'required|string|in:active,inactive',
        ];
    }
}
