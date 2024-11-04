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
        Schema::create('sellers_users_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->date('birthdate');
            $table->string('description');
            $table->char('user_Type')->default('S');
            $table->string('residence_address');
            $table->foreignId('buyers_users_ticolancers_id')->constrained()->onDelete('cascade');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers_users_ticolancers');
    }
};
