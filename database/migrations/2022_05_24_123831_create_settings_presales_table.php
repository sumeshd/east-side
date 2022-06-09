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
        Schema::create('settings_presales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('presales_name', 100);
            $table->integer('parent_id');
            $table->text('description')->nullable();
            $table->string('presales_image')->nullable();
            $table->boolean('view')->default(false);
            $table->boolean('upload')->default(false);
            $table->boolean('download')->default(false);
            $table->boolean('comments')->default(false);
            $table->text('settings_name');
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
        Schema::dropIfExists('settings_presales');
    }
};
