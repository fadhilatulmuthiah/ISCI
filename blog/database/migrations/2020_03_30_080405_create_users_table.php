<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('username', 20)->primary();
            $table->string('nama');
            $table->string('phone');
            $table->string('no_reg')->unique();
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('alamat', 500);
            $table->string('sabuk_terakhir');
            $table->date('ujian_terakhir')->nullable();
            $table->string('tmpt_ujian_terakhir')->nullable();
            $table->string('score_ujian')->nullable();
            $table->string('id_dojang');
            $table->string('role');
            $table->string('foto');
            $table->string('password');

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
        Schema::dropIfExists('users');
    }
}
