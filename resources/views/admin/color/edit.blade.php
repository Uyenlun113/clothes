@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper p-5 ">
        <div class="col-md-12">
            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Cập nhật danh mục</div>
                </div> <!--end::Header--> <!--begin::Form-->
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Tên màu </label> <input
                                type="name" class="form-control" value="{{ $color->name }}" name="name"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Mã màu</label> <input
                                type="color" class="form-control" value="{{ $color->code }}" name="code"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group  ">
                            <label for="exampleInputEmail1" class="form-label">Status </label>
                            <select name="status" id="" class="form-control">
                                <option {{ $color->status == 0 ? 'selected' : '' }} value="0">Active</option>
                                <option {{ $color->status == 1 ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
                        </div>

                    </div> <!--end::Body--> <!--begin::Footer-->
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Cập nhật</button> </div>
                    <!--end::Footer-->
                </form> <!--end::Form-->
            </div> <!--end::Quick Example--> <!--begin::Input Group-->
        </div> <!--end::Col--> <!--begin::Col-->
    </div>
@endsection
