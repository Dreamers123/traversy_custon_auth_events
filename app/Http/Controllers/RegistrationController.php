<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);
        $user=User::create( [
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> request('password'),
            'token'=> md5($request->input('email').uniqid('laravel',true)),

        ]);

        session()->flash('message','Thank you so much for signning up,please visit your mail for confirmation');
        //auth()->login($user);
        return redirect('/dashboard');
    }
}
