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
        Schema::create('endoor_side_openings', function (Blueprint $table) {
            $table->id();
            $table->set('name', ['L', 'R'])->nullable();
            $table->set('display_name', ['Левое', 'Правое'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endoor_side_openings');
    }
};
