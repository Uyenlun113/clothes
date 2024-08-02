<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{
    public function listDiscount(){
        $data['discount'] = DiscountCode::getListDiscountCode();
        $data['header_title'] = "Discount_code";
        return view('admin.discount_code.list', $data);

    }
    public function add(){
        $data['header_title'] = "Thêm mã giảm giá";
        return view('admin.discount_code.add', $data);
        
    }
    public function addDiscount(Request $request){
        $discount = new DiscountCode;
        $discount->name = trim($request->name);
        $discount->type = trim($request->type);
        $discount->percent_amount = trim($request->percent_amount);
        $discount->expridate = trim($request->expridate);
        $discount->status = trim($request->status);
        $discount->save();

        return redirect('admin/discount/list')->with('success', "Thêm mới thành công");
        
    }
    public function edit($id){
        $data['discount'] = DiscountCode::getSingle($id);
        $data['header_title'] = "Cập nhật mã giảm giá ";
        return view('admin.discount_code.edit', $data);
        
    }
    public function editDiscount($id, Request $request){
        $discount = DiscountCode::getSingle($id);
        $discount->name = trim($request->name);
        $discount->type = trim($request->type);
        $discount->percent_amount = trim($request->percent_amount);
        $discount->expridate = trim($request->expridate);
        $discount->status = trim($request->status);
        $discount->save();

        return redirect('admin/discount/list')->with('success', "Cập nhật thành công");
        
    }
     public function deleteDiscount($id){
        $discount = DiscountCode::getSingle($id);
        $discount->is_delete = 1;
        $discount->save();
        return redirect()->back()->with('success', "Xóa thành công");
        
    }
}