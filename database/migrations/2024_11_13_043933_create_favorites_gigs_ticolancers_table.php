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
        Schema::create('favorites_gigs_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gigs_ticolancers_id')->constrained()->ondelete('cascade');
            $table->foreignId('buyers_users_ticolancers_id')->constrained()->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites_gigs_ticolancers');
    }
};
