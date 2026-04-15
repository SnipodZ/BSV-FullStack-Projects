<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
        'name'         => 'required|max:255',
        'description'  => 'nullable|max:255',
        'length'       => 'required|decimal:2',
        'release_date' => 'required|date',
        'genre_id'     => 'required|exists:genres,id',
        'publisher_id' => 'required|exists:publishers,id'
        ];
    }
    public function messages(): array 
    {
        $messages = [
            'name'=> 'The name field is required.',
            'descrption' => 'The description field cant be longer than 255 characters.',
            'length' => 'The length field is required and must be a decimal with 2'
        ];
        return $messages;
    } 
}
