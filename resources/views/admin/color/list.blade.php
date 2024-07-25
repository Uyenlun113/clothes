@extends('admin.layouts.app')
@section('content')
    {{--  --}}
    <div class="content-wrapper p-5 ">
        @include('admin.layouts._message')
        <h2 class="card-title">Danh sách màu</h2> <br> <br>
        <div class="card mb-4 ">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($color as $value)
                            <tr class="align-middle">
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->code }}</td>
                                <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ url('admin/color/edit/' . $value->id) }}" class="btn btn-warning">Sửa</a>
                                    <a href="{{ url('admin/color/delete/' . $value->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection
