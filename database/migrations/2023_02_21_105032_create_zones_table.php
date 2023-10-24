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
        Schema::create('zone', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id');
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('mineral_type')->nullable();
            $table->integer('dangerous_level');
            $table->string('date')->default('2023-02-21')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zones');
    }
};