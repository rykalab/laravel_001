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
            'password' => 'required',
            'password_new' => 'required|same:password',
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Wpisz imię',
            'email.required' => 'Wpisz email',
            'password.required' => 'Wpisz hasło',
            'password_new.required' => 'Wpisz nowe hasło',
            'password_new.same'	=> 'Wpisane hasła nie są identyczne',
        ];
    }
}