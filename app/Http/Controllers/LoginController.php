<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    

    public function index(){

        return view('login.login',[
            'title' => "Login"
        ]);
    }

    public function create(){

        return view('login.register',[
            'title' => "Register"
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => ['required','min:4','max:255'],
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => ['required','email','max:255','unique:users'],
            'password' => ['required','min:8','max:255']
        ]);

        // password algort bcrypt
        $validatedData['password']= Hash::make($validatedData['password']);

        // kasih pesan
        // $request->session()->flash('success','Registrasi Berhasil Silahkan Login');
        // $request->session()->flush();

        User::query()->create(
            $validatedData);
        return redirect('/login')->with('success','Registrasi Berhasil Silahkan Login');

    }

    public function login(Request $request){

        $validatedData = $request->validate([
            'username' => ['required','min:3','max:255'],
            'password' => ['required','min:8','max:255',],
        ]);

        
        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            // Password cocok
            return redirect()->intended('/dashboard');
        } 

        return back()->with('errors','login Failed');
        

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }
}
