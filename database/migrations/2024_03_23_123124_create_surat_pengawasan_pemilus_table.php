<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPengawasanPemilusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pengawasan_pemilus', function (Blueprint $table) {
            $table->id();
            $table->string('j_surat')->default('pengawasan pemilu'); // Tambahan kolom j_surat dengan default value 'pengawasan pemilu'
            $table->date('tanggal');
            $table->string('nama');
            $table->string('perihal');
            $table->string('tujuan');
            $table->enum('jenis_surat', ['Surat Masuk', 'Surat Keluar']);
            $table->text('keterangan');
            $table->string('kota');
            $table->string('substantif');
            $table->string('no_surat')->nullable();
            $table->string('file_surat')->nullable(); // Kolom untuk menyimpan nama file surat, dapat bernilai null
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('status', ['queue','waiting', 'done'])->default('queue');
    
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
        Schema::dropIfExists('surat_pengawasan_pemilus');
    }
}
