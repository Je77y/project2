<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComment extends Migration
{
    public function up()
    {
        Schema::create('Comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser');
            $table->integer('idTinTuc');
            $table->string('NoiDung');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Comment');
    }
}
