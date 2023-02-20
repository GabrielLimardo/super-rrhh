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
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->string('name', 30)->nullable();
            $table->tinyInteger('period')->nullable();
            $table->unsignedBigInteger('sign_first_rol_id')->nullable();
            $table->integer('code')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('masive')->nullable();
            $table->tinyInteger('employee_see')->nullable();
            $table->string('regex', 30)->nullable();
            $table->integer('c_up_left_x')->nullable();
            $table->integer('c_up_left_y')->nullable();
            $table->integer('c_down_right_x')->nullable();
            $table->integer('c_down_right_y')->nullable();
            $table->integer('sign_father_x')->nullable();
            $table->integer('sign_father_y')->nullable();
            $table->integer('sign_father_high')->nullable();
            $table->integer('sign_father_wide')->nullable();
            $table->integer('sign_son_x')->nullable();
            $table->integer('sign_son_y')->nullable();
            $table->integer('sign_son_high')->nullable();
            $table->integer('sign_son_wide')->nullable();
            $table->index('organization_id');
            $table->timestamp('updated_at')->useCurrent()->nullable()->onUpdate('CURRENT_TIMESTAMP');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_types');
    }
};
