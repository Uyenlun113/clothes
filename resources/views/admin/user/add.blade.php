@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper p-5 ">
        <div class="col-md-12">
            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Thêm tài khoản</div>
                </div> <!--end::Header--> <!--begin::Form-->
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Name </label> <input
                                type="name" class="form-control" value="{{ old('name') }}" name="name"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div style="color: red">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Email </label> <input
                                type="email" class="form-control" value="{{ old('email') }}" name="email"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div style="color: red">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Password</label> <input
                                type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group  ">
                            <label for="exampleInputEmail1" class="form-label">Status </label>
                            <select name="status" id="" class="form-control">
                                <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Active</option>
                                <option {{ old('status') == 1 ? 'selected' : '' }} value="0">Inactive</option>
                            </select>
                        </div>

                    </div> <!--end::Body--> <!--begin::Footer-->
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Thêm mới</button> </div>
                    <!--end::Footer-->
                </form> <!--end::Form-->
            </div> <!--end::Quick Example--> <!--begin::Input Group-->
        </div> <!--end::Col--> <!--begin::Col-->
    </div>
@endsection
