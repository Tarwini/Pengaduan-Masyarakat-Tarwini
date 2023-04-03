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
            $table->id();
            $table->char('nik', 17)->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('telp');
            $table->enum('jenkel',['laki-laki','perempuan']);
            $table->enum('level',['admin','petugas','masyarakat'])->default('masyarakat');
            $table->text('alamat');
            $table->char('rt');
            $table->char('rw');
            $table->char('kode_pos');  
            $table->char('province_id');
            $table->char('regency_id');
            $table->char('district_id');
            $table->char('village_id');
            $table->rememberToken();
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
