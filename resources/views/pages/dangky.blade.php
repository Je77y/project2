@extends('layout/base') @section('title', 'Dang ky tai khoan') @section('content')
<!-- Page Content -->
<div class="container">
    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Đăng ký tài khoản</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-warning alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Loi!</strong>
                            <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/dangky">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <label>Họ tên</label>
                            <input type="text" class="form-control" placeholder="Ten hien thi" name="name">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                        <br>
                        <div>
                            <label>Nhập mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Mat khau">
                        </div>
                        <br>
                        <div>
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="passwordAgain" placeholder="Nhap lai mat khau">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Đăng ký
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection
