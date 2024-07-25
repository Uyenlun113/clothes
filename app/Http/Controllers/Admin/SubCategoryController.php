<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Categories;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function listSubCategory()
    {
        $data['sub'] = SubCategory::getListSubCategory();
        $data['header_title'] = "Sub Category";
        return view('admin.subcategory.list', $data);
    }
     public function add()
    {
        $data['categories'] = Categories::getListCategory();
        $data['header_title'] = "Thêm danh mục phụ";
        return view('admin.subcategory.add', $data);
    }
    public function addSubCategory(Request $request)
    {
        request()->validate([
            'url' => 'required|unique:subcategories',    
        ]);
        $subcategory = new SubCategory;
        $subcategory->name = trim($request->name);
        $subcategory->category_id = trim($request->category_id);
        $subcategory->description = trim($request->description);
        $subcategory->keywords = trim($request->keywords);
        $subcategory->url = trim($request->url);
        $subcategory->status = trim($request->status);
        $subcategory->save();

        return redirect('admin/sub_category/list')->with('success', "Thêm mới thành công");
    }
    public function edit($id)
    {
        $data['categories'] = Categories::getListCategory();
        $data['categorie'] = SubCategory::getSubCatgoryById($id);
        $data['header_title'] = "Cập nhật danh mục";
        return view('admin.subcategory.edit', $data);
    }
    public function editSubCategory($id, Request $request)
    {
        $subcategory = SubCategory::getSubCatgoryById($id);
        $subcategory->name = trim($request->name);
        $subcategory->category_id = trim($request->category_id);
        $subcategory->description = trim($request->description);
        $subcategory->keywords = trim($request->keywords);
        $subcategory->url = trim($request->url);
        $subcategory->status = trim($request->status);
        $subcategory->save();

        return redirect('admin/sub_category/list')->with('success', "Cập nhật thành công");
    }
    public function deleteSubCategory($id){
        $subcategory = SubCategory::getSubCatgoryById($id);
        $subcategory->is_delete = 1;
        $subcategory->save();
        return redirect()->back()->with('success', "Xóa thành công");
    }

    public function getSubCategory( Request $request){
        
    }

    //
}