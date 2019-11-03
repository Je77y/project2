@extends('layout/base') @section('title', 'Tin tuc') @section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-9">
            <!-- Blog Post -->
            <!-- Title -->
            <h1>{{ $tintuc->TieuDe }}</h1>
            <!-- Author -->
            <p class="lead">
                by <a href="#">Start Bootstrap</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('d-m-Y', strtotime($tintuc->created_at)) }}</p>
            <!-- Preview Image -->
            <img class="img-responsive" src="upload/tintuc/{{ $tintuc->Hinh }}" alt="" width="800px" height="200px">
            <!-- Date/Time -->
            
            <hr>
            <!-- Post Content -->
            <p class="lead">{!! $tintuc->NoiDung !!}</p>
            <hr>

            @if (Auth::User())
                <!-- Blog Comments -->
                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" method="POST" action="/binhluan/{{ $tintuc->id }}/{{ $tintuc->TieuDeKhongDau }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Binh luan cua ban ve bai viet" name="binhluan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                <hr>
            @endif
            
            <!-- Posted Comments -->
            @foreach ($DScomment as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->user->name }}
                            <small>{{ date('d-m-Y', strtotime($comment->created_at)) }}</small>
                        </h4>{{ $comment->NoiDung }}
                </div>
            </div>
            @endforeach

        </div>
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
                	@foreach ($DStinlienquan as $tlq)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="/tintuc/{{ $tlq->id }}/{{ $tlq->TieuDeKhongDau }}">
                                    <img class="img-responsive" src="upload/tintuc/{{ $tlq->Hinh }}" alt="">
                                </a>
                        </div>
                        <div class="col-md-7">
                            <a href="/tintuc/{{ $tlq->id }}/{{ $tlq->TieuDeKhongDau }}"><b>{{ $tlq->TieuDe }}</b></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
                	@foreach ($DStinnoibat as $tnb)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="/tintuc/{{ $tnb->id }}/{{ $tnb->TieuDeKhongDau }}">
                                    <img class="img-responsive" src="upload/tintuc/{{ $tnb->Hinh }}" alt="">
                                </a>
                        </div>
                        <div class="col-md-7">
                            <a href="/tintuc/{{ $tnb->id }}/{{ $tnb->TieuDeKhongDau }}"><b>{{ $tnb->TieuDe }}</b></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection
