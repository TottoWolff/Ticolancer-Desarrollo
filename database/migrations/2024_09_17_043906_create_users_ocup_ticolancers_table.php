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
        Schema::create('users_ocup_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sellers_users_ticolancers_id')->constrained();
            $table->foreignId('ocupations_ticolancers_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_ocup_ticolancers');
    }
};
