<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Request\LoaiTinFormRequest;

class LoaiTinController extends Controller
{
    public function getDanhSach()
    {
    	$DSloaitin = LoaiTin::simplePaginate(9);
    	return view('admin/loaitin/danhsach', compact('DSloaitin'));
    }

    public function getThem()
    {
    	$DStheloai = TheLoai::all();
    	return view('admin/loaitin/them', compact('DStheloai'));
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
    		[
    			'name'=>'required|min:3|max:100|unique:LoaiTin,Ten',
    			'id'=>'required|integer'
    		], 
    		[
    			'name.required'=>'Ban chua nhap ten loai tin',
    			'name.min'=>'Ten the loai phai co do dai tu 3 cho den 100 ky tu',
    			'name.max'=>'Ten the loai phai co do dai tu 3 cho den 100 ky tu',
    			'name.unique'=>'Ten loai tin da ton tai',
    			'id.required'=>'Ban chua chon the loai',
    			'id.integer'=>'Ban vui long chon lai'
    	]);
    	$loaitin = new LoaiTin;
    	$loaitin->idTheLoai = $request->get('id');
    	$loaitin->Ten = $request->get('name');
    	$loaitin->TenKhongDau = changeTitle($request->get('name'));
    	$loaitin->save();
    	return redirect('admin/loaitin/them')->with('thongbao', 'Them thanh cong');
    }

    public function getSua($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$DStheloai = TheLoai::all();
    	return view('admin/loaitin/sua', ['loaitin'=>$loaitin, 'DStheloai'=>$DStheloai]);
    }

    public function postSua(Request $request, $id)
    {
    	$this->validate($request, 
    		[
    			'name'=>'required|min:3|max:100|unique:LoaiTin,Ten',
    			'id'=>'required|integer'
    		], 
    		[
    			'name.required'=>'Ban chua nhap ten loai tin',
    			'name.min'=>'Ten the loai phai co do dai tu 3 cho den 100 ky tu',
    			'name.max'=>'Ten the loai phai co do dai tu 3 cho den 100 ky tu',
    			'name.unique'=>'Ten loai tin da ton tai',
    			'id.required'=>'Ban chua chon the loai',
    			'id.integer'=>'Ban vui long chon lai'
    	]);
    	$loaitin = LoaiTin::find($id);
    	$ten = $request->get('name');
		$loaitin->Ten = $ten;
		$loaitin->TenKhongDau = changeTitle($loaitin->Ten);
    	$loaitin->idTheLoai = $request->get('id');
    	$loaitin->save();
    	return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Sua thanh cong');
    }

    public function getXoa($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$loaitin->delete();
    	return redirect('admin/loaitin/danhsach')->with('thongbao', 'Xoa thanh cong');
    }
}
