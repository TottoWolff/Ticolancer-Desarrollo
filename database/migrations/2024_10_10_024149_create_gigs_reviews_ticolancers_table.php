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
        Schema::create('gigs_reviews_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gigs_ticolancers_id')->constrained();
            $table->foreignId('buyers_users_ticolancers_id')->constrained();
            $table->text('comment');
            $table->integer('rating');
            $table->date('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs_reviews_ticolancers');
    }
};
