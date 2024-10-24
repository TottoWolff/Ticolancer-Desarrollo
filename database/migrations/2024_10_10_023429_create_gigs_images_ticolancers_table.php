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
        Schema::create('gigs_images_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('gigs_ticolancers_id')
            ->constrained('gigs_ticolancers')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs_images_ticolancers');
    }
};
