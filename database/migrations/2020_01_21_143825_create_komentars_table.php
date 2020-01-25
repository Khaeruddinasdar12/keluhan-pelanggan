<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email');
            $table->string('nohp')->nullable();
            $table->string('alamat');
            $table->enum('admin_verified', ['yes', 'no']);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('pesan');
            $table->bigInteger('departmen_id')->unsigned();
            $table->timestamps();
            $table->foreign('departmen_id')->references('id')->on('departmens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
