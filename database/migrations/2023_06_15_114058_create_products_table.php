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
            $table
                ->foreignId('brand_id')
                ->unsigned()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->
                foreignId('type_id')
                ->unsigned()
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignId('photo_id')
                ->unsigned()
                ->constrained();
            $table->unsignedTinyInteger('rating')->default(0)->unsigned();
            $table->decimal('price', 6, 2);
            $table->unsignedInteger('size'); // mm
            $table->unsignedInteger('weight'); // g
            $table->timestamps();
            $table->softDeletes();
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
