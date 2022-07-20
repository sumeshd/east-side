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
        Schema::create('projectdocs', function (Blueprint $table) {
            $table->bigIncrements('id',20);
            $table->integer('project_id');
            $table->unsignedBigInteger('project_settings_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('document_name',255)->nullable();
            $table->string('document_path',255)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_settings_id')->references('id')->on('project_settings')->onDelete('cascade');
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
        Schema::dropIfExists('projectdocs');
    }
};
