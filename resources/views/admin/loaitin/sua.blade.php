@extends('admin/layout/index') @section('title', 'Sua the loai') @section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loai tin
                            <small>Sua</small>
                        </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Danh sach the loai</label>
                        <select class="form-control">
                            <option value="0">Chon mot the loai</option>
                            <option value="">Tin Tức</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ten</label>
                        <input class="form-control" name="txtCateName" placeholder="Ten" />
                    </div>
                    <div class="form-group">
                        <label>Ten khong dau</label>
                        <input class="form-control" name="txtOrder" placeholder="Ten khong dau" />
                    </div>
                    <button type="submit" class="btn btn-primary">Sua</button>
                    <button type="reset" class="btn btn-default">Lam lai</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
