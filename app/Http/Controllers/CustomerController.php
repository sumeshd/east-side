<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**-----------------------------join Two Table-----------------------------*/


             //$customerdata=Customer::join('contactpersons','contactpersons.customer_id','=','customers.id')
             //  ->get(['customer_type','customer_primary_contact','customer_first_name','customer_last_name','customer_email','customer_phone','billing_address_street_1']);
             $customerdata=Customer::latest()->paginate(5);
             //dd($customerdata);
             return view('customer.show_customer',compact('customerdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Customer::class);
        return view('customer.create_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Customer::class);
        $request->validate([
            'customer_first_name'   =>'required',
            'customer_last_name'    =>'required',
            'customer_email'        =>'required|email',
            'customer_phone'        =>'required|numeric',     
        ]);
    
            $customer= new customer([
                'customer_type'             => $request->get('customer_type'),
                'customer_primary_contact'  => $request->get('customer_primary_contact'),
                'customer_first_name'       => $request->get('customer_first_name'),
                'customer_last_name'        => $request->get('customer_last_name'),
                'customer_company_name'     => $request->get('customer_company_name'),
                'customer_display_name'     => $request->get('customer_display_name'),
                'customer_email'            => $request->get('customer_email'),
                'customer_phone'            => $request->get('customer_phone'),
                'customer_mobile'           => $request->get('customer_mobile'),
                'customer_skype_name'       => $request->get('customer_skype_name'),
                'customer_designation'      => $request->get('customer_designation'),
                'customer_department'       => $request->get('customer_department'),
                'customer_website'          => $request->get('customer_website'),
                'customer_pan_number'       => $request->get('customer_pan_number'),
                'customer_currency'         => $request->get('customer_currency'),
                'customer_opening_balance'  => $request->get('customer_opening_balance'),
                'customer_payment_terms'    => $request->get('customer_payment_terms'),
                'customer_enable_portal'    => $request->get('customer_enable_portal'),
                'customer_portal_language'  => $request->get('customer_portal_language'),
                'customer_facebook_url'     => $request->get('customer_facebook_url'),
                'customer_twitter_url'      => $request->get('customer_twitter_url'),
                'billing_attention'         => $request->get('billing_attention'),
                'billing_country'           => $request->get('billing_country'),
                'billing_address_street_1'  => $request->get('billing_address_street_1'),
                'billing_address_street_2'  => $request->get('billing_address_street_2'),
                'billing_city'              => $request->get('billing_city'),
                'billing_state'             => $request->get('billing_state'),
                'billing_zipcode'           => $request->get('billing_zipcode'),
                'billing_phone'             => $request->get('billing_phone'),
                'billing_fax'               => $request->get('billing_fax'),
                'shipping_attention'        => $request->get('shipping_attention'),
                'shipping_country'          => $request->get('shipping_country'),
                'shipping_address_street_1' => $request->get('shipping_address_street_1'),
                'shipping_address_street_2' => $request->get('shipping_address_street_2'),
                'shipping_city'             => $request->get('shipping_city'),
                'shipping_state'            => $request->get('shipping_state'),
                'shipping_zipcode'          => $request->get('shipping_zipcode'),
                'shipping_phone'            => $request->get('shipping_phone'),
                'shipping_fax'              => $request->get('shipping_fax'),
                'remarks'                   => $request->get('remarks')
            ]);
    
            $customer->save($request->all());
            $customer_id=$customer->id;
            
            /*$contactperson=([
                'contact_persons_salutation'=>$request->get('contact_persons_salutation'),
                'contact_persons_first_name'=>$request->get('contact_persons_first_name'),
                'contact_persons_last_name'=>$request->get('contact_persons_last_name'),
                'contact_persons_email_address'=>$request->get('contact_persons_email_address'),
                'contact_persons_work_phone'=>$request->get('contact_persons_work_phone'),
                'contact_persons_mobile'=>$request->get('contact_persons_mobile'),
                'contact_persons_skype_name'=>$request->get('contact_persons_skype_name'),
                'contact_persons_designation'=>$request->get('contact_persons_designation'),
                'contact_persons_department'=>$request->get('contact_persons_department'),
                'customer_id'=>$customer_id  
            ]);
            
            DB::table('contactpersons')->insert($contactperson);
 
            */
            
    
            DB::table('contactpersons')->insert([
                'contact_persons_salutation'    =>$request->get('contact_persons_salutation'),
                'contact_persons_first_name'    =>$request->get('contact_persons_first_name'),
                'contact_persons_last_name'     =>$request->get('contact_persons_last_name'),
                'contact_persons_email_address' =>$request->get('contact_persons_email_address'),
                'contact_persons_work_phone'    =>$request->get('contact_persons_work_phone'),
                'contact_persons_mobile'        =>$request->get('contact_persons_mobile'),
                'contact_persons_skype_name'    =>$request->get('contact_persons_skype_name'),
                'contact_persons_designation'   =>$request->get('contact_persons_designation'),
                'contact_persons_department'    =>$request->get('contact_persons_department'),
                'customer_id'                   =>$customer_id  
            ]);
            
            return redirect()->route('Customer.index')
            ->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data = Customer::find($id);

        $data=DB::table('customers')
        ->join('contactpersons','contactpersons.customer_id','=','customers.id')
        ->where('contactpersons.customer_id',$id)
        ->get();
        return view('customer.details_customer',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Customer::find($customer);
        //$find=DB::table('Contactperson')->find('customer_id');
        $data = DB::table('customers')
        ->join('contactpersons','contactpersons.customer_id','=','customers.id')
        ->where('contactpersons.customer_id',$id)
        ->get();

        return view('customer.edit_customer',compact('data'));
        //return view('customer.edit_customer',compact('data','datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_first_name'   => 'required',
            'customer_last_name'    => 'required',
            'customer_email'        =>'required|email',
            'customer_phone'        =>'required|numeric',   
        ]); 

        
        //$customer=DB::table('customers')
        //->join('contactpersons','contactpersons.customer_id','=','customers.id')
        //->where('contactpersons.customer_id',$id)
        //->update(['customer_type'=>'customer_type' ,'customer_primary_contact'=>'customer_primary_contact']);
        //echo "<pre>";
        //print_r($customer);
        //exit;


        
        $customer=Customer::find($id);
        
        
        $customer->customer_type            =$request->customer_type;
        $customer->customer_primary_contact =$request->customer_primary_contact;
        $customer->customer_first_name      =$request->customer_first_name;
        $customer->customer_last_name       =$request->customer_last_name;
        $customer->customer_company_name    =$request->customer_company_name;
        $customer->customer_display_name    =$request->customer_display_name;
        $customer->customer_email           =$request->customer_email;
        $customer->customer_phone           =$request->customer_phone;
        $customer->customer_mobile          =$request->customer_mobile;
        $customer->customer_skype_name      =$request->customer_skype_name;
        $customer->customer_designation     =$request-> customer_designation  ;
        $customer->customer_department      =$request-> customer_department  ;
        $customer->customer_website         =$request->customer_website   ;
        $customer->customer_pan_number      =$request->customer_pan_number  ;
        $customer->customer_currency        =$request->customer_currency   ;
        $customer->customer_opening_balance =$request->customer_opening_balance   ;
        $customer->customer_payment_terms   =$request->customer_payment_terms  ;
        $customer->customer_enable_portal   =$request->customer_enable_portal    ;
        $customer->customer_portal_language =$request-> customer_portal_language   ;
        $customer->customer_facebook_url    =$request->customer_facebook_url         ;
        $customer->customer_twitter_url     =$request->customer_twitter_url ;

        $customer->billing_attention         = $request->billing_attention ;
        $customer->billing_country           = $request->billing_country    ;
        $customer->billing_address_street_1  = $request->billing_address_street_1     ;
        $customer->billing_address_street_2  = $request->billing_address_street_2   ;
        $customer->billing_city              = $request->billing_city    ;
        $customer->billing_state             = $request->billing_state     ;
        $customer->billing_zipcode           = $request->billing_zipcode    ;
        $customer->billing_phone             = $request->billing_phone      ;
        $customer->billing_fax               = $request->billing_fax    ;

        $customer->shipping_attention          = $request->shipping_attention      ;
        $customer->shipping_country            = $request->shipping_country     ;
        $customer->shipping_address_street_1   = $request->shipping_address_street_1     ;
        $customer->shipping_address_street_2   = $request->shipping_address_street_2     ;
        $customer->shipping_city               = $request->shipping_city;
        $customer->shipping_state              = $request->shipping_state;
        $customer->shipping_zipcode            = $request->shipping_zipcode;
        $customer->shipping_phone              = $request->shipping_phone;
        $customer->	shipping_fax               =$request->shipping_fax;

        $customer->remarks=$request->remarks;
        $customer->save();
        



        
        
        $contactpersons=DB::table('contactpersons')->where('customer_id',$id)
        ->update([
            'contact_persons_salutation'    =>$request['contact_persons_salutation'],
            'contact_persons_first_name'    =>$request['contact_persons_first_name'],
            'contact_persons_last_name'     =>$request['contact_persons_last_name'],
            'contact_persons_email_address' =>$request['contact_persons_email_address'],
            'contact_persons_work_phone'    =>$request['contact_persons_work_phone'],
            'contact_persons_mobile'        =>$request['contact_persons_mobile'],
            'contact_persons_skype_name'    =>$request['contact_persons_skype_name'],
            'contact_persons_designation'   =>$request['contact_persons_designation'],
            'contact_persons_department'    =>$request['contact_persons_department']
        ]);
        //$contactpersons=Contactperson::find('customer_id'==$id);
        

        return redirect()->route('Customer.index')
            ->with('success','customer Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        
        $contactpersons=DB::table('contactpersons')->where('customer_id',$id);
        $contactpersons->delete();
        return redirect()->route('Customer.index')
                        ->with('success', 'Customer Delete Successfully');
    }
}
