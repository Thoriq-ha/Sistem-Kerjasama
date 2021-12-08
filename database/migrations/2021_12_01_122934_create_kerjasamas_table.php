<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjasamasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kerjasamas', function (Blueprint $table) {
			$table->id();
			$table->string('nama_kerjasama');
			$table->string('deskripsi_kerjasama');
			$table->string('jenis_kerjasama');
			$table->string('bidang_kerjasama');
			$table->string('file_kerjasama');
			$table->unsignedBigInteger('id_mitra');
			$table->foreign('id_mitra')->references('id')->on('mitras')->onDelete('CASCADE');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('kerjasamas');
	}
}
