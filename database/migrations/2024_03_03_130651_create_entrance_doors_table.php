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
        Schema::create('entrance_doors', function (Blueprint $table) {
            $table->id();
            $table->string('SKU')->unique('SKU');
            $table->foreign('UPC')->references('UPC')->on('products')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('size')->nullable()
                ->constrained('endoor_sizes')->cascadeOnUpdate();
            $table->foreignId('side_opening')->nullable()
                ->constrained('endoor_side_openings')->cascadeOnUpdate();
            $table->foreignId('inside_color')->nullable()
                ->constrained('endoor_incolors')->cascadeOnUpdate();
            $table->foreignId('outside_color')->nullable()
                ->constrained('endoor_outcolors')->cascadeOnUpdate();
            $table->foreignId('executive_type')->nullable()
                ->constrained('endoor_extypes')->cascadeOnUpdate();
            $table->foreignId('prod_storage')->nullable()
                ->constrained('prod_storages')->cascadeOnUpdate();
            $table->integer('quantity_storage')->default(0);
            $table->boolean('on_site')->default(false);
            $table->string('side_op_img')->nullable();
            $table->string('inside_col_img')->nullable();
            $table->string('outside_col_img')->nullable();
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
        Schema::table('entrance_doors', function (Blueprint $table) {
            $table->dropForeign([
                'UPC',
                'size',
                'side_opening',
                'inside_color',
                'outside_color',
                'executive_type',
                'prod_storage',
                ]);
        });
        Schema::dropIfExists('entrance_doors');
    }
};
