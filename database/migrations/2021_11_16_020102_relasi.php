<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('pinjam',function(Blueprint $table){
        //     $table->foreign('nip')
        //     ->references('nip')
        //     ->on('pegawai')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        // });

        Schema::table('pegawai',function(Blueprint $table){
            $table->foreign('id_users')->references('id_users')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
