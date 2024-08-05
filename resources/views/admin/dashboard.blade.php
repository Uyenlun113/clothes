 @extends('admin.layouts.app')
 @section('content')
     <div class="content-wrapper">
         <main class="app-main"> <!--begin::App Content Header-->
             <div class="app-content-header"> <!--begin::Container-->
                 <div class="container-fluid"> <!--begin::Row-->
                     <div class="row">
                         <div class="col-sm-6">
                             <h3 class="mb-0">Dashboard v3</h3>
                         </div>
                         <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-end">
                                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">
                                     Dashboard v3
                                 </li>
                             </ol>
                         </div>
                     </div> <!--end::Row-->
                 </div> <!--end::Container-->
             </div>
             <div class="app-content"> <!--begin::Container-->
                 <div class="container-fluid"> <!--begin::Row-->
                     <div class="row">
                         <div class="col-12 col-sm-6 col-md-3">
                             <div class="info-box">
                                 <span class="info-box-icon text-bg-primary shadow-sm">
                                     <i class="bi bi-bag-fill"></i>
                                 </span>
                                 <div class="info-box-content">
                                     <span class="info-box-text">Tổng đơn hàng</span>
                                     <span class="info-box-number">{{ $totalOrder }} <small>đơn</small></span>
                                 </div> <!-- /.info-box-content -->
                             </div>
                         </div> <!-- /.col -->

                         <div class="col-12 col-sm-6 col-md-2">
                             <div class="info-box">
                                 <span class="info-box-icon text-bg-danger shadow-sm">
                                     <i class="bi bi-calendar-day"></i>
                                 </span>
                                 <div class="info-box-content">
                                     <span class="info-box-text">Đơn hàng hôm nay</span>
                                     <span class="info-box-number">{{ $totalTodayOrder }} <small>đơn</small></span>
                                 </div> <!-- /.info-box-content -->
                             </div> <!-- /.info-box -->
                         </div> <!-- /.col -->

                         <!-- fix for small devices only -->
                         <!-- <div class="clearfix hidden-md-up"></div> -->

                         <div class="col-12 col-sm-6 col-md-2">
                             <div class="info-box">
                                 <span class="info-box-icon text-bg-success shadow-sm">
                                     <i class="bi bi-currency-dollar"></i>
                                 </span>
                                 <div class="info-box-content">
                                     <span class="info-box-text">Tổng tiền</span>
                                     <span class="info-box-number">{{ number_format($totalAmount) }}
                                         <small>VNĐ</small></span>
                                 </div> <!-- /.info-box-content -->
                             </div> <!-- /.info-box -->
                         </div> <!-- /.col -->

                         <div class="col-12 col-sm-6 col-md-3">
                             <div class="info-box">
                                 <span class="info-box-icon text-bg-warning shadow-sm">
                                     <i class="bi bi-cash-stack"></i>
                                 </span>
                                 <div class="info-box-content">
                                     <span class="info-box-text">Tổng tiền hôm nay</span>
                                     <span class="info-box-number">{{ number_format($totalTodayAmount) }}
                                         <small>VNĐ</small></span>
                                 </div> <!-- /.info-box-content -->
                             </div> <!-- /.info-box -->
                         </div> <!-- /.col -->

                         <div class="col-12 col-sm-6 col-md-2">
                             <div class="info-box">
                                 <span class="info-box-icon text-bg-info shadow-sm">
                                     <i class="bi bi-people-fill"></i>
                                 </span>
                                 <div class="info-box-content">
                                     <span class="info-box-text">Tổng khách hàng</span>
                                     <span class="info-box-number">{{ $customer }}</span>
                                 </div> <!-- /.info-box-content -->
                             </div> <!-- /.info-box -->
                         </div> <!-- /.col -->
                     </div>

                     <div class="row">
                         <div class="col-lg-12">
                             <div class="card mb-4">
                                 <div class="card-header border-0">
                                     <div class="d-flex justify-content-between">
                                         <h3 class="card-title">Sales</h3> <a href="javascript:void(0);"
                                             class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                             Report</a>
                                     </div>
                                 </div>
                                 <div class="card-body">
                                     <div class="d-flex">
                                         <p class="d-flex flex-column"> <span class="fw-bold fs-5">$18,230.00</span>
                                             <span>Sales Over Time</span>
                                         </p>
                                         <p class="ms-auto d-flex flex-column text-end"> <span class="text-success"> <i
                                                     class="bi bi-arrow-up"></i> 33.1%
                                             </span> <span class="text-secondary">Since Past Year</span> </p>
                                     </div> <!-- /.d-flex -->
                                     <div class="position-relative mb-4">
                                         <div id="sales-chart"></div>
                                     </div>
                                     <div class="d-flex flex-row justify-content-end"> <span class="me-2"> <i
                                                 class="bi bi-square-fill text-primary"></i> This year
                                         </span> <span> <i class="bi bi-square-fill text-secondary"></i> Last year
                                         </span> </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="card mb-4">
                                 <div class="card-header border-0">
                                     <h3 class="card-title">Đơn hàng mới nhất</h3>
                                     <div class="card-tools"> <a href="#" class="btn btn-tool btn-sm"> <i
                                                 class="bi bi-download"></i> </a> <a href="#"
                                             class="btn btn-tool btn-sm">
                                             <i class="bi bi-list"></i> </a> </div>
                                 </div>
                                 <div class="card-body table-responsive p-0">
                                     <table class="table table-striped align-middle">
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
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach ($latestOrder as $value)
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
                                                         <a href="{{ url('admin/order/detail/' . $value->id) }}"
                                                             class="btn btn-warning">Chi
                                                             tiết</a>
                                                     </td>
                                                 </tr>
                                             @endforeach
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div> <!--end::Row-->
                 </div> <!--end::Container-->
             </div> <!--end::App Content-->
         </main> <!--end::App Main--> <!--begin::Footer-->
     </div>
 @endsection
