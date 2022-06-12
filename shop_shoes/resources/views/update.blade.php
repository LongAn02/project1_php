@extends('admin.index')
@section('main-admin')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">CHỈNH SỬA SẢN PHẨM</h3>
        </span>
        </div>
        <div class="card-body container">
            <form enctype="multipart/form-data" action="{{route('updateProduct')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$data_products['id']}}" name="idProductUpdate">
                <div class="mb-3">
                    <label for="nameProductUpdate" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="nameProductUpdate" name="nameProductUpdate" value="{{$data_products['name']}}" required>
                </div>
                <div class="mb-3">
                    <label for="priceProductUpdate" class="form-label">Giá sản phẩm ($)</label>
                    <input type="number" class="form-control" id="priceProductUpdate" name="priceProductUpdate" value="{{$data_products['price']}}" required>
                </div>
                <div class="mb-3">
                    <label for="desciptionProductUpdate" class="form-label">Mô tả sản phẩm</label>
                    <input type="text" class="form-control" id="desciptionProductUpdate" name="desciptionProductUpdate" value="{{$data_products['description']}}">
                </div>

                <div class="mb-3">
                    <label for="brandProductUpdate" class="form-label">Thương hiệu</label>
                    <select name="brandProductUpdate" id="">
                        <option value="2">Adidas</option>
                        <option value="1">Nike</option>
                        <option value="3">Vans</option>
                    </select>
                </div>
                <span class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" name="submitupdateProduct">Cập nhật</button>
                </span>
            </form>


        </div>
    </div>
@endsection
