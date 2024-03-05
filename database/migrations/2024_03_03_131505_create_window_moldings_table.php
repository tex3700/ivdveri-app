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
        Schema::create('window_moldings', function (Blueprint $table) {
            $table->id();
            $table->string('SKU')->unique('SKU');
            $table->foreign('UPC')->references('UPC')->on('products')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->json('for_products')->nullable();
            $table->foreignId('size')->nullable()
                ->constrained('window_mold_sizes')->cascadeOnUpdate();
            $table->foreignId('color')->nullable()
                ->constrained('window_mold_colors')->cascadeOnUpdate();
            $table->foreignId('prod_storage')->nullable()
                ->constrained('prod_storages')->cascadeOnUpdate();
            $table->integer('quantity_storage')->default(0);
            $table->boolean('on_site')->default(false);
            $table->string('color_img')->nullable();
            $table->json('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('window_moldings', function (Blueprint $table) {
            $table->dropForeign([
                'UPC',
                'size',
                'color',
                'prod_storage',
            ]);
        });
        Schema::dropIfExists('window_moldings');
    }
};
