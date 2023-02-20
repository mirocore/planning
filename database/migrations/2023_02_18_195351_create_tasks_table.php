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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('state')->default(0);
            $table->integer('id_proyect')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_time')->unsigned();

            $table->foreign('id_proyect')->references('id')->on('proyects');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_time')->references('id')->on('times');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
