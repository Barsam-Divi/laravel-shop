<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBrandRequest extends FormRequest
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
            'name' => ['required','min:1','max:200','unique:brands,name'],
            'image' => ['required','mimes:jpg,png,jpeg,svg','max:5024','min:1']
        ];
    }
}
