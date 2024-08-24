<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewOfferRequest extends FormRequest
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
            'code' => ['required' , 'unique:offers,code' ,'min:1' , 'max:210'],
            'started_at' => ['required' , 'date','before:expires_at'],
            'expires_at' => ['required' , 'date','after:started_at'],
        ];
    }
}
