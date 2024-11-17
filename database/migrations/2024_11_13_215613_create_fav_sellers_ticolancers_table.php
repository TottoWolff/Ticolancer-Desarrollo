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
        Schema::create('fav_sellers_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyers_users_ticolancers_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('sellers_users_ticolancers_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fav_sellers_ticolancers');
    }
};
