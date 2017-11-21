<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTheLoai extends Migration
{
    public function up()
    {
        Schema::create('TheLoai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten');
            $table->string('TenKhongDau');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('TheLoai');
    }
}
