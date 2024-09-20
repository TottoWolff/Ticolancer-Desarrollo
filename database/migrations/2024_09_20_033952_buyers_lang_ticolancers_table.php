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

        Schema::create('buyers_lang_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyers_users_ticolancers_id')->constrained();
            $table->foreignId('languages_ticolancers_id')->constrained();
            $table->foreignId('language_levels_ticolancers_id')->constrained();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
