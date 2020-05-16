<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormRequest extends FormRequest
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
            'password' => 'min:6|required_with:cpassword|same:cpassword',
            'cpassword' => 'min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Password Minimal 6 karakter',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.same' => 'Password Harus Sama Dengan Confirmation Password',
            'cpassword.min' =>'Konfirmasi Password Minimal 6 karakter',
        ];
    }
}
