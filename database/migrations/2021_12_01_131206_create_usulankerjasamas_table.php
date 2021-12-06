<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulankerjasamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulankerjasamas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kerjasama');
            $table->string('deskripsi_kerjasama');
            $table->string('jenis_kerjasama');
            $table->string('bidang_kerjasama');
            $table->timestamp('tanggal_mulai');
            $table->timestamp('tanggal_selesai');
            $table->string('file_usulan');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('CASCADE');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usulankerjasamas');
    }
}
