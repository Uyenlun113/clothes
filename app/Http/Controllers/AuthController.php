<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use Illuminate\Support\Str;
use App\Models\User;
// use App\Mail\ForgotPasswordMail;

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
        ) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Kiểm tra lại mật khẩu hoặc email');
        }
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect(url(''));
    }
    public function auth_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'status' => 0,
                'is_delete' => 0
            ], $remember)
        ) {
            // Đăng nhập thành công
            $json['status'] = true;
            $json['message'] = "success";
        } else {
            // Đăng nhập thất bại
            $json['status'] = false;
            $json['message'] = "Kiểm tra lại mật khẩu";
        }
        return response()->json($json);
    }

    public function authRegister(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();
        if (empty($checkEmail)) { // Change this line
            $save = new User;
            $save->name = trim($request->name);
            $save->email = trim($request->email);
            $save->password = Hash::make($request->password);
            $save->save();
            $json['status'] = true;
            $json['message'] = "Đăng ký thành công";
        } else {
            $json['status'] = false;
            $json['message'] = "Email đã tồn tại";
        }
        return response()->json($json);
    }
    public function forgotPassword(Request $request){
        return view('auth.forgot');
    }


}