<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatTable extends Migration
{
    public function up()
    {
        Schema::create('alat', function (Blueprint $table) {
            $table->increments('alat_id');
            $table->unsignedInteger('alat_kategori_id');
            $table->string('alat_nama', 150);
            $table->string('alat_deskripsi', 255);
            $table->integer('alat_hargaperhari');
            $table->integer('alat_stok');
            $table->timestamps();

            $table->foreign('alat_kategori_id')->references('kategori_id')->on('kategori')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alat');
    }
}
