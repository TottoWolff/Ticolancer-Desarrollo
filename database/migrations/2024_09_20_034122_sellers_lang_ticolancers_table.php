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
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::create('sellers_lang_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sellers_users_ticolancers_id')->constrained();
            $table->foreignId('languages_ticolancers_id')->constrained();
            $table->foreignId('language_levels_ticolancers_id')->constrained();
            $table->timestamps();
        });
        
    }
};
