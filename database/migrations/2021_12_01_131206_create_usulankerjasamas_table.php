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
			$table->string('tanggal_mulai');
			$table->string('tanggal_selesai');
			$table->unsignedBigInteger('id_kerjasama');
			$table->foreign('id_kerjasama')->references('id')->on('kerjasamas')->onDelete('CASCADE');
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
