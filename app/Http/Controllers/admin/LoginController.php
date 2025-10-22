<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }


    // this function is for admin authentication
    public function authenticate(Request $request)
    {
        $validator = Validator::make( $request->all (), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->passes()) {

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('admin')->user()->role != 'admin') {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'You do not have admin access.');
                }
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')->with('error', 'The provided information do not match our records.');
            }
        } else {
            return redirect()->route('admin.login')
                            ->withInput()
                            ->withErrors($validator);
        }
    }

    // this function is for admin logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}