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
       Schema::create('maintenance_records', function (Blueprint $table) {
    $table->id();
    $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
    $table->text('description');
    $table->decimal('cost', 10, 2)->nullable();
    $table->date('maintenance_date');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_records');
    }
};
