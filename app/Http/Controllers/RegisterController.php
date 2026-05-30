<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() 
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        
        Auth::login($user);
        
        return redirect('/');
    }
}
