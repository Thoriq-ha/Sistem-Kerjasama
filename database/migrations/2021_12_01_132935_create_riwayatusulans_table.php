<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatusulansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('riwayatusulans', function (Blueprint $table) {
			$table->id();
			$table->string('status');
			$table->string('catatan')->default('Belum Ada Catatan');;
			$table->unsignedBigInteger('id_usulankerjasama');
			$table->foreign('id_usulankerjasama')->references('id')->on('usulankerjasamas')->onDelete('CASCADE');
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
		Schema::dropIfExists('riwayatusulans');
	}
}
