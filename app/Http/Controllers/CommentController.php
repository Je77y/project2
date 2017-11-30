<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    public function getXoa($id, $idTinTuc)
    {
    	$comment = Comment::find($id);
    	$comment->delete();
    	return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa thành công');
    }

    public function binhluan(CommentRequest $request, $id, $tenbaiviet)
    {
        $binhluan = new Comment;
        $binhluan->NoiDung = $request->get('binhluan');
        $binhluan->idUser = Auth::User()->id;
        $binhluan->idTinTuc = $id;
        $binhluan->save();
        return redirect('tintuc/'. $id.'/'. $tenbaiviet);
    }
}
