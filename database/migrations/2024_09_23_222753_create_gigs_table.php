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
            $table->foreignId('province_id')->constrained('provinces_ticolancers')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities_ticolancers')->onDelete('cascade');
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
