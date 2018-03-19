<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users'
            // .$this->user()->id,
        ];
    }
    public function messages() {
	    return [
            'name.required'    => 'pole wymagane',
            'password.required' => 'pole wymagane',
            'email.required' => 'pole wymagane',
            'email.unique' => 'email musi byc unikatowy',
            //'email.email' => 'dawaj emaila nie jakies gowno'
        ];
    }
}
