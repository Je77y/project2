@extends('admin/layout/index') @section('title', 'Danh sach the loai') @section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">The loai
                            <small>Danh sach</small>
                        </h1>
            </div>
            <div class="col-md-12">
                @if (session('thongbao'))
                <div class="alert-success alert">
                    {{session('thongbao')}}
                </div>
                @endif
            </div>
            <!-- /.col-l-12 -->
            <form action="" method="POST" accept-charset="utf-8" class="form-inline">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <br>
            <table class="table table-striped table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ten</th>
                        <th>Ten khong dau</th>
                        <th>Ngay tao</th>
                        <th>Ngay cap nhat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DStheloai as $theloai)
                    <tr class="odd gradeX">
                        <td>{{ $theloai->id }}</td>
                        <td>{{ $theloai->Ten }}</td>
                        <td>{{ $theloai->TenKhongDau }}</td>
                        <td>{{ $theloai->created_at }}</td>
                        <td>{{ $theloai->updated_at }}</td>
                        <td class="center">
                            <a href="/admin/theloai/sua/{{ $theloai->id }}"><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="/admin/theloai/xoa/{{ $theloai->id }}"><i class="fa fa-trash-o  fa-fw"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection