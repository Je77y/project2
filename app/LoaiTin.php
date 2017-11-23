<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = "LoaiTin";

    public function theloai()
    {
    	return $this->belongsTo(TheLoai::class);
    }

    public function tintuc()
    {
    	return $this->hasMany(TinTuc::class);
    }
}
