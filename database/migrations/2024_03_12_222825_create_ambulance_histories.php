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
        Schema::create('ambulance_histories', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->integer('status');
            $table->string('board_number');
            $table->time('arrival_time');
            $table->time('general_time');
            $table->integer('category');
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulance_histories');
    }
};
