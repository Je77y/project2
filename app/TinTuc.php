<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "TinTuc";

    public function loaitin()
    {
    	return $this->belongsTo(LoaiTin::class, 'idLoaiTin', 'id');
    }

    public function comment()
    {
    	return $this->hasMany(Comment::class, 'idTinTuc', 'id');
    }
}
