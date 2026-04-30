<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'tittle' => 'register'
        ]);
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'name' => 'required | max:50',
            'username' => 'required | min:3 | max:25 | unique:users',
            'email' => 'required | email:dns | unique:users',
            'password' => 'required | min:2 | max:15'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        // $request->session()->flash('success', 'Registration success! please logon now!');

        return redirect('/login')->with('success', 'Registration success! please logon now!');
        
    }
}
