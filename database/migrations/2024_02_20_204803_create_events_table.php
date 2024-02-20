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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained('users'); // Foreign key referencing the id column in the users table
            $table->foreignId('event_publisher_id')->constrained('event_publishers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
