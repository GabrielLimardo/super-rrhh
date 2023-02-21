<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('license_days_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('license_type_id');
            $table->unsignedInteger('available')->default(0);
            $table->unsignedInteger('used')->default(0);
            $table->timestamp('updated_at')->useCurrent()->nullable()->onUpdate('CURRENT_TIMESTAMP');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('license_type_id')->references('id')->on('license_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('license_days_users');
        
    }
};
