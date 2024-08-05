@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper p-5">
        @include('admin.layouts._message')
        <h2 class="card-title">Danh sách đơn hàng</h2> <br> <br>
        <div class="card mb-4">
            <div class="card-header">
            </div> <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>name</th>
                            <th>address one</th>
                            <th>address two</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>note</th>
                            <th>payment_method</th>
                            <th>discount_code</th>
                            <th>discount_amount</th>
                            <th>total_amount</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $value)
                            <tr class="align-middle">
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                                <td>{{ $value->address_one }}</td>
                                <td>{{ $value->address_two }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->note }}</td>
                                <td>{{ $value->payment_method }}</td>
                                <td>{{ $value->discount_code }}</td>
                                <td>{{ number_format($value->discount_amount) }}</td>
                                <td>{{ number_format($value->total_amount) }}</td>
                                <td>
                                    <select class="ChangeStatus" name="" id="{{ $value->id }}">
                                        <option {{ $value->status == 0 ? 'selected' : '' }} value="0">Chờ xác nhận
                                        </option>
                                        <option {{ $value->status == 1 ? 'selected' : '' }} value="1">Đã xác nhận
                                        </option>
                                        <option {{ $value->status == 2 ? 'selected' : '' }} value="2">Đang giao
                                        </option>
                                        <option {{ $value->status == 3 ? 'selected' : '' }} value="3">Đã hoàn thành
                                        </option>
                                        <option {{ $value->status == 4 ? 'selected' : '' }} value="4">Đã hủy</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{ url('admin/order/detail/' . $value->id) }}" class="btn btn-warning">Chi
                                        tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                    {!! $order->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection

@section('script')
    <script>
        $('body').on('change', '.ChangeStatus', function() {
            var status = $(this).val();
            var order_id = $(this).attr('id');
            $.ajax({
                type: "GET",
                url: "{{ url('admin/order_status') }}",
                data: {
                    status: status,
                    order_id: order_id,
                },
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                },
            });
        });
    </script>
@endsection
