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
        Schema::create('visual_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('rol_id')->nullable();
            $table->tinyInteger('new_employee')->default(0);
            $table->tinyInteger('total_employee')->default(0);
            $table->tinyInteger('document_state')->default(0);
            $table->tinyInteger('egress_employee')->default(0);
            $table->tinyInteger('signed_documents')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visual_statistics');
        
    }
};
