<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaanTable extends Migration
{
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->increments('penyewaan_id');
            $table->unsignedInteger('penyewaan_pelanggan_id');
            $table->date('penyewaan_tglsewa');
            $table->date('penyewaan_tglkembali');
            $table->enum('penyewaan_sttspembayaran', ['lunas', 'belum dibayar', 'DP'])->default('belum dibayar');
            $table->enum('penyewaan_sttskembali', ['sudah kembali', 'belum kembali'])->default('belum kembali');
            $table->integer('penyewaan_totalharga');
            $table->timestamps();

            $table->foreign('penyewaan_pelanggan_id')->references('pelanggan_id')->on('pelanggan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyewaan');
    }
}
