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
        Schema::create('socialite', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('provider_id');
            $table->string('provider_name');
            $table->longText('provider_token')->nullable();
            $table->string('provider_refresh_token')->nullable();
            $table->string('profile_picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socialite');
    }
};
