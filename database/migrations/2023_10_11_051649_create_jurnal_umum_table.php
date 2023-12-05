<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalUmumTable extends Migration
{
    public function up()
    {
        Schema::create('jurnal_umum', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('bukti_transaksi');
            $table->string('keterangan');
            $table->unsignedBigInteger('kode_app_id');
            $table->decimal('debet', 10, 2)->nullable();
            $table->decimal('kredit', 10, 2)->nullable();
            $table->unsignedBigInteger('jurnal_id')->nullable(); // New column for jurnal_id
            $table->timestamps();

            $table->foreign('kode_app_id')->references('id')->on('kode_app')->onDelete('cascade');
            $table->foreign('jurnal_id')->references('id')->on('jurnal')->onDelete('set null'); // Assuming jurnal_id can be null
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurnal_umum');
    }
}

