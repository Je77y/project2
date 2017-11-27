@extends('admin/layout/index') 
@section('title', 'Them the loai')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                            <small>Thêm mới</small>
                        </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{ $err }}<br/>
                        @endforeach
                    </div>
                @endif

                @if (session('thongbao'))
                    <div class="alert-success alert">
                        {{ session('thongbao') }}
                    </div>                     
                @endif
                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="idTheLoai" id="TheLoai">
                            @foreach ($DStheloai as $theloai)
                            <option value="{{ $theloai->id }}">{{ $theloai->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="idLoaiTin" id="LoaiTin">
                            @foreach ($DSloaitin as $loaitin)
                            <option value="{{ $loaitin->id }}">{{ $loaitin->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="tieude" placeholder="Tieu de bai viet" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea class="form-control ckeditor" rows="3" name="tomtat" placeholder="Tom tat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="noidung" class="form-control ckeditor" rows="12" placeholder="Noi dung chinh"></textarea>
                    </div>
                    <fieldset class="form-group">
                        <label>Nởi bật</label>
                        <div class="form-check">
                            <input class="form-check-input" name="noibat" checked type="radio"> Có
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="noibat" type="radio"> Không
                        </div>
                    </fieldset>
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

@section('script')
    <script>
        $(document).ready(function() {
            $("#TheLoai").change(function() {
                var idTheLoai = $(this).val();
                $.get('admin/ajax/loaitin/'+idTheLoai, function(data) {
                    $('#LoaiTin').html(data);
                });
            });
        });
    </script>
@endsection
