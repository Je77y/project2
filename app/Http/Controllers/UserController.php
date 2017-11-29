<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getDanhSach()
    {
    	$DSuser = User::orderBy('created_at', 'DESC')->simplePaginate(9);
    	return view('admin/user/danhsach', compact('DSuser'));
    }

    public function getThem()
    {
    	return view('admin/user/them');
    }

    public function postThem(UserRequest $request)
    {

    	return redirect('admin/user/them')->with('thongbao', 'Them thanh cong');
    }

    public function getSua($id)
    {
    	$user = User::find($id);
    	return view('admin/user/sua', compact('user'));
    }

    public function postSua(UserRequest $request, $id)
    {
    	return redirect('admin/user/sua/'. $id)->with('thongbao', 'Sua thanh cong');
    }

    public function getXoa($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/user/danhsach')->with('thongbao', 'Xoa thanh cong');
    }
}
