<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //show register create form
    public function create()
    {
        return view('Users.register');
    }


    //create new user
    //create new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        //redirect
        return redirect('/')->with('message', 'User Created and logged in');
    }



    public function logout(Request $request){

        auth()->logout();

        //invalidate session and re generate
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/')->with('messag','You have been logged out!');

         
    }


    //sow login form
    public function login(){

        return view('Users.login');

    }

    //user login authenticate
    public function authenticate(Request $request){
        $formFields = $request->validate([
            
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
