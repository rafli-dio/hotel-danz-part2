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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tamu_id');
            $table->foreignId('kamar_id');
            $table->enum('kota', ['Jakarta', 'Surabaya', 'Solo', 'Bandung']);
            $table->date('tanggal_check_in');
            $table->date('tanggal_check_out');
            $table->enum('jumlah_orang', [1, 2, 4, 6]);
            $table->decimal('total_harga',15,2);
            $table->timestamps();

            $table->foreign('tamu_id')->references('id')->on('tamus')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasis');
    }
};
