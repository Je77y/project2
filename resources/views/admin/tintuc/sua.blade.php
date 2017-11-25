@extends('admin/layout/index') 
@section('title', 'Sua the loai') 
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tuc
                            <small>{{ $tintuc->TieuDe }}</small>
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
                @elseif (session('loi'))
                    <div class="alert alert-danger">
                        {{ session('loi') }}
                    </div>
                @endif

                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif

                <form action="admin/tintuc/sua/{{ $tintuc->id }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>The loai</label>
                        <select class="form-control" name="idTheLoai" id="TheLoai">
                            @foreach ($DStheloai as $theloai)
                                <option 
                                    @if ($tintuc->loaitin->theloai->id == $theloai->id)
                                        {{"selected"}}
                                    @endif
                                value="{{ $theloai->id }}">{{ $theloai->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loai tin</label>
                        <select class="form-control" name="idLoaiTin" id="LoaiTin">
                            @foreach ($DSloaitin as $loaitin)
                                <option 
                                    @if ($loaitin->id == $tintuc->idLoaiTin)
                                        {{"selected"}}
                                    @endif
                                     value="{{ $loaitin->id }}">{{ $loaitin->Ten }}</option>
                            @endforeach                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tieu de</label>
                        <input class="form-control" name="tieude" placeholder="Tieu de bai viet" value="{{ $tintuc->TieuDe }}"/>
                    </div>
                    <div class="form-group">
                        <label>Tom tat</label>
                        <textarea class="form-control ckeditor" rows="6" name="tomtat" >{{ $tintuc->TomTat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Noi dung</label>
                        <textarea class="form-control ckeditor" rows="6" name="noidung" >{{ $tintuc->NoiDung }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Noi bat</label>
                        <label class="radio-inline">
                            <input
                                @if ($tintuc->NoiBat == 1)
                                    {{"checked"}}
                                @endif 
                                name="noibat" value="1" type="radio">Co
                        </label>
                        <label class="radio-inline">
                            <input 
                                @if ($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                @endif
                                name="noibat" value="0" type="radio">Khong
                        </label>
                    </div>
                    <div class="form-group">
                        <label>File input</label>
                        <p>
                            <img src="upload/tintuc/{{ $tintuc->Hinh }}" width="400px" height="250px">
                        </p>
                        <input class="form-control-file" name="hinhanh" type="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Sua</button>
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
            $("#TheLoai").change(function() {
                var idTheLoai = $(this).val();
                $.get('admin/ajax/loaitin/'+idTheLoai, function(data) {
                    $('#LoaiTin').html(data);
                });
            });
        });
    </script>
@endsection
