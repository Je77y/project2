@extends('admin/layout/index') @section('title', 'Quan ly ho so') @section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                            <small>Ho so</small>
                        </h1>
            </div>
            <div class="col-lg-offset-2 col-lg-8">
                @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissable">
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
                @elseif (session('thongbao'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thong bao !</strong>
                    <p>{{ session('thongbao') }}</p>
                </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-offset-2 col-lg-8" style="padding-bottom:120px">
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Ten hien thi</label>
                        <input class="form-control" name="name" disabled value="{{ $user->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{{ $user->email }}" disabled/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="checkpass" id="checkPass">
                        <label>Mat khau</label>
                        <input type="password" class="form-control" name="password" placeholder="Mat khau" disabled />
                    </div>
                    <div class="form-group">
                        <label>Xac nhan mat khau</label>
                        <input type="password" class="form-control" name="passwordAgain" placeholder="Xac nhan mat khau" disabled/>
                    </div>
                    <button type="submit" class="btn btn-primary">Cap nhat</button>
                    <button type="reset" class="btn btn-default">Lam moi</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#checkPass').change(function(){
            if ($(this).is(":checked")){
                $(':password').removeAttr('disabled');
            } else {
                $(':password').attr('disabled', '');
            }
        });
    });
</script>
@endsection