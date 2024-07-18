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
            'urlCategory' => 'required|unique:categories',    
        ]);
        $category = new Categories;
        $category->name = trim($request->name);
        $category->description = trim($request->description);
        $category->keywords = trim($request->keywords);
        $category->urlCategory = trim($request->urlCategory);
        $category->status = trim($request->status);
        $category->save();

        return redirect('admin/category/list')->with('success', "Thêm mới thành công");
    }
     public function edit($id)
    {
        $data['categorie'] = Categories::getCatgoryById($id);
        $data['header_title'] = "Cập nhật danh mục";
        return view('admin.category.edit', $data);
    }
    public function editCategory($id, Request $request)
    {
        $category = Categories::getCatgoryById($id);
        $category->name = trim($request->name);
        $category->description = trim($request->description);
        $category->keywords = trim($request->keywords);
        $category->urlCategory = trim($request->urlCategory);
        $category->status = trim($request->status);
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