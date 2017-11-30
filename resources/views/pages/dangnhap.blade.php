@extends('layout/base')
@section('title', 'Dang nhap')
@section('content')
 <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
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
                        @elseif (session('loi'))
                        <div class="alert alert-warning alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Loi!</strong>
                            <p>{{ session('loi') }}</p>
                        </div>
                        @endif
				    	<form method="POST" action="dangnhap">
				    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div>
				    			<label>Email</label>
							  	<input type="text" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password" placeholder="Mat khau">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection
