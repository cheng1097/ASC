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
        Schema::create('realisations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_objectif')->constrained('objectifs')->onDelete('cascade');
            $table->integer('quantite_enqueteur');
            $table->integer('quantite_controlleur');
            $table->integer('quantite_superviseur');
            //$table->foreignId('id_controller')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_superviseur')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('realisations');
    }
};
