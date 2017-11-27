<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Slide;
use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    public function getDanhSach()
    {
    	$DSslide = Slide::all();
    	return view('admin/slide/danhsach', compact('DSslide'));
    }

    public function getThem()
    {
        return view('admin/slide/them');
    }

    public function postThem(SlideRequest $request)
    {
        $ten = $request->input('ten');
        $mota = $request->input('mota');
        // return redirect('admin/slide/them')->with('thongbao','Them thanh cong');
    }

    public function getSua($id)
    {
        return view('admin/slide/sua');
    }

    public function postSua(Request $request, $id)
    {

    }

    public function getXoa($id)
    {

    }
}
