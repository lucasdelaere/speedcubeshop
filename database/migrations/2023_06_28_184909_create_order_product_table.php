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
        Schema::create("order_product", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("product_id");
            $table->integer('quantity');
            $table->timestamps();
            $table->unique(["order_id", "product_id"]); //combinaties an order_id en product_id moeten uniek zijn
            $table
                ->foreign("order_id")
                ->references("id")
                ->on("orders")
                ->onDelete("cascade");
            $table
                ->foreign("product_id")
                ->references("id")
                ->on("products")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
