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
        <table class="table table-bordered ml-3 mr-3">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số lượng sản phẩm</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Chi tiết</th>
                <th scope="col" class="text-center">Xác nhận</th>
            </tr>
            </thead>
            <tbody>
                @if($data != null && count($data) > 0)
                    @foreach($data as $key =>$value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{  round($value->total) }}</td>
                            @if($value->status == 1)
                                <td style="color: red">Chờ xác nhận</td>
                            @else
                                <td style="color: success">Đang giao hàng</td>
                            @endif
                            <td>
                                <button class="btn btn-primary">Chi tiết</button>
                            </td>
                            <td>
                            @if($value->status == 1)
                                <button class="btn btn-success" id="accept" data-order="{{ $value->id }}">Xác nhận</button>
                            @else
                                <button class="btn btn-danger" id="cancel" data-order="{{ $value->id }}">Hủy đơn</button>
                            @endif

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@section('ajax-cofim-delete-product')
    <script>
        $(function (){
            $('#cancel').click(function (){
                if (confirm('Bạn có muốn hủy đơn hàng này không ? ')){
                    $.ajax({
                        url : `{{route('cancelCart')}}`,
                        type : 'post',
                        data : {
                            id : $(this).data('order'),
                            _token : $('meta[name="csrf-toker"]').attr('content')
                        },
                        success : function (data){
                            Swal.fire(
                                'Thông báo!',
                                'Đã hủy đơn hàng!',
                                'success'
                            )
                            location.reload();
                        }
                    });
                }
            })

            $('#accept').click(function (){
                $.ajax({
                    url : `{{route('acceptCart')}}`,
                    type : 'post',
                    data : {
                        id : $(this).data('order'),
                        _token : $('meta[name="csrf-toker"]').attr('content')
                    },
                    success : function (data){
                        Swal.fire(
                            'Thông báo!',
                            'Đã xác nhận đơn hàng!',
                            'success'
                        )
                        location.reload();
                    }
                });
            })

        })
    </script>
@endsection
@endsection
