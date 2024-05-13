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
        Schema::create('event_service_supplier_quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_service_id')->constrained()->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('document')->nullable();
            $table->decimal('budget_range_start', 10, 2)->nullable();
            $table->decimal('budget_range_end', 10, 2)->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->text('note')->nullable();
            $table->boolean('awarded')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_service_supplier_quotes');
    }
};
