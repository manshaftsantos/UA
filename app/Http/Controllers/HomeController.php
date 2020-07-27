<?php

namespace App\Http\Controllers;

use App\filiere;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except("register");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        
        return view('home');
    }

    public function register()
    {
        $filieres = filiere::get();
        return view('auth.register', compact('filieres'));
    }
    
}
