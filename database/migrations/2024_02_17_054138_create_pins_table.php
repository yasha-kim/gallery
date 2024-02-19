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
        Schema::create('pins', function (Blueprint $table) {
            $table->id();
            $table->string('judulfoto');
            $table->text('deskripsifoto');
            $table->date('tglunggah')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('path');
            $table->integer('likes_count')->default(0);
            $table->unsignedBigInteger('albums_id');
            $table->foreign('albums_id')->references('id')->on('albums');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pins');
    }
};
