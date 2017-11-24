@extends('admin/layout/index') @section('title', 'Danh sach the loai') @section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                            <small>Danh sach</small>
                        </h1>
            </div>
            <!-- /.col-lg-12 -->
            <form action="#" method="POST" accept-charset="utf-8" class="form-inline">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search" name="tukhoa">
                </div>
            </form>
            <table class="table table-striped table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ten</th>
                        <th>Ngay tao</th>
                        <th>Ngay sua</th>
                        <th>So luot xem</th>
                        <th>Loai tin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DStintuc as $tintuc)
                    <tr class="odd gradeX">
                        <td>{{ $tintuc->id }}</td>
                        <td>{{ $tintuc->TieuDe }}</td>
                        <td>{{ $tintuc->created_at }}</td>
                        <td>{{ $tintuc->updated_at }}</td>
                        <td>{{ $tintuc->SoLuotXem }}</td>
                        <td>{{ $tintuc->loaitin->Ten }}</td>
                        <td class="center">
                            <a href="/admin/tintuc/sua/{{ $tintuc->id }}"><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="/admin/tintuc/xoa/{{ $tintuc->id }}"><i class="fa fa-trash-o  fa-fw"></i></a>
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
