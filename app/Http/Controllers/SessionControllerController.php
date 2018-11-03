<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SessionControllerController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
    }
    public function create()
    {
        return view('user.login');
    }

    public function store(Request $request)
    {
        $inputs=$request->except('_token');
        $inputs['verified']=1;
        if(!auth()->attempt($inputs)){
            return back()->withErrors([
                'message' =>'Your account is not verified yet'
            ]);
        }
        if(!auth()->attempt(request(['email','password']))){
           return back()->withErrors([
             'message' =>'please check Again'
           ]);
        }

        return redirect('/dashboard');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('register');
    }
    public function verifyy($token)
    {
        $user=User::where('token',trim($token))->first();
        if(($user==null))
        {
            session()->flash('message','Invalid');

            return redirect('dashboard');
        }
        $user->update(
            [
                'verified' =>true,
                'token' =>null,
            ]);
        session()->flash('message','Verified');

        auth()->login($user);

        return redirect('dashboard');

    }
}
