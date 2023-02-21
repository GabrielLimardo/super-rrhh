<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('license_flows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('license_type_id');
            $table->unsignedBigInteger('state_id');

            $table->foreign('license_type_id')->references('id')->on('license_types');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    public function down()
    {
        Schema::dropIfExists('license_flows');
    }
};
