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
        Schema::create('brigades', function (Blueprint $table) {
            $table->id();
            $table->string('board_number');
            $table->string('brigade_tablet_phone_number');
            $table->integer('first_user');
            $table->integer('second_user');
            $table->integer('third_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brigades');
    }
};
