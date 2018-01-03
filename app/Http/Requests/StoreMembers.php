<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembers extends FormRequest
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
            'firstname.required' => 'First name is required',
            'firstname.max' => 'First name is too long',
            'lastname.required' => 'Last name is required',
            'lastname.max' => 'Last name is too long',
            'middlename.max' => 'Middle name is too long',
            'email.required'  => 'Email is required',
            'phonenumber.required' => 'Phone number is required'
        ];
    }
}
