<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('step_id');
            $table->string('file_path'); // Contoh kolom untuk path file media
            $table->timestamps();
            

            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_media');
    }
}
