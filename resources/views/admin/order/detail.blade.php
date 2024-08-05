@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper p-5 ">
        @include('admin.layouts._message')
        <h2 class="card-title">Chi tiết đơn hàng</h2> <br> <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">ID: {{ $detail->id }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">Name : {{ $detail->first_name }}
                            {{ $detail->last_name }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">address one : {{ $detail->address_one }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">address two : {{ $detail->address_two }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">phone : {{ $detail->phone }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">email : {{ $detail->email }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">note : {{ $detail->note }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">payment_method :
                            {{ $detail->payment_method }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">discount_code : {{ $detail->discount_code }}
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">discount_amount :
                            {{ number_format($detail->discount_amount) }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="">total_amount :
                            {{ number_format($detail->total_amount) }} đ</label>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>color_name</th>
                        <th>size_name</th>
                        <th>size_amount</th>
                        <th>total_price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail->getItem as $value)
                        @php
                            $getProductImage = $value->getProduct->getImageSingle($value->getProduct->id);
                        @endphp
                        <tr class="align-middle">
                            <td>{{ $value->id }}</td>
                            <td><img src="{{ $getProductImage->getLogo() }}" alt="" width="80%" height="100px">
                            </td>
                            <td>{{ $value->getProduct->name }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->color_name }} </td>
                            <td>{{ $value->size_name }}</td>
                            <td>{{ number_format($value->size_amount) }} đ</td>
                            <td>{{ number_format($value->total_price) }} đ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
