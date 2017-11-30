<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

use App\Slide;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;
use App\User;


class PageController extends Controller
{
	public function __construct()
	{
		$DStheloai = TheLoai::all();
		$DSslide = Slide::all();
        $DStinnoibat = TinTuc::where('NoiBat', 1)->orderBy('created_at', 'DESC')->take(4)->get();
		view()->share('DStheloai', $DStheloai);
		view()->share('DSslide', $DSslide);
        view()->share('DStinnoibat', $DStinnoibat);
	}

    public function trangchu()
    {
    	return view('pages/trangchu');
    }

    public function lienhe()
    {
    	return view('pages/lienhe');
    }

    public function gioithieu()
    {
    	return view('pages/gioithieu');
    }

    public function loaitin($id)
    {
        $loaitin = LoaiTin::find($id);
        $DStintuc = TinTuc::where('idLoaiTin', $id)->Paginate(9);
        return view('pages/loaitin', compact('DStintuc', 'loaitin'));
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        
        $DStinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->orderBy('created_at', 'DESC')->take(4)->get();
        $DScomment = $tintuc->comment;
        return view('pages/tintuc', compact('tintuc', 'DStinnoibat', 'DStinlienquan', 'DScomment'));
    }

    public function getDangNhap()
    {
        if (Auth::check())
            return redirect('/');
        return view('pages/dangnhap');
    }

    public function postDangNhap(UserRequest $request)
    {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
        if (Auth::attempt($data))
            return redirect('/');
        return redirect('dangnhap')->with('loi', 'Ban nhap sai email hoac mat khau');
    }

    public function getDangKy()
    {
        return view('pages/dangky');
    }

    public function postDangKy(Request $request)
    {
        $this->validate($request, 
            [
                'name'          => 'required|min:3|max:100', 
                'email'         => 'required|min:3|email|unique:users,email',
                'password'      => 'required|min:5',
                'passwordAgain' => 'required|same:password'
            ], 
            [
                'name.required'         => 'Ban chua nhap ten',
                'name.min'              => 'Ten qua ngan',
                'name.max'              => 'Ten qua dai',
                'email.unique'          => 'Email da ton tai',
                'email.email'           => 'Sai dinh dang email',
                'email.required'        => 'Ban chua nhap email',
                'password.required'     => 'Ban chua nhap mat khau',
                'passwordAgain.required'=> 'Ban chua nhap lai mat khau',
                'password.min'          => 'Mat khau qua yeu'
            ]);
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->level = 0;
        $user->save();
        return redirect('dangnhap');
    }

    public function dangxuat()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getTaiKhoan()
    {
        $user = Auth::User();
        return view('pages/taikhoan', compact('user'));
    }

    public function postTaiKhoan(AccountRequest $request)
    {
        if ($request->get('checkpass') == 'on')
        {
            $user = Auth::User();
            $user->password = bcrypt($request->get('password'));
            $user->save();
            return redirect('taikhoan')->with('thongbao', 'Ban da doi mat khau thanh cong');    
        }
        return redirect('taikhoan');
    }

    public function timkiem(Request $request)
    {
        $tukhoa = $request->get('tukhoa');
        $DStintuc = TinTuc::where('TieuDe', 'like', "%$tukhoa%")->orwhere('TomTat', 'like', "%$tukhoa%")->orWhere('NoiDung', 'like', "%$tukhoa%")->Paginate(9);
        return view('pages/timkiem', compact('DStintuc', 'tukhoa'));
    }
}
