<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CambioNombreYAgregarDescripcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preguntas4respuestas', function(Blueprint $table) {
          $table->renameColumn('cuarta_respeusta', 'cuarta_respuesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('preguntas4respuestas', function (Blueprint $table) {
        $table->renameColumn('cuarta_respuesta', 'cuarta_respeusta');
      });
    }
}
