<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "Comment";

    public function tintuc()
    {
    	return $this->belongsTo(TinTuc::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
