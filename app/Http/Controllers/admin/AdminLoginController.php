<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\VoterLogin;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

         $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard')
                        ->with('message', 'Signed in!');
        }

         return redirect()->route('login-index')->with('message', 'Login details are not valid!');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect()->route('login-index');
    }
}
