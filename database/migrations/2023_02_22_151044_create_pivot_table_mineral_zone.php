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
        Schema::create('mineral_zone', function (Blueprint $table) {
            $table->unsignedBigInteger('mineral_id');
            $table->foreign('mineral_id')
                ->references('id')
                ->on('mineral')
                ->onDelete('cascade');

                $table->unsignedBigInteger('zone_id');
                $table->foreign('zone_id')
                    ->references('id')
                    ->on('zone')
                    ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mineral_zone');
    }
};