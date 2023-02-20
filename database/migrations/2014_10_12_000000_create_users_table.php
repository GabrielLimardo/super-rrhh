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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('last_name')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_nro')->nullable();
            $table->string('identification_doc')->nullable();
            $table->boolean('terms_agreements')->nullable();
            $table->string('labor_profile')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('management_id')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('admission_date')->nullable();
            $table->timestamp('egress_date')->nullable();
            $table->longText('certificado_firma')->nullable();
            $table->longText('key_secret')->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable()->onUpdate('CURRENT_TIMESTAMP');
            $table->timestamp('created_at')->useCurrent();
            
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('management_id')->references('id')->on('managements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
