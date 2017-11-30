@extends('layout/base') @section('title', 'Tim kiem') @section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        @include('layout/menu')
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Tim kiem: {{ $tukhoa }}</b></h4>
                </div>
                @foreach ($DStintuc as $tintuc)
                <div class="row-item row">
                    <div class="col-md-3">
                        <a href="detail.html">
                            <br>
                            <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{ $tintuc->Hinh }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h3>{{ $tintuc->TieuDe }}</h3>
                        <p>{{ $tintuc->TomTat }}</p>
                        <a class="btn btn-primary" href="/tintuc/{{ $tintuc->id }}/{{ $tintuc->TieuDeKhongDau }}">Xem tiep <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="break"></div>
                </div>
                @endforeach
                <!-- Pagination -->
                <div class="row text-center">
                    <div class="col-lg-12">
                        {!! $DStintuc->render() !!}
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>
<!-- end Page Content -->
@endsection
