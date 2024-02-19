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
        Schema::create('topic_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_id');
            $table->unsignedBigInteger('user_id');
            $table->string('type'); // String to represent the content type (video, pdf, text, etc.)
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('source')->nullable(); // PDFs URL or video code
            $table->text('content')->nullable(); // Store text notes content
            $table->tinyInteger('status')->default(1);
            $table->text('labels')->nullable();
            $table->timestamps();

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_contents');
    }
};
