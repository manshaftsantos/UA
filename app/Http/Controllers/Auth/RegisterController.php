<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Matricule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $message =  [
            'nom.required' => 'le champ nom est requis',
            'nom.max' => 'votre nom de doit pas contenir plus de 255 caractères',
            'matricule.unique' => 'ce matricule est deja utilisé',
            'password.required' =>'le champ mot de passe est requis',
            'password.min' => 'votre mot de passe doit contenir au moins 8 caractere',
            'email.required' => 'le champ email est requis',
            'email.email' => 'adresse email incorrecte'
        ];

        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'matricule' => ['required', 'string', 'max:7', 'unique:users', new Matricule],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255'],

        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom' => $data['nom'],
            'matricule' => $data['matricule'],
            'email' => $data['email'],
            'filiere' => $data['filiere'],
            'password' => Hash::make($data['password']),
            'privilege' => ' ',
        ]);

    }
}
