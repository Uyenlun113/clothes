<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $data['categories'] = Categories::getListCategory();
        $data['header_title'] = "Category";
        return view('admin.category.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Thêm danh mục";
        return view('admin.category.add', $data);
    }
    public function addCategory(Request $request)
    {
        request()->validate([
            'name' => 'required|string|min:6',
           
            
        ]);
        $category = new Categories;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();

        return redirect('admin/category/list')->with('success', "Thêm mới thành công");
    }
     public function edit($id)
    {
        $data['categorie'] = Categories::getCatgoryById($id);
        $data['header_title'] = "Cập nhật tài khoản";
        return view('admin.category.edit', $data);
    }
    public function editCategory($id, Request $request)
    {
        $category = Categories::getCatgoryById($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();

        return redirect('admin/category/list')->with('success', "Cập nhật thành công");
    }
    public function deleteCategory($id){
        $category = Categories::getCatgoryById($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->back()->with('success', "Xóa thành công");
    }
    //
}