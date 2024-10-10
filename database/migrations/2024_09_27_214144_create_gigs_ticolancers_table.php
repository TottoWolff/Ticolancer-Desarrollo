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
            $table->foreignId('gigs_categories_ticolancers_id')->constrained();
            $table->foreignId('sellers_users_ticolancers_id')->constrained();
            $table->string('gig_name');
            $table->string('gig_image');
            $table->text('gig_description');
            $table->decimal('gig_price');
            $table->date('published_at');
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
