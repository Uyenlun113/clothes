@extends('admin.layouts.app')
@section('content')
    {{--  --}}
    <div class="content-wrapper p-5 ">
        @include('admin.layouts._message')
        <h2 class="card-title">Danh sách danh mục phụ</h2> <br> <br>
        <div class="card mb-4 ">

            <div class="card-header">


            </div> <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Keywords</th>
                            <th>URL</th>
                            <th>Category</th>
                            <th>Descrition</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub as $value)
                            <tr class="align-middle">
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->keywords }}</td>
                                <td>{{ $value->url }}</td>
                                <td>{{ $value->name_categorie }}</td>
                                <td class="description">{{ $value->description }}</td>
                                <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ url('admin/sub_category/edit/' . $value->id) }}"
                                        class="btn btn-warning">Sửa</a>
                                    <a href="{{ url('admin/sub_category/delete/' . $value->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="padding: 10px;float: right;">
                    {!! $sub->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection
