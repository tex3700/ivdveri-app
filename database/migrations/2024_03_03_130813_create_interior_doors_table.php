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
        Schema::create('interior_doors', function (Blueprint $table) {
            $table->id();
            $table->string('SKU')->unique('SKU');
            $table->foreign('UPC')->references('UPC')->on('products')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('size')->nullable()
                ->constrained('indoor_sizes')->cascadeOnUpdate();
            $table->foreignId('color')->nullable()
                ->constrained('indoor_colors')->cascadeOnUpdate();
            $table->foreignId('finishing_option')->nullable()
                ->constrained('indoor_finoptions')->cascadeOnUpdate();
            $table->foreignId('executive_type')->nullable()
                ->constrained('indoor_extypes')->cascadeOnUpdate();
            $table->foreignId('prod_storage')->nullable()
                ->constrained('prod_storages')->cascadeOnUpdate();
            $table->integer('quantity_storage')->default(0);
            $table->boolean('on_site')->default(false);
            $table->string('finoption_img')->nullable();
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
        Schema::table('interior_doors', function (Blueprint $table) {
            $table->dropForeign([
                'UPC',
                'size',
                'color',
                'finishing_option',
                'executive_type',
                'prod_storage',
            ]);
        });
        Schema::dropIfExists('interior_doors');
    }
};
