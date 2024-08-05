<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelerTable extends Migration
{
    public function up()
    {
        Schema::create('modeler', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('bpmn');
            $table->foreignId('project_id')->constrained('projects');
            // $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('modelers');
    }
}
