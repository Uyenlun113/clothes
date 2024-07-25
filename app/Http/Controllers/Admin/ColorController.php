<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function listColor()
    {
        $data['color'] = Color::getListColor();
        $data['header_title'] = "Color";
        return view('admin.color.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Thêm màu";
        return view('admin.color.add', $data);
    }
    public function addColor(Request $request)
    {
        $color = new Color;
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->save();

        return redirect('admin/color/list')->with('success', "Thêm mới thành công");
    }
     public function edit($id)
    {
        $data['color'] = Color::getColorById($id);
        $data['header_title'] = "Cập nhật màu ";
        return view('admin.color.edit', $data);
    }
    public function editColor($id, Request $request)
    {
        $color = Color::getColorById($id);
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->save();

        return redirect('admin/color/list')->with('success', "Cập nhật thành công");
    }
    public function deleteColor($id){
        $color = Color::getColorById($id);
        $color->is_delete = 1;
        $color->save();
        return redirect()->back()->with('success', "Xóa thành công");
    }
    //
}