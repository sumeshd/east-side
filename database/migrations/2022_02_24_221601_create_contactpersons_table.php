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
        Schema::create('contactpersons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('contact_persons_salutation');
            $table->text('contact_persons_first_name');
            $table->text('contact_persons_last_name');
            $table->text('contact_persons_email_address');
            $table->text('contact_persons_work_phone');
            $table->text('contact_persons_mobile');
            $table->text('contact_persons_skype_name');
            $table->text('contact_persons_designation');
            $table->text('contact_persons_department');
            $table->text('customer_id');

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
        Schema::dropIfExists('contactpersons');
    }
};
