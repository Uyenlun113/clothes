@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper p-5">
        <div class="container">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 fw-bold">Sửa sản phẩm</h5>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-bold">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('name', $product->name) }}"
                                    name="name" id="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="code" class="form-label fw-bold">Code <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('code', $product->code) }}"
                                    name="code" id="code">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label fw-bold">Category <span
                                        class="text-danger">*</span></label>
                                <select id="ChangeCategory" name="category_id" class="form-select">
                                    <option value="">--Chọn danh mục--</option>
                                    @foreach ($categories as $value)
                                        <option {{ $product->category_id == $value->id ? 'selected' : '' }}
                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sub_category_id" class="form-label fw-bold">Sub Category <span
                                        class="text-danger">*</span></label>
                                <select id="getSubCategory" name="sub_category_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($get_sub_category as $value)
                                        <option {{ $product->sub_category_id == $value->id ? 'selected' : '' }}
                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Color <span class="text-danger">*</span></label>
                                @foreach ($color as $value)
                                    @php
                                        $checked = '';
                                    @endphp
                                    @foreach ($product->getColor as $pcolor)
                                        @if ($pcolor->color_id == $value->id)
                                            @php
                                                $checked = 'checked';
                                            @endphp
                                        @endif
                                    @endforeach
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input {{ $checked }} type="checkbox" name="color_id[]"
                                                value="{{ $value->id }}">
                                            {{ $value->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label fw-bold">Price <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ old('price', $product->price) }}" name="price"
                        id="price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="old_price" class="form-label fw-bold">Old Price <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ old('old_price', $product->old_price) }}"
                        name="old_price" id="old_price">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Size <span class="text-danger">*</span></label>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="AppendSize">

                            @foreach ($product->getSize as $size)
                                <tr>
                                    <td><input type="text" value="{{ $size->name }}" name="size[100][name]"
                                            class="form-control"></td>
                                    <td><input type="text" value="{{ $size->price }}" name="size[100][price]"
                                            class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger DeleteSize">Delete</button></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><input type="text" name="size[101][name]" class="form-control"></td>
                                <td><input type="text" name="size[101][price]" class="form-control"></td>
                                <td><button type="button" class="btn btn-primary AddSize">Add</button></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="size[102][name]" class="form-control"></td>
                                <td><input type="text" name="size[102][price]" class="form-control"></td>
                                <td><button type="button" class="btn btn-primary AddSize">Add</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="" class="form-label fw-bold">Image <span class="text-danger">*</span></label>
                    <input type="file" name="image[]" class="form-control" multiple accept="image/*">
                </div>
            </div>
            @if (!empty($product->getImage) && $product->getImage->count() > 0)
                <div class="row">
                    @foreach ($product->getImage as $image)
                        @if (!empty($image->getLogo()))
                            <div class="col-md-2">
                                <img src="{{ $image->getLogo() }}" alt="Product Image" width="100%" height="200px">
                                <a href="{{ url('admin/product/image_delete/' . $image->id) }}" style="margin-top: 10px"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <hr>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="short_description" class="form-label fw-bold">Short Description <span
                            class="text-danger">*</span></label>
                    <textarea name="short_description" class="form-control" rows="3">{{ $product->short_description }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="description" class="form-label fw-bold">Description <span
                            class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="status" class="form-label fw-bold">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Active</option>
                        <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var i = 101;

                $('body').on('click', '.AddSize', function() {
                    var html = '<tr id="DeleteSize' + i + '">\n' +
                        '    <td>\n' +
                        '        <input type="text" name="size[' + i + '][name]" class="form-control">\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <input type="text" name="size[' + i + '][price]" class="form-control">\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <button type="button" id="' + i +
                        '" class="btn btn-danger DeleteSize">Delete</button>\n' +
                        '    </td>\n' +
                        '</tr>';
                    i++;
                    console.log(html);
                    $('#AppendSize').append(html);
                });

                $('body').on('click', '.DeleteSize', function() {
                    var id = $(this).attr('id');
                    $('#DeleteSize' + id).remove();
                });

                $(document).on('change', '#ChangeCategory', function(e) {
                    var id = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/get_sub_category') }}",
                        data: {
                            "id": id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#getSubCategory').html(data.html);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching subcategories:', error);
                        }
                    });
                });
            });
        </script>
        </form>
    </div>
    </div>
    </div>
@endsection

@section('script')
@endsection
