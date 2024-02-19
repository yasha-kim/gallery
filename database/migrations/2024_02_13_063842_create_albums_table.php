<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('nama_album');
            $table->text('deskripsi');
            $table->date('tgl_dibuat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('users_id'); //Tipe data ini biasanya digunakan untuk kolom foreign key yang mengacu pada kolom id dari tabel lain
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
