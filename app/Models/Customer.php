<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;


    protected $fillable=[
        'customer_type','customer_primary_contact','customer_first_name','customer_last_name','customer_company_name','customer_display_name','customer_email','customer_phone',
        'customer_mobile','customer_skype_name','customer_designation','customer_department','customer_website','customer_pan_number','customer_currency','customer_opening_balance',
        'customer_payment_terms','customer_enable_portal','customer_portal_language','customer_facebook_url','customer_twitter_url','billing_attention','billing_country',
        'billing_address_street_1','billing_address_street_2','billing_city','billing_state','billing_zipcode','billing_phone','billing_fax','shipping_attention','shipping_country',
        'shipping_address_street_1','shipping_address_street_2','shipping_city','shipping_state','shipping_zipcode','shipping_phone','shipping_fax','remarks'
    ];

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
