<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai)
    {
    	$DSloaitin = LoaiTin::where('idTheLoai', $idTheLoai)->get();
    	foreach ($DSloaitin as $loaitin) 
    	{
    		echo "<option value='".$loaitin->id."'>".$loaitin->Ten."</option>";
    	}
    }
}
