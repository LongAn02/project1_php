@section('title','Đăng ký')
<!doctype html>
<html lang="en">
    <head>
        @include('users.layout.head')
    </head>
    <body id="body-login-register">
    <div class="container container-register border">
        <span class="d-flex justify-content-center mt-4">
            <img src="{{asset('assets/img/logo_shop.png')}}" alt="" >
                <span class="d-flex align-items-center">
                    <h2 class="fw-bold mt-3">Đăng Ký</h2>
                </span>
        </span>
        <form action="{{route('createUser')}}" name="from-register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_name_register" class="form-label label-color">User name</label>
                @error('user_name_register')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="form-control form-input" id="user_name_register" name="user_name_register" required>
            </div>
            <div class="mb-3">
                <label for="password_register" class="form-label label-color">Password</label>
                @error('password_register')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <input type="password" class="form-control form-input" id="password_register" name="password_register" required>
            </div>
            <div class="mb-3">
                <label for="email_register" class="form-label label-color">Email</label>
                @error('email_register')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <input type="email" class="form-control form-input" id="email_register" name="email_register" required>
            </div>
            <div class="mb-3">

                <label for="phone_register" class="form-label label-color">Phone</label>
                @error('phone_register')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <input type="number" class="form-control form-input" id="phone_register" name="phone_register" required>
            </div>
            <div class="mb-3">
                <label for="address_register" class="form-label label-color">Address</label>
                @error('address_register')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="form-control form-input" id="address_register" name="address_register" required>
            </div>
            <span class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success mb-4 label-color" name="submit-register">Đăng ký</button>
            </span>
        </form>
        <span class="d-flex justify-content-center">Bạn đã có tài khoản ?<a href="{{route('login')}}" class="link-warning ms-2">Đăng nhập</a></span>
    </div>
    @include('users.layout.scripts')
    </body>
</html>
