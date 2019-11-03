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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                @if (session('thongbao'))
                    <div class="alert alert-success">{{ session('thongbao') }}</div>
                @endif
                <form action="/admin/theloai/them" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Ten</label>
                        <input class="form-control" name="name" placeholder="Ten" />
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
