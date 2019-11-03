@extends('admin/layout/index') 
@section('title', 'Thêm Slide')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                            <small>Thêm</small>
                        </h1>
            </div>
            <div class="col-lg-12">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }}<br/>
                    @endforeach
                </div>
                @elseif (session('loi'))
                <div class="alert-danger alert">
                    {{ session('loi') }}
                </div>
                @elseif (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="ten" placeholder="Tên hình ảnh" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control ckeditor" name="mota" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <input class="form-control" name="link" placeholder="Đường dẫn" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input class="form-control-file" name="hinhanh" type="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
