<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetaildokumentasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detaildokumentasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_kegiatan');
            $table->integer('id_dokumentasi');
            $table->date('tanggalkegiatan');
            $table->string('keterangan')->default(''); // Default kosong untuk 'keterangan'
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
        Schema::dropIfExists('detaildokumentasis');
    }
}
