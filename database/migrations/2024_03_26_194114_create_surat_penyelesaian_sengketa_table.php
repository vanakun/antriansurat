<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPenyelesaianSengketaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_penyelesaian_sengketas', function (Blueprint $table) {
            $table->id();
            $table->string('j_surat')->default('PENYELESAIAN SENGKETA (PS)');
            $table->date('tanggal');
            $table->string('nama');
            $table->string('perihal');
            $table->string('tujuan');
            $table->string('jenis_surat');
            $table->text('keterangan');
            $table->string('kota');
            $table->string('substantif');
            $table->string('no_surat');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('status', ['waiting', 'done'])->default('waiting');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('surat_penyelesaian_sengketas');
    }
}
