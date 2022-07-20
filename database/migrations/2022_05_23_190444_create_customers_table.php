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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('customer_type');
            $table->text('customer_primary_contact');
            $table->text('customer_first_name');
            $table->text('customer_last_name');
            $table->text('customer_company_name');
            $table->text('customer_display_name');
            $table->text('customer_email');
            $table->text('customer_phone');
            $table->text('customer_mobile');
            $table->text('customer_skype_name')->nullable();
            $table->text('customer_designation');
            $table->text('customer_department');
            $table->text('customer_website');
            $table->text('customer_pan_number');
            $table->text('customer_currency');
            $table->text('customer_opening_balance');
            $table->text('customer_payment_terms');
            $table->text('customer_enable_portal');
            $table->text('customer_portal_language');
            $table->text('customer_facebook_url')->nullable();
            $table->text('customer_twitter_url')->nullable();
            $table->text('billing_attention');
            $table->text('billing_country');
            $table->text('billing_address_street_1');
            $table->text('billing_address_street_2')->nullable();
            $table->text('billing_city');
            $table->text('billing_state');
            $table->text('billing_zipcode');
            $table->text('billing_phone');
            $table->text('billing_fax');
            $table->text('shipping_attention');
            $table->text('shipping_country');
            $table->text('shipping_address_street_1');
            $table->text('shipping_address_street_2')->nullable();
            $table->text('shipping_city');
            $table->text('shipping_state');
            $table->text('shipping_zipcode');
            $table->text('shipping_phone');
            $table->text('shipping_fax');
            $table->text('remarks')->nullable();
            //$table->text('project_id')->nullable();
            //$table->text('project_name')->nullable();

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
        Schema::dropIfExists('customers');
    }
};
