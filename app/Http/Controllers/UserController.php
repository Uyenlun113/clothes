<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function order(){
        $data['getOrder'] = Order::getOrderUser(Auth::user()->id);
        return view('user.order',$data);
    }
    public function OrderDetail($id){
        $data['detail'] = Order::getSingleOrderUser(Auth::user()->id,$id);
        if(!empty($data['detail'])){
            return view('user.order_detail',$data);
        } else{
            abort(404);
        }
        
    }
    public function editProfile(){
        $data['getRecord'] = User::getUserById(Auth::user()->id);
        return view('user.editProfile',$data);
    }
    public function updateProfile(Request $request){
        $user = User::getUserById(Auth::user()->id);
        $user->last_name = trim($request->last_name);
        $user->address_one = trim($request->address_one);
        $user->address_two = trim($request->address_two);
        $user->phone = trim($request->phone);
        $user->save();
        return redirect()->back()->with('success', "Cập nhật thành công");

    }
    public function changePassword(){
        return view('user.changePassword');
    }
    public function updatePassword(Request $request){
        $user = User::getUserById(Auth::user()->id);
        if(Hash::check($request->old_password,$user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
             return redirect()->back()->with('success', "Cập nhật thành công");
        }else{
             return redirect()->back()->with('error', "Mật khẩu cũ không đúng");
        }
    }
    
    //
}