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
        Schema::create('project_settings', function (Blueprint $table) {
            $table->bigIncrements('id',20);
            $table->integer('project_id');
            $table->enum('type', ['presales', 'postsales', 'execution'])->default('presales');
            $table->integer('parent_id');
            $table->integer('check_id')->nullable();
            $table->string('name', 255);
            $table->string('description', 255)->nullable();
            $table->string('image_path',255)->nullable();
            $table->boolean('can_view')->default(false);
            $table->boolean('can_upload')->default(false);
            $table->boolean('can_download')->default(false);
            $table->boolean('can_comment')->default(false);
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
        Schema::dropIfExists('project_settings');
    }
};
