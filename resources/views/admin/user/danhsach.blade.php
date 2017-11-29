@extends('admin/layout/index') @section('title', 'Danh sach the loai') @section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                            <small>Danh sach</small>
                        </h1>
            </div>
            <!-- /.col-lg-12 -->
            <form action="" method="POST" accept-charset="utf-8" class="form-inline pull-right" >
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br/>
            <br/>

            <table class="table table-striped table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Ten </th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Ngay tao</th>
                        <th>Ngay cap nhat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DSuser as $user)
                        <tr class="odd gradeX">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->level == -1)
                                    {!! "<span>Not activated</span>" !!}
                                @elseif ($user->level == 0)
                                    {!! "<span>User</span>" !!}
                                @elseif ($user->level == 1)
                                    {!! "<span>Admin</span>" !!}
                                @else 
                                    {!! "<span>Lock</span>" !!} 
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td class="center">
                                <a href="/admin/user/xoa/{{ $user->id }}" style="color: red"><i class="fa fa-trash-o  fa-fw"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-lg-12 text-center">
                {!! $DSuser->render() !!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('td>span').each(function(){
                var giatri = $(this).html();
                switch (giatri) {
                    case "Admin":
                        $(this).addClass('label').addClass('label-primary');
                        break;
                    case "User":
                        $(this).addClass('label').addClass('label-success');
                        break;
                    case "Not activated":
                        $(this).addClass('label').addClass('label-warning');
                        break;
                    default:
                        $(this).addClass('label').addClass('label-danger');
                }
            });
            //location.reload();
        });
    </script>
@endsection