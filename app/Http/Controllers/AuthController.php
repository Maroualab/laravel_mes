<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerView(){
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }
    public function loginView(){
        return view('auth.login');
    }

    public function signUp(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);
    
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();
    
        Auth::login($user);
    
        return redirect('/');
        }

        public function signIn(Request $request){
            $validatedData = $request->validate([
                'email'=>'required|email',
                'password'=>'required'
            ]);
    
            Auth::attempt($validatedData);
    
            if (Auth::check()){
                return redirect('/');
            }else{
                return redirect('/login')->with('message', 'wrong credentials');
            }
        }

}
