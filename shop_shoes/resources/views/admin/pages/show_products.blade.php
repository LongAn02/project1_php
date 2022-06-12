@extends('admin.index')
@section('main-admin')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">SẢN PHẨM</h3>
        <span>
            <form class="d-flex" action="{{route('searchProductAdmin')}}" method="post">
                @csrf
                @error('input_search_productAdmin')
                    <span class="alert alert-danger me-4">{{ $message }}</span>
                @enderror
                <input class="form-control me-2" type="search" name="input_search_productAdmin" placeholder="Nhập tên sản phẩm" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
            </form>
        </span>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col" class="text-center">Hình ảnh</th>
            <th scope="col">Giá($)</th>
            <th scope="col" class="text-center">Mô tả</th>
            <th scope="col">Thương hiệu</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
        </tr>
        </thead>
        <tbody>
        @php
            $count = 1;
        @endphp
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$count++}}</th>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td class="d-flex justify-content-center">
                    <img src="{{asset('assets/img/'.$product->main_image)}}" alt="" class="w-75">
                </td>
                <td>{{$product->price}}$</td>
                <td>{{$product->description}}</td>
                <td class="text-center">{{$product->name_brand}}</td>
                <td>
                    <form action="{{route('requestProduct')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$product->id}}" name="data_id">
                        <input type="hidden" value="{{$product->name}}" name="data_name">
                        <input type="hidden" value="{{$product->description}}" name="data_description">
                        <input type="hidden" value="{{$product->price}}" name="data_price">
                        <input type="hidden" value="{{$product->brand_id}}" name="data_brand_id">
                        <button class="btn btn-success btn-update-product" type="submit">
                            <i class="fa-solid fa-wrench"></i>
                        </button>
                    </form>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-delete-product"
                            data-id="{{$product->id}}">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
    @section('ajax-cofim-delete-product')
        <script>
            $(function (){
                $('.btn-delete-product').click(function (){
                    if (confirm('Bạn có muốn xóa sản phẩm này không ? ')){
                        $.ajax({
                            url : `{{route('deleteProduct')}}`,
                            type : 'post',
                            data : {
                                id : $(this).attr('data-id'),
                                _token : $('meta[name="csrf-toker"]').attr('content')
                            },
                            success : function (data){
                                location.reload();
                            }
                        });
                    }
                })

            })
        </script>
    @endsection
@endsection
