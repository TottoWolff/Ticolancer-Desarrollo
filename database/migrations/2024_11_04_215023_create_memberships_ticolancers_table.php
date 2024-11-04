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
        Schema::create('memberships_ticolancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sellers_users_ticolancers_id')->constrained()->onDelete('cascade'); ;
            $table->foreignId('membership_categories_ticolancers_id')->constrained()->name('fk_membership_category');
            $table->boolean('status')->default(false);
            $table->date('paymentDate')->nullable();;
            $table->date('trialExpirationDate')->nullable();
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships_ticolancers');
    }
};
