<div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="#page-top">
        <img src="{{asset('assets/img/logo05.png')}}" alt="">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{route('home')}}">TRANG CHỦ</a></li>
            <li class="nav-item"><a class="nav-link" href="#projects">BÀI VIẾT</a></li>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">SẢN PHẨM</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{route('products_adidas')}}">Adidas</a></li>
                    <li><a class="dropdown-item" href="{{route('products_nike')}}">Nike</a></li>
                    <li><a class="dropdown-item" href="{{route('products_vans')}}">Vans</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(\Illuminate\Support\Facades\Session::has('userName'))
                        <span class="text-warning">{{\Illuminate\Support\Facades\Session::get('userName')}}</span>
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Tài Khoản</a></li>
                    <li><a class="dropdown-item" href="{{route('shoppingCart')}}">Giỏ Hàng</a></li>
                    <li><a class="dropdown-item" href="{{route('logoutUser')}}">Đăng Xuất</a></li>
                </ul>
            </div>
        </ul>
    </div>
</div>
