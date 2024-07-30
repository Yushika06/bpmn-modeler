<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('google_id');
            $table->string('google_token');
            $table->string('google_refresh_token')->nullable();
            $table->string('profile_picture');
            $table->string('whatsapp_number', 15);
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('position_id')->constrained('positions');
            $table->foreignId('address_details_id')->constrained('address_details');
            $table->boolean('registered_via_google')->default(false);
            $table->string('role')->default('client');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'province_id')) {
                $table->dropColumn('province_id');
            }
            if (Schema::hasColumn('users', 'city_id')) {
                $table->dropColumn('city_id');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('province_id');
            $table->foreignId('city_id');
            $table->dropColumn('address_details_id');
        });

        Schema::dropIfExists('users');
    }
}
