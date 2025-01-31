<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutsTable extends Migration
{
    /**
     * Exécuter la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_enqueteur')->references('id')->on('enqueteurs')->onDelete('cascade');
            $table->date('date_collecte');
            $table->boolean('is_collecte')->default(false);
            $table->boolean('is_valide_n1')->default(false);
            $table->boolean('is_valide_n2')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Revenir de la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuts');
    }
}
