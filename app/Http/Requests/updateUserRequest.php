<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'gender' => 'required',
            'age' => 'required|numeric|gt:0',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048|',
            'phone' => 'required|min:11',
            'role' => 'required',
        ];
    }
}
