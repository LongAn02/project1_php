@extends('admin.index')
@section('main-admin')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">THÊM MỚI SẢN PHẨM</h3>
        </div>

        <div class="card-body container">
            <form enctype="multipart/form-data" action="{{route('addProduct')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nameProductAdd" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="nameProductAdd" name="nameProductAdd" required>
                </div>
                <div class="mb-3">
                    <label for="priceProductAdd" class="form-label">Giá sản phẩm ($)</label>
                    <input type="number" class="form-control" id="priceProductAdd" name="priceProductAdd" required>
                </div>
                <div class="mb-3">
                    <label for="desciptionProductAdd" class="form-label">Mô tả sản phẩm</label>
                    <input type="text" class="form-control" id="desciptionProductAdd" name="desciptionProductAdd">
                </div>
                <div class="mb-3">
                    <label for="brandProductAdd" class="form-label">Thương hiệu</label>
                    <select name="brandProductAdd" id="">
                        <option value="2">Adidas</option>
                        <option value="1">Nike</option>
                        <option value="3">Vans</option>
                    </select>
                </div>
                <div class="mb-3 d-flex">
                    <div>
                        <label for="main_imageProductAdd">Hình ảnh sản phẩm</label>
                        <input type="file" id="main_imageProductAdd" name="main_imageProductAdd" accept="image/*">
                    </div>
                    <div>
                        <label for="img_spProductAdd">Hình ảnh phụ</label>
                        <input type="file" id="img_spProductAdd" name="img_spProductAdd" accept="image/*">
                    </div>
                </div>
                <span class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" name="submitaddProduct">Thêm mới</button>
                </span>
            </form>
        </div>
    </div>


@endsection


