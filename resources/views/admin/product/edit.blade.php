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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Name <span
                                            style="color:red">*</span></label>
                                    <input type="name" class="form-control" value="{{ old('name', $product->name) }}"
                                        name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Code <span
                                            style="color:red">*</span></label>
                                    <input type="name" class="form-control" value="{{ old('code', $product->code) }}"
                                        name="code" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Category </label>
                                    <select name="category_id" class="form-control" id="ChangeCategory">
                                        <option value="">--Chọn danh mục--</option>
                                        @foreach ($categories as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Sub Category
                                    </label>
                                    <select name="sub_category_id" class="form-control" id="getSubCategory">
                                        <option value="">--Chọn danh mục phụ--</option>
                                        @foreach ($subcategories as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Color
                                        <span style="color:red">*</span></label>
                                    <div>
                                        <label for=""><input type="checkbox" name="color_id[]">Đỏ</label>
                                    </div>
                                    <div>
                                        <label for=""><input type="checkbox" name="color_id[]">Xanh</label>
                                    </div>
                                    <div>
                                        <label for=""><input type="checkbox" name="color_id[]">Vàng</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Price <span
                                            style="color:red;">*</span></label>
                                    <input type="name" class="form-control" value="{{ old('price', $product->price) }}"
                                        name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Old Price <span
                                            style="color:red">*</span></label>
                                    <input type="name" class="form-control"
                                        value="{{ old('old_price', $product->old_price) }}" name="old_price"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Size
                                        <span style="color:red">*</span></label>
                                    <hr>
                                    <div>
                                        <table class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" name="" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" class="form-control">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary ">Add</button>
                                                        <button type="button" class="btn btn-primary ">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Short Description
                                        <span style="color:red">*</span></label>
                                    <textarea name="short_description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3"> <label for="exampleInputEmail1" class="form-label"> Description
                                        <span style="color:red">*</span></label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  ">
                                    <label for="exampleInputEmail1" class="form-label">Status </label>
                                    <select name="status" id="" class="form-control">
                                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Active</option>
                                        <option {{ old('status') == 1 ? 'selected' : '' }} value="0">Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="card-footer"> <button type="submit" class="btn btn-primary">Thêm mới</button> </div>

                </form>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $('body').delegate('#ChangeCategory', 'change', function(e) {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/get_sub_category') }}",
                    data: {
                        "id": id,
                        "_token": "{{ csrf_field() }}"
                    },
                    dataType: "json",
                    success: function(data) {

                    },
                    error: function(data) {}
                })
            })
        </script>
    @endsection
