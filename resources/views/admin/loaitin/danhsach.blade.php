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
            @if (session('thongbao'))
            <div class="col-lg-12">
                <div class="alert-success alert">
                    {{ session('thongbao') }}
                </div>
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <form action="" method="POST" accept-charset="utf-8" class="form-inline">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <br/>
            <table class="table table-striped table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ten</th>
                        <th>Ten khong dau</th>
                        <th>The loai</th>
                        <th>Ngay tao</th>
                        <th>Ngay cap nhat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DSloaitin as $loaitin)
                    <tr class="odd gradeX">
                        <td>{{ $loaitin->id }}</td>
                        <td>{{ $loaitin->Ten}}</td>
                        <td>{{ $loaitin->TenKhongDau }}</td>
                        <td>{{ $loaitin->theloai->Ten }}</td>
                        <td>{{ $loaitin->created_at}}</td>
                        <td>{{ $loaitin->created_at}}</td>
                        <td class="center">
                            <a href="/admin/loaitin/sua/{{ $loaitin->id }}"><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="/admin/loaitin/xoa/{{ $loaitin->id }}"><i class="fa fa-trash-o  fa-fw"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-lg-12 text-center">
                {!! $DSloaitin->render() !!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
