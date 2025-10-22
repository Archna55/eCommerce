<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make( $request->all (), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.dashboard');
            } else {
                return redirect()->route('account.login')->with('error', 'The provided information do not match our records.');
            }
        } else {
            return redirect()->route('account.login')
                            ->withInput()
                            ->withErrors($validator);
        }
    }
    
    public function register()
    {
        return view('register');
    }

    public function processRegistration(Request $request)
    {
        $validator = Validator::make( $request->all (), [
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';
            $user->save();

            return redirect()->route('account.login')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect()->route('account.register')
                            ->withInput()
                            ->withErrors($validator);
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
