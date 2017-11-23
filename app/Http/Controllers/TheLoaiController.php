<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getDanhSach()
    {
        $DStheloai = TheLoai::all();
    	return view('admin/theloai/danhsach', compact('DStheloai'));
    }

    public function getThem()
    {
    	return view('admin/theloai/them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, 
            [
                'name' => 'required|min:3|max:100'
            ],
            [
                'name.required'=>'Ban chua nhap ten the loai',
                'name.min'=> 'Ten the loai phai co do dai tu 3 cho den 100 ky tu',
            ]);
        $theloai = new TheLoai;
        $theloai->Ten = $request->get('name');
        $theloai->TenKhongDau = changeTitle($request->get('name'));
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao', 'Them thanh cong');
    }

    public function getSua()
    {
    	return view('admin/theloai/sua');
    }
}
