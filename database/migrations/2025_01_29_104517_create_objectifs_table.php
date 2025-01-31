<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('objectifs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_enqueteur')->constrained('enqueteurs')->onDelete('cascade');
        $table->foreignId('id_type_ouvrage')->constrained('type_ouvrages')->onDelete('cascade');
        $table->date('date');
        $table->integer('objectif');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('objectifs');
}

};
