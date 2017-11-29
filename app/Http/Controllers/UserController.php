<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getDangNhapAdmin()
    {
        if (Auth::check())
        {
            return redirect('/');            
        }
        return view('admin/login');
    }

    public function postDangNhapAdmin(UserRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        // $user = User::where('email', $email)->where('password', $password)->where('level', 1)->first();
        // if ($user)
        // {
        //     return redirect('/');
        // }
        $data = [
            'email'         => $email,
            'password'      => $password
        ];
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect('/');
        }        
        return redirect()->back()->with('thongbao', 'Email hoac mat khau khong dung');
    }

    public function getLogout()
    {
        return redirect('admin/dangnhap');
    }

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
