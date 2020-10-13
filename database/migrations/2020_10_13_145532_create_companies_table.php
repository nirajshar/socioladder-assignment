<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->index('user_id')->unsigned();
            $table->string('company_name', 100);
            $table->string('designation', 100);
            $table->string('from_month', 100);
            $table->year('from_year');
            $table->string('to_month', 100);
            $table->year('to_year');
            $table->string('job_type', 100);
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
