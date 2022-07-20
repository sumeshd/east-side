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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('project_settings_id')->unsigned();
            $table->integer('assigned_by');
            $table->string('task_name', 255);
            $table->mediumText('task_description')->nullable();
            //$table->string('task_description', 255)->nullable();
            $table->date('task_assing_on');
            $table->date('task_duedate')->nullable();
            $table->date('completed_on')->nullable();
            $table->enum('status',['Assigned', 'Started', 'Completed']);
            $table->string('task_comment', 255)->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
