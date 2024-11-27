<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_kamars', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_tipe_kamar'); 
            $table->decimal('harga_kamar', 10, 2); 
            $table->text('deskripsi_kamar');
            $table->enum('kapasitas_kamar',[2,4,6,]); 
            $table->string('gambar_kamar'); 
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
        Schema::dropIfExists('tipe_kamars');
    }
};
