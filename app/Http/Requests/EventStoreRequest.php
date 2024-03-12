<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'image' => 'required|image',
            'title' => 'required|string|max:25', 
            'location' => 'required|string|max:25',
            'available_places' => 'required|integer|min:0',
            'category_id' =>'required',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'reservation_method' => 'required'
        ];
    }
}
