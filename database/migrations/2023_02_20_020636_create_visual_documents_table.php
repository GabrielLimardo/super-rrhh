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
        Schema::create('visual_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rol_id');
            $table->tinyInteger('periodo')->default(0);
            $table->tinyInteger('tipo_documento')->default(0);
            $table->tinyInteger('belong_to')->default(0);
            $table->tinyInteger('company')->default(0);
            $table->tinyInteger('branch')->default(0);
            $table->tinyInteger('management')->default(0);
            $table->tinyInteger('document_nro')->default(0);
            $table->tinyInteger('profile_nro')->default(0);
            $table->timestamps();

            $table->foreign('rol_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visual_documents');
        
    }
};
