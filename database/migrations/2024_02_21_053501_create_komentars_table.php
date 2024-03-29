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
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('pins_id');
            $table->foreign('users_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('pins_id')
            ->references('id')->on('pins')
            ->onDelete('cascade');
            $table->text('isikomentar');
            $table->date('tglkomentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
