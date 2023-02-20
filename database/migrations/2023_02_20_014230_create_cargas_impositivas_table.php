<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargas_impositivas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipo_pago')->constrained('tipos_de_pago');
            $table->string('nombre');
            $table->decimal('porcentaje', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargas_impositivas');
    }
};
