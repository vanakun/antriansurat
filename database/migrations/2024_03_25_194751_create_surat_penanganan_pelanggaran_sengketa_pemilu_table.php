<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPenangananPelanggaranSengketaPemiluTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_penanganan_pelanggaran_sengketa_pemilus', function (Blueprint $table) {
            $table->id();
            $table->string('j_surat')->default('Penanganan Pelangaran dan Sengketa Pemilu (PP)'); // Menambahkan kolom j_surat dengan default value 'pengawasan pemilu'
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

            // Foreign key constraint to connect user_id to the users table
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
        Schema::dropIfExists('surat_penanganan_pelanggaran_sengketa_pemilus');
    }
}
