@extends('admin.layouts.app')
@section('content')
    <style>
        .description {
            max-width: 300px;
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
    </style>
    <div class="content-wrapper p-5 ">
        @include('admin.layouts._message')
        <h2 class="card-title">Danh sách danh mục</h2> <br> <br>
        <div class="card mb-4 ">

            <div class="card-header">

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-end">
                        <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                        <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
                    </ul>
                </div>
            </div> <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Descrition</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $value)
                            <tr class="align-middle">
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td class="description">{{ $value->description }}</td>
                                <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ url('admin/category/edit/' . $value->id) }}" class="btn btn-warning">Sửa</a>
                                    <a href="{{ url('admin/category/delete/' . $value->id) }}" class="btn btn-danger"
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
