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
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('project_type')->nullable();
            $table->text('name');
            $table->text('projectnumber');
            $table->text('projectname');
            //$table->string('status', 100);
            $table->text('address_1');
            $table->text('address_2')->nullable();
            $table->text('address_3')->nullable();
            //$table->binary('image');
            $table->text('pin');
            //$table->text('customer_id');
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
        Schema::dropIfExists('projects');
    }
};
