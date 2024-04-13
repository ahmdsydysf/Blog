<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->nullable()
            ->constrained('posts', 'id')->cascadeOnDelete();
            $table->string('locale');

            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text('small_description')->nullable();
            $table->text('tags')->nullable();

            $table->unique(['post_id' , 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_translations');
    }
};
