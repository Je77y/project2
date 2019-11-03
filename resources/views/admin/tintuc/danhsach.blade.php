@extends('admin/layout/index') @section('title', 'Danh sach the loai') @section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                            <small>Danh sách</small>
                        </h1>
            </div>

            @if (session('thongbao'))
            <div class="col-lg-12">
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            </div>
            @endif 

            <!-- /.col-lg-12 -->
            <form action="#" method="POST" accept-charset="utf-8" class="form-inline pull-right">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="tukhoa">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br/>
            <table class="table table-striped table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tóm tắt</th>
                        <th>Loại tin</th>
                        <th>Xem</th>
                        <th>Nổi bật</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DStintuc as $tintuc)
                    <tr class="odd gradeX">
                        <td>{{ $tintuc->id }}</td>
                        <td>{{ $tintuc->TieuDe }}<br/>
                            <img src="upload/tintuc/{{ $tintuc->Hinh }}" width="100px" height="100px">
                        </td>
                        <td>{{ $tintuc->TomTat }}</td>
                        <td>{{ $tintuc->loaitin->Ten }}</td>
                        <td>{{ $tintuc->SoLuotXem }}</td>
                        <td>
                            @if ($tintuc->NoiBat == 0)
                                {{"Khong"}}
                            @else
                                {{"Co"}}
                            @endif
                        </td>
                        <td class="center">
                            <a href="/admin/tintuc/sua/{{ $tintuc->id }}" style="color: #337ab7"><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="/admin/tintuc/xoa/{{ $tintuc->id }}" style="color: red"><i class="fa fa-trash-o  fa-fw"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-lg-12 text-center">
                {!! $DStintuc->render() !!}
            </div>
        </div>

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
