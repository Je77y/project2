@extends('admin/layout/index') @section('title', 'Danh sach the loai') @section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                            <small>Danh sách</small>
                        </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Hình</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DSslide as $slide)
                        <tr>
                            <td>{{ $slide->id }}</td>
                            <td>{{ $slide->Ten }}</td>
                            <td>{{ $slide->NoiDung }}</td>
                            <td><img width="350px" height="150px" src="upload/slide/{{ $slide->Hinh }}"></td>
                            <td class="center">
                                <a href="/admin/slide/sua/{{ $slide->id }}"><i class="fa fa-pencil fa-fw"></i></a>
                                <a href="/admin/slide/xoa/{{ $slide->id }}"><i class="fa fa-trash-o  fa-fw"></i></a>
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
