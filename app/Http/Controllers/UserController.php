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
        //     session('taikhoan', $user);
        //     return redirect('/');;
        // }
        $data = [
            'email'         => $email,
            'password'      => $password
        ];
        // Luu y: Khi su dung attempt ban phai ma hoa mat khau
        if (Auth::attempt($data))
        {
            return redirect('admin');
        }        
        return redirect()->back()->with('thongbao', 'Email hoac mat khau khong dung');
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
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

    public function getSua()
    {
        $id = Auth::User()->id;
        $user = User::find($id);
        return view('admin/user/caidat', compact('user'));
    }

    public function postSua(Request $request)
    {
        if ($request->get('checkpass') == "on")
        {
            $this->validate($request, 
                [
                    'password'      => 'required|min:5|max:100',
                    'passwordAgain' => 'required|same:password'
                ], 
                [
                    'password.required'=>'Ban chua nhap mat khau',
                    'password.min'=>'Mat khau qua ngan',
                    'password.max'=>'Mat khau qua dai',
                    'passwordAgain.required'=>'Ban chua nhap lai mat khau',
                    'passwordAgain.same'=>'Mat khau nhap lai khong khop'
            ]);
            $user = Auth::User();
            $user->password = bcrypt($request->get('password'));
            $user->save();

            return redirect('admin/user/sua')->with('thongbao', 'Ban da thay doi mat khau thanh cong');
        }
        return redirect('admin/user/sua');
    }

    public function getXoa($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/user/danhsach')->with('thongbao', 'Xoa thanh cong');
    }
}
