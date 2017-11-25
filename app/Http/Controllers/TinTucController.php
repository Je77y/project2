<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\LoaiTin;
use App\TheLoai;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
    	$DStintuc = TinTuc::orderBy('updated_at', 'DESC')->Paginate(9);
    	return view('admin/tintuc/danhsach', compact('DStintuc'));
    }

    public function getThem()
    {
        $DSloaitin = LoaiTin::all(['id', 'Ten', 'idTheLoai']);
        $DStheloai = TheLoai::all(['id', 'Ten']);
    	return view('admin/tintuc/them', compact(['DSloaitin', 'DStheloai']));
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
            [
                'idLoaiTin'=>'required',
                'tieude'=>'required|min:3|max:100|unique:TinTuc,TieuDe',
                'tomtat'=>'required',
                'noidung'=>'required'
            ], 
            [
                'idLoaiTin.required'=>'Ban chua chon loai tin',
                'tieude.required'=>'Ban chua nhap tieu de',
                'tieude.min'=>'Tieu de qua ngan',
                'tieude.max'=>'Tieu de qua dai',
                'tieude.unique'=>'Tieu de da ton tai',
                'tomtat.required'=>'Ban chua nhap tom tat',
                'noidung.required'=>'Ban chua nhap noi dung'
        ]);

        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->get('tieude');
        $tintuc->TieuDeKhongDau = changeTitle($request->get('tieude'));
        $tintuc->idLoaiTin = $request->get('idLoaiTin');
        $tintuc->TomTat = $request->get('tomtat');
        $tintuc->NoiDung = $request->get('noidung');
        $tintuc->SoLuotXem = 0;
        $tintuc->NoiBat = 0;

        if ($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi', 'Ban chi duoc chon file co duoi la jpg, png hoac jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/tintuc", $Hinh);
            $tintuc->Hinh = $Hinh;
        }
        else
        {
            $tintuc->Hinh = "";
        }

        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao', 'Ban da them thanh cong');
    }

    public function getSua($id)
    {
    	$tintuc = TinTuc::find($id);
        $DStheloai = TheLoai::all(['id', 'Ten']);
        $DSloaitin = LoaiTin::all(['id', 'Ten', 'idTheLoai']);
    	return view('admin/tintuc/sua', compact(['tintuc', 'DStheloai', 'DSloaitin']));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, 
            [
                'idLoaiTin'=>'required',
                'tieude'=>'required|min:3|max:100',
                'tomtat'=>'required',
                'noidung'=>'required'
            ], 
            [
                'idLoaiTin.required'=>'Ban chua chon loai tin',
                'tieude.required'=>'Ban chua nhap tieu de',
                'tieude.min'=>'Tieu de qua ngan',
                'tieude.max'=>'Tieu de qua dai',
                'tomtat.required'=>'Ban chua nhap tom tat',
                'noidung.required'=>'Ban chua nhap noi dung'
        ]);
    	$tintuc = TinTuc::find($id);

        $tintuc->idLoaiTin = $request->get('idLoaiTin');
        $tintuc->TieuDe = $request->get('tieude');
        $tintuc->TieuDeKhongDau = changeTitle($request->get('tieude'));
        $tintuc->TomTat = $request->get('tomtat');
        $tintuc->NoiBat = $request->get('noibat');

        if ($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png')
            {
                return redirect('admin/tintuc/sua/'.$id)->with('loi', 'Ban chi co the chon file co duoi la jpg, png hoac jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/tintuc", $Hinh);
            $tintuc->Hinh = $Hinh;
        }

        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Sua thanh cong');
    }

    public function getXoa($id)
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
