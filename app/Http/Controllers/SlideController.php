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
        $slide = new Slide;
        $slide->Ten = $request->get('ten');
        $slide->NoiDung = $request->get('mota');
        $slide->link = $request->get('link');

        if ($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/them')->with('loi', 'Bạn chỉ được chọn ảnh có đuôi là png, jpg hoặc jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while(file_exists("upload/slide/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/slide", $Hinh);
            $slide->Hinh = $Hinh;
        }
        echo $slide->Hinh;
        //$slide->save();
        //return redirect('admin/slide/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin/slide/sua', compact('slide'));
    }

    public function postSua(SlideRequest $request, $id)
    {

    }

    public function getXoa($id)
    {

    }
}
