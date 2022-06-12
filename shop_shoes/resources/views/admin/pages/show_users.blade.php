@extends('admin.index')
@section('main-admin')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">TÀI KHOẢN USERS</h3>
        <span>
            <form class="d-flex" action="{{route('searchUserAdmin')}}" method="POST">
                @csrf
                @error('input_search_user')
                    <span class="alert alert-danger me-4">{{ $message }}</span>
                @enderror
                <input class="form-control me-2" type="search" placeholder="Số điện thoại User" aria-label="Search" name="input_search_user">
                <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
            </form>
        </span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">ID</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Role</th>
                        <th scope="col">Cart</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button class="btn btn-success">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-delete-user"
                                    data-id="{{ $user->id }}"data-bs-toggle="modal" data-bs-target="#show_user_confim">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
    @section('ajax-delete-user')
        <script !src="">
            $(function (){
                $('.btn-delete-user').click(function (){
                    if (confirm('Bạn có muốn xóa User này không ? ')){
                        $.ajax({
                            url : `{{route('deleteUser')}}`,
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
                });
            })
        </script>
    @endsection
@endsection

