<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('vacation_flows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacation_type_id')->constrained();
            $table->foreignId('states_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vacation_flows');
    }
};
