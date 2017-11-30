@extends('layout/base') @section('title', 'Ho so ca nhan') @section('content')
<!-- Page Content -->
<div class="container">
    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Thông tin tài khoản</div>
                <div class="panel-body">
                	@if (count($errors) > 0)
                    <div class="alert alert-warning alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Loi !</strong>
                        <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @elseif (session('thongbao'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Thong bao !</strong>
                        <p>{{ session('thongbao') }}</p>
                    </div>
                    @endif
                    <form action="/taikhoan" method="POST">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <label>Họ tên</label>
                            <input type="text" class="form-control" placeholder="Ten su dung" name="name" disabled value="{{ $user->name }}">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" disabled value="{{ $user->email }}">
                        </div>
                        <br>
                        <div>
                        	<input type="checkbox" name="checkpass" id="checkPass">
                            <label>Đổi mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Mat khau" disabled>
                        </div>
                        <br>
                        <div>
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="passwordAgain" placeholder="Nhap lai mat khau" disabled>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection

@section('script')
	<script>
		$(document).ready(function(){
			$('#checkPass').change(function(){
				if($(this).is(':checked')){
					$(':password').removeAttr('disabled');
				} else {
					$(':password').attr('disabled', '');
				}
			});
		});
	</script>
@endsection
