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
        Schema::create('endoor_moldings', function (Blueprint $table) {
            $table->id();
            $table->string('SKU')->unique('SKU');
            $table->foreign('UPC')->references('UPC')->on('products')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->json('for_products')->nullable();
            $table->foreignId('size')->nullable()
                ->constrained('door_molding_sizes')->cascadeOnUpdate();
            $table->foreignId('color')->nullable()
                ->constrained('endoor_incolors')->cascadeOnUpdate();
            $table->foreignId('executive_type')->nullable()
                ->constrained('endoor_extypes')->cascadeOnUpdate();
            $table->foreignId('prod_storage')->nullable()
                ->constrained('prod_storages')->cascadeOnUpdate();
            $table->integer('quantity_storage')->default(0);
            $table->boolean('on_site')->default(false);
            $table->string('color_img')->nullable();
            $table->string('ex_type_img')->nullable();
            $table->json('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('endoor_moldings', function (Blueprint $table) {
            $table->dropForeign([
                'UPC',
                'size',
                'color',
                'executive_type',
                'prod_storage',
            ]);
        });
        Schema::dropIfExists('endoor_moldings');
    }
};
