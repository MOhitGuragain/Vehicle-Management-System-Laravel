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
       Schema::create('rentals', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
    $table->date('start_date');
    $table->date('end_date');
    $table->integer('total_days')->nullable();
    $table->decimal('total_amount', 10, 2)->nullable();
    $table->enum('status', ['pending', 'approved', 'completed', 'cancelled'])->default('pending');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
