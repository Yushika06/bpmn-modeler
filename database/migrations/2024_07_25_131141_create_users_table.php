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
            $table->string('password')->nullable();
            $table->string('profile_picture')->default('https://i.pinimg.com/originals/cc/9c/dc/cc9cdc2a345d7c3b7d032188b4991957.jpg');
            $table->string('whatsapp_number', 15)->nullable();
            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->foreignId('position_id')->nullable()->constrained('positions');
            $table->foreignId('address_details_id')->nullable()->constrained('address_details');
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
