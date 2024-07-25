@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper p-5 ">
        <div class="col-md-12">
            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Thêm sản phẩm</div>
                </div> <!--end::Header--> <!--begin::Form-->
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Name <span
                                    style="color:red">*</span></label>
                            <input type="name" class="form-control" value="{{ old('name') }}" name="name"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Thêm mới</button> </div>

                </form> <!--end::Form-->
            </div>
        </div>
    </div>
@endsection
