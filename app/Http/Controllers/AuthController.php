<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getlogin(){
        return view('login');
    }

    public function login(Request $request){

        $validate = $request->validate([
            'first_name' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($validate)){
            if(Auth::user()->role == 'TEA' || Auth::user()->role == 'STU'){
                return redirect()->route('space_work');    
            }else{

                return redirect()->route('home');
            }
        }else{
            return back()->with(['error' => 'Mot de passe ou adresse mail incorrect']);
        }
    }

    public function getRegister(){
        return view('register');
    }

    public function register(Request $request){
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role = 'HEAD';
        if($user->save()){
            Auth::login($user);
            return redirect()->route('success');
        }
    }

    public function logout(){
        auth()->logout();
        return view('welcome');
    }

}
