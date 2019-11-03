<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Http\Requests\TheLoaiRequest;

class TheLoaiController extends Controller
{
    public function getDanhSach()
    {
        $DStheloai = TheLoai::simplePaginate(8);;
    	return view('admin/theloai/danhsach', compact('DStheloai'));
    }

    public function getThem()
    {
    	return view('admin/theloai/them');
    }

    public function postThem(TheLoaiRequest $request)
    {
        // $this->validate($request, 
        //     [
        //         'name' => 'required|min:3|max:100|unique:TheLoai,Ten'
        //     ],
        //     [
        //         'name.required'=>'Ban chua nhap ten the loai',
        //         'name.min'=> 'Ten the loai phai co do dai tu 3 cho den 100 ky tu',
        //         'name.unique'=>'Ten da ton tai'
        //     ]);
        $theloai = new TheLoai;
        $theloai->Ten = $request->get('name');
        $theloai->TenKhongDau = changeTitle($request->get('name'));
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao', 'Them thanh cong');
    }

    public function getSua($id)
    {
        $theloai = TheLoai::find($id);
    	return view('admin/theloai/sua', compact('theloai'));
    }

    public function postSua(TheLoaiRequest $request, $id)
    {
        $theloai = TheLoai::find($id);
        // $this->validate($request, 
        //     [
        //         'name'=>'required|min:3|max:100|unique:TheLoai,Ten'
        //     ], 
        //     [
        //         'name.required'=>'Ban chua nhap ten the loai',
        //         'name.min'=>'Ten the loai phai co do dai tu 3 cho den 100 ky tu',
        //         'name.max'=>'Ten the loai phai co do dai tu 3 cho den 100 ky tu',
        //         'name.unique'=>'Ten da ton tai'
        //     ]);
        $theloai->Ten = $request->get('name');
        $theloai->TenKhongDau = changeTitle($request->get('name'));
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'Sua thanh cong');
    }

    public function getXoa($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao', 'Xoa thanh cong');
    }

    public function postTim(Request $request)
    {
        $tukhoa = $request->get('tukhoa');
        if ($tukhoa == null)
            $DStheloai = TheLoai::simplePaginate(8);
        else
            $DStheloai = TheLoai::where('Ten', 'LIKE', '%'.$tukhoa.'%')->get()->simplePaginate(8);
        return view('admin/theloai/danhsach', compact('DStheloai'));
    }
}
