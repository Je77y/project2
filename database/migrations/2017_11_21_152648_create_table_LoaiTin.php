<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLoaiTin extends Migration
{
    public function up()
    {
        Schema::create('LoaiTin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTheLoai');
            $table->string('Ten');
            $table->string('TenKhongDau');
            $table->timestamps();      
        });
    }

    public function down()
    {
        Schema::dropIfExists('LoaiTin');
    }
}
