@section('title','Đăng nhập')
<!doctype html>
<html lang="en">
    <head>
        @include('users.layout.head')
    </head>
    <body id="body-login-register">
        <div class="container container-login border">
            <span class="d-flex justify-content-center mt-4">
                <img src="{{asset('assets/img/logo_shop.png')}}" alt="" >
                <span class="d-flex align-items-center">
                    <h2 class="fw-bold mt-3">Đăng Nhập</h2>
                </span>
            </span>
            <form action="{{route('loginUser')}}" name="from-login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email_Login" class="form-label label-color">Email</label>
                    @error('email_Login')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                    <input type="email" class="form-control form-input" id="email_Login" name="email_Login" required>
                </div>
                <div class="mb-3">
                    <label for="pass_Login" class="form-label label-color">Password</label>
                    @error('pass_Login')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                    <input type="password" class="form-control form-input" id="pass_Login" name="pass_Login" required>
                </div>
                @if (session('erro'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session('erro') }}</li>
                        </ul>
                    </div>
                @endif
                <span class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mb-4 label-color" name="submit-login">Đăng nhập</button>
                </span>
            </form>
            <span class="d-flex justify-content-center">Bạn chưa có tài khoản ?<a href="{{route('register')}}" class="link-warning ms-2">Đăng ký</a></span>
        </div>
        @include('users.layout.scripts')
    </body>
</html>
