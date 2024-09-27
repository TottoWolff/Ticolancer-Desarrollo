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
        Schema::create('gigs_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->string('gig_name');
            $table->string('gig_image');
            $table->text('gig_description');
            $table->text('gig_email');
            $table->string('gig_phone_number');
            $table->foreignId('provinces_ticolancers_id')->constrained()->onDelete('cascade');
            $table->foreignId('cities_ticolancers_id')->constrained()->onDelete('cascade');
            //$table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs_ticolancers');
    }
};
