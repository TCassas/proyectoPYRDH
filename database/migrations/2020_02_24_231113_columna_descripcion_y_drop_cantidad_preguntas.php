<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ColumnaDescripcionYDropCantidadPreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cuestionarios', function(Blueprint $table) {
        $table->string('descripcion', 150);
        $table->dropColumn('cantidad_preguntas');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('cuestionarios', function(Blueprint $table) {
        $table->dropColumn('descripcion');
        $table->integer('cantidad_preguntas');
      });
    }
}
