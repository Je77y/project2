<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
    	$DStintuc = TinTuc::Paginate(9);
    	return view('admin/tintuc/danhsach', compact('DStintuc'));
    }

    public function getThem()
    {
    	return view('admin/tintuc/them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, [], []);
    }

    public function getSua($id)
    {
    	$tintuc = TinTuc::find($id);
    	return view('admin/tintuc/sua', compact('tintuc'));
    }

    public function postSua(Request $request, $id)
    {
    	$tintuc = TinTuc::find($id);
    }

    public function postXoa($id)
    {
    	$tintuc = TinTuc::find($id);
    	$tintuc->delete();
    	return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xoa thanh cong');
    }

    // public function postTim(Request $request, $tukhoa)
    // {
    // 	// $tukhoa = $request->get('tukhoa');
    // 	if (!isset($tukhoa))
    // 		$DStintuc = TinTuc::Paginate(9);
    // 	else
	   //  	$DStintuc = TinTuc::where('TieuDe', 'LIKE', '%'.$tukhoa.'%')->simplePaginate(9);
    // 	return view('admin/tintuc/danhsach', compact('DStintuc'));
    // }
}
