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
        Schema::create('branches',function(Blueprint $table){
            $table->id();
            $table->string('name', 30);
            $table->timestamps();
        });

        Schema::create('product_branches',function(Blueprint $table){
            $table->id();
            $table->foreignId('branch_id');
            $table->foreignId('product_id');
            $table->decimal('price', 10, 2)->default(0.01);
            $table->integer('max_stock')->default(1);
            $table->integer('min_stock')->default(1);
            $table->timestamps();


            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('product_id')->references('id')->on('products');
        });


        Schema::table('products',function(Blueprint $table){
            $table->dropColumn(['price', 'max_stock', 'min_stock']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products',function(Blueprint $table){
            $table->decimal('price', 10, 2)->default(0.01);
            $table->integer('max_stock')->default(1);
            $table->integer('min_stock')->default(1);
        });

        Schema::dropIfExists('product_branches');
        Schema::dropIfExists('branches');
    }
};
