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
        Schema::create('films', function (Blueprint $table) {
            $table->id('id_film');
            $table->string('title');
            $table->string('genre');
            $table->integer('duration');
            $table->enum('status', ['showing', 'coming soon', 'ended']);
            $table->enum('studio', ['studio 1', 'studio 2', 'studio 3','studio 4']);
            $table->timestamp('release_date')->useCurrent();
            $table->string('poster_file')->nullable();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
