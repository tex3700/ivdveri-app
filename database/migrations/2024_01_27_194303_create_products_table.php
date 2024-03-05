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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_category')->constrained('prod_categories')->onUpdate('cascade');
            $table->foreignId('g_category')->nullable(true)
                ->constrained('group_categories')->onUpdate('cascade');
            $table->foreignId('s_category')->nullable(true)
                ->constrained('sub_categories')->onUpdate('cascade');
            $table->string('name');
            $table->string('manufacturer')->nullable(true);
            $table->string('prod_img')->nullable(true);
            $table->string('UPC')->unique('UPC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['p_category', 'g_category', 's_category']);
        });
        Schema::dropIfExists('products');
    }
};
