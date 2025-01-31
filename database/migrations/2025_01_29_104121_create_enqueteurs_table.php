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
        Schema::create('enqueteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('id_controlleur')->constrained('users')->onDelete('cascade'); // Ici, vous pouvez ajuster la relation si nécessaire
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enqueteurs');
    }
};
