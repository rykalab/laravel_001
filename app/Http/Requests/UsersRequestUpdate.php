<?php
namespace App\Http\Requests;
use App\Rules\UniqueEmail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequestUpdate extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                new UniqueEmail($request)
            ],
            'password' => 'required'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'pole wymagane - login',
            'email.required' => 'pole wymagane - email',
            'email.email' => 'podaj adres prawidlowy email',
            'email.unique' => 'adres zajety',
            'password.required' => 'pole wymagane - haslo',
        ];
    }
}