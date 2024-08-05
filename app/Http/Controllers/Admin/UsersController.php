<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function listUser()
    {
        $data['getRecord'] = User::getListUser();
        $data['header_title'] = "Users";
        return view('admin.user.list', $data);
    }
    public function add()
    {

        $data['header_title'] = "Thêm tài khoản";
        return view('admin.user.add', $data);
    }
    public function addUser(Request $request)
    {
        request()->validate([
            'name' => 'required|string|min:6',
            'email'=> 'required|email|unique:users',
            
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
         $user->is_delete = 0;
        $user->save();

        return redirect('admin/user/list')->with('success', "Thêm mới thành công");
    }
    public function edit($id)
    {
        $data['user'] = User::getUserById($id);
        $data['header_title'] = "Cập nhật tài khoản";
        return view('admin.user.edit', $data);
    }
    public function editUser($id, Request $request)
    {
        $user = User::getUserById($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();

        return redirect('admin/user/list')->with('success', "Cập nhật thành công");
    }
    public function deleteUser($id){
        $user = User::getUserById($id);
        $user->is_delete = 1;
        $user->save();
        return redirect()->back()->with('success', "Xóa thành công");
    }
    public function listCustomer(){
        $data['listCustomer'] = User::getListCustomer();
        $data['header_title'] = "Customers";
        return view('admin.customer.list', $data);
    }
    public function deleteCustomer($id){
        $user = User::getUserById($id);
        $user->is_delete = 1;
        $user->save();
        return redirect()->back()->with('success', "Xóa thành công");
    }
}