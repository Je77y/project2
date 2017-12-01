@extends('admin/layout/index') 
@section('title', 'Them the loai')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">The loai
                            <small>Them</small>
                        </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Ten</label>
                        <input class="form-control" name="txtCateName" placeholder="Ten" />
                    </div>
                    <div class="form-group">
                        <label>Ten khong dau</label>
                        <input class="form-control" name="txtOrder" placeholder="Ten khong dau" />
                    </div>
                    <button type="submit" class="btn btn-primary">Them</button>
                    <button type="reset" class="btn btn-default">Lam lai</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
