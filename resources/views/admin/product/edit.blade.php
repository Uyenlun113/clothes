@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper p-5 ">
        <div class="col-md-12">
            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Sửa sản phẩm</div>
                </div> <!--end::Header--> <!--begin::Form-->
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Name <span
                                    style="color:red">*</span></label>
                            <input type="name" class="form-control" value="{{ old('name', $product->name) }}"
                                name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Category </label>
                            <select name="category_id" class="form-control" id="">
                                <option value="">--Chọn danh mục--</option>
                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Sub Category </label>
                            <select name="category_id" class="form-control" id="">
                                <option value="">--Chọn danh mục--</option>
                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Mô tả </label> <input
                                type="text" class="form-control" name="description" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Đường dẫn </label> <input
                                type="name" class="form-control" value="{{ old('url') }}" name="url"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div style="color: red">{{ $errors->first('url') }}</div>
                        </div>

                        <div class="form-group  ">
                            <label for="exampleInputEmail1" class="form-label">Status </label>
                            <select name="status" id="" class="form-control">
                                <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Active</option>
                                <option {{ old('status') == 1 ? 'selected' : '' }} value="0">Inactive</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Thêm mới</button> </div>

                </form> <!--end::Form-->
            </div>
        </div>
    </div>
@endsection
