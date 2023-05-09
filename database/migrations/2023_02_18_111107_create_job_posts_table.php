<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->enum('job_category', ["Architecture and engineering", "Arts, culture and entertainment", "Business", "Communications", "Community and social services", "Education", "Farming, fishing and forestry", "Government", "Healthcare", "Installation, repairs and maintenance", "Law", "Media and entertainment", "Sales", "Science and technology"])->nullable(false);
            $table->string('job_subcategory')->nullable();
            $table->string('position_name')->nullable(false);
            $table->text('position_description')->nullable(false);
            $table->unsignedBigInteger('company_id')->nullable(false);
            $table->enum('work_modality', ['In Person', 'Hybrid', 'Remote'])->nullable(false);
            $table->string('job_location')->nullable();
            $table->decimal('job_salary')->nullable();
            $table->string('keywords')->nullable();
            // $table->foreign("company_id")->references("id")->on("companies")->onDelete("cascade");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
};
