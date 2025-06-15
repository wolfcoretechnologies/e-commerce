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
            $table->string('name');
            $table->string('image');
            $table->string('slug')->unique()->nullable();
            $table->text('small_description');
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price',10,2);
            $table->text('description')->nullable();
            $table->string('size_category')->nullable();
            $table->string('color_category')->nullable();
            $table->string('variation_category')->nullable();
            $table->integer('stock');
            $table->unsignedBigInteger('parent_id')->nullable()->after('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
