<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminURequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            return [
            'name' => 'required|max:255',
            'rut' => 'required|numeric|max:10',
            'email' => 'required|email|max:255|unique:users_admin',
            'password' => 'required|min:8|confirmed',
            ];
    }
}
