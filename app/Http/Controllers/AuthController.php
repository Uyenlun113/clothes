<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; // Import the Hash facade

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check()) && Auth::user()->is_admin == 1) {
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }

    public function loginAdmin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'is_admin' => 1,
                'status' => 0,
                'is_delete' => 0
            ], $remember)
        )  {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Kiểm tra lại mật khẩu hoặc email');
        }
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('admin');
    }
}