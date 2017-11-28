@extends('admin/layout/index') @section('title', 'Sua the loai') @section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                            <small>Sửa</small>
                        </h1>
            </div>
            <div class="col-lg-12">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }}<br/>
                    @endforeach
                </div>
                @endif
                @if (session('thongbao'))
                <div class="alert alert-danger">
                    {{ session('thongbao') }}
                </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="admin/slide/sua/{{ $slide->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="ten" placeholder="Tên hình ảnh" value="{{ $slide->Ten }}"/>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control ckeditor" name="mota" placeholder="Mô tả">{{ $slide->NoiDung }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <input class="form-control" name="link" placeholder="Đường dẫn" value="{{ $slide->link }}"/>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p><img width="450px" height="250px" src="upload/slide/{{ $slide->Hinh }}" /></p>
                        <input class="form-control-file" name="hinhanh" type="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
