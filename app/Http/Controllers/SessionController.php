<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create (){
        return view('auth.login');
    }

    public function store(SessionRequest $request)
    {
        if(!Auth::attempt($request->except('_token')))
        {
            return back()
                    ->withErrors(['password' => 'unable to authentication by this information'])
                    ->withInput();
        }

        $request->session()->regenerateToken();
        
        return redirect()
                ->intended()
                ->with('sucess', 'welcome to our site');
    }

    public function destroy()
    {
        Auth::logout();
        
        return redirect('/login');
    }
}
