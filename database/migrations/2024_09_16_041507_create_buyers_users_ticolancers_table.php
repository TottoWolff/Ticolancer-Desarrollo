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
        Schema::create('buyers_users_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('username')->unable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->char('user_Type')->default('B');
            $table->string('password');
            $table->string('picture')->nullable();
            $table->foreignId('provinces_ticolancers_id')->nullable()->constrained();
            $table->foreignId('cities_ticolancers_id')->nullable()->constrained();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyers_users_ticolancers');
    }
};
