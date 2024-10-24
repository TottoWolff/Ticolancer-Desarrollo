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
        Schema::create('seller_applications', function (Blueprint $table) {
            $table->id();
            
            // Definimos el campo buyers_users_id como foreignId y lo vinculamos automáticamente con la tabla buyers_users_ticolancers
            $table->foreignId('buyers_users_ticolancers_id')->constrained('buyers_users_ticolancers')->onDelete('cascade');
            
            // Otras columnas
            $table->string('picture');
            $table->date('birthdate');
            $table->text('description');
            $table->string('phone');
            $table->char('user_Type')->default('B');
            $table->string('residence_address');
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
        Schema::dropIfExists('seller_applications');
    }
};
