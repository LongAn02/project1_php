@section('title','Sản phẩm nike')
    <!doctype html>
<html lang="en">
<head>
    @include('users.layout.head')
</head>
    <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        @include('users.layout.navigation')
    </nav>

    <div class="container mt-5 mb-5">
        <table class="table border">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Hình ảnh sản phẩm</th>
                <th scope="col">Số lượng sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">xóa</th>
            </tr>
            </thead>
            <tbody>
            @if($cartItem != null && count($cartItem) > 0)
            @php
                $totalMoney = 0;
            @endphp
                @foreach($cartItem as $key =>$item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img style="width: 150px;" src="{{asset('assets/img/' . $item->main_image)}}" alt=""></td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $sum = $item->price * $item->quantity }}</td>
                        <td><i class="fa-solid fa-trash-can"></i></td>
                    </tr>
                    @php
                        $totalMoney += $sum;
                    @endphp
                @endforeach
            @else
                <tr>
                    <td>
                        Gio hang trong
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            @if($cartItem != null && count($cartItem) > 0)
            <h2>Tổng tiền : {{ $totalMoney }}</h2>
                <button class="btn btn-primary" id="checkOut" data-shopping="{{ $shoppingId ?? null }}">Mua hàng</button>
            @endif

        </div>
    </div>

    <!-- Contact-->
    <section class="contact-section bg-black">
        @include('users.layout.contact')
    </section>
    <!-- Footer-->
    @include('users.layout.footer')
    @include('users.layout.scripts')

    @yield('ajax-modal-product')
    <script>
        $('#checkOut').click(function (){
            let shoppingId = $(this).data('shopping');
            if(shoppingId != null) {
                $.ajax({
                    url : `{{route('checkout')}}`,
                    type : 'post',
                    data : {
                        id : shoppingId,
                        _token : $('meta[name="csrf-toker"]').attr('content')
                    },
                    success : function (data){
                        Swal.fire(
                            'Thông báo!',
                            'Đã gửi yêu cầu mua hàng, vui lòng chờ phê duyệt!',
                            'success'
                        );
                        location.reload();
                    }
                });
            }
        });
    </script>
    </body>
</html>
