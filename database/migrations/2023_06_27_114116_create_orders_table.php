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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->decimal('total_price', 6, 2);
            $table->string('session_id');
            $table
                ->foreignId("user_id")
                ->index()
                ->constrained()
                ->unsigned()
                ->nullable();
                // using softdeletes on user, so will need to use event/listener instead of ->cascadeOnDelete()
            $table->string('address');
            $table->integer('postal_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
