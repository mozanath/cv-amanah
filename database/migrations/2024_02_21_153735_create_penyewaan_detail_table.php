<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaanDetailTable extends Migration
{
    public function up()
    {
        Schema::create('penyewaan_detail', function (Blueprint $table) {
            $table->increments('penyewaan_detail_id');
            $table->unsignedInteger('penyewaan_detail_penyewaan_id');
            $table->unsignedInteger('penyewaan_detail_alat_id');
            $table->integer('penyewaan_detail_jumlah');
            $table->integer('penyewaan_detail_subharga');
            $table->timestamps();

            $table->foreign('penyewaan_detail_penyewaan_id')->references('penyewaan_id')->on('penyewaan')->onDelete('cascade');
            $table->foreign('penyewaan_detail_alat_id')->references('alat_id')->on('alat')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyewaan_detail');
    }
}
