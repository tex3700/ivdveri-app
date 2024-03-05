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
        Schema::create('site_products', function (Blueprint $table) {
            $table->id();
            $table->string('UPC');
            $table->foreign('UPC')->references('UPC')->on('products')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->index('UPC');
            $table->text('description')->nullable();
            $table->json('gallery')->nullable();
            $table->foreignId('status')->nullable()->constrained('prod_statuses')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_products', function (Blueprint $table) {
            $table->dropForeign(['UPC', 'status']);
        });
        Schema::dropIfExists('site_products');
    }
};
