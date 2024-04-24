<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganDataTable extends Migration
{
    public function up()
    {
        Schema::create('pelanggan_data', function (Blueprint $table) {
            $table->increments('pelanggan_data_id');
            $table->unsignedInteger('pelanggan_data_pelanggan_id');
            $table->enum('pelanggan_data_jenis', ['KTP', 'SIM']);
            $table->string('pelanggan_data_file', 255);
            $table->timestamps();

            $table->foreign('pelanggan_data_pelanggan_id')->references('pelanggan_id')->on('pelanggan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelanggan_data');
    }
}
