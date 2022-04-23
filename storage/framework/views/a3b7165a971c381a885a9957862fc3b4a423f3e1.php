

<?php $__env->startSection('content'); ?>



<h2> <span>Add Customer  </span>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Customer::class)): ?>
 <a href="<?php echo e(route('Customer.index')); ?>" class="combtnDiv"> Back Customer List </a>
<?php endif; ?>
</h2>
<!---------
<div class="row">
    <div class="col-lg-12">
        <?php if( $errors->any() ): ?>
        <div class="alert alert-danger" role="alert">
            There Are Some Problem with Your Input
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

        </div>
        <?php endif; ?>

    </div>
</div>

-------->


<form class="row g-5 " action="<?php echo e(route('Customer.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <div class="table-responsive">
                <div class="customDiv">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="usr">Customer Type:</label>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="customer_type" value="Business">
                          Business </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label" for="radio1">
                          <input type="radio" class="form-check-input" id="radio1" name="customer_type" value="Individual" checked>
                          Individual </label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="usr">Primary Contact:</label>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <select class="form-control" id="sel1" name="customer_primary_contact">
                              <option>Salutation</option>
                              <option value="Mr.">Mr.</option>
                              <option value="Mrs.">Mrs.</option>
                              <option value="Ms.">Ms.</option>
                              <option value="Miss.">Miss.</option>
                              <option value="Dr.">Dr.</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              
                            <input type="text" class="form-control color_black" placeholder="First Name" id="usr" name="customer_first_name">
                            <div id="color_red"> <?php $__errorArgs = ['customer_first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>                         
                        </div>
                          
                          
                          
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control color_black" placeholder="Last Name" id="usr" name="customer_last_name">
                            <div id="color_red"> <?php $__errorArgs = ['customer_last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="usr">Company Name</label>
                      <div class="form-group">
                        <input type="text" class="form-control color_black" placeholder="First Name" id="usr" name="customer_company_name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="usr">Customer Display Name*</label>
                      <div class="form-group">
                        <select class="form-control" id="sel1" name="customer_display_name">
                          <option></option>
                          <option value="Test1">Test1</option>
                          <option value="Test2">Test2</option>
                          <option value="Test3">Test3</option>
                          <option value="Test4">Test3</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="usr"> Customer Email </label>
                      <div class="form-group">
                        <input type="text" class="form-control color_black" placeholder="Customer Email" id="usr" name="customer_email">
                        <div id="color_red"> <?php $__errorArgs = ['customer_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div> 
                      </div>
                    </div>
                    <div class="col-md-8">
                      <label for="usr"> Customer Phone </label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" class="form-control color_black" placeholder="Work Phone" id="usr" name="customer_phone" >
                            <div id="color_red"> <?php $__errorArgs = ['customer_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><li><?php echo e($message); ?></li><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div> 
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" class="form-control color_black" placeholder="Mobile" id="usr" name="customer_mobile">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label> Skype Name/Number </label>
                      <div class="form-group">
                        <input type="text" class="form-control color_black" placeholder="Skype Name/Number" id="usr" name="customer_skype_name">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label> Designation </label>
                      <div class="form-group">
                        <input type="text" class="form-control color_black" placeholder="Designation" id="usr" name="customer_designation">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label> Department </label>
                      <div class="form-group">
                        <input type="text" class="form-control color_black" placeholder="Department" id="usr" name="customer_department">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label> Website </label>
                      <div class="form-group">
                        <input type="text" class="form-control color_black" placeholder="Website" id="usr" name="customer_website">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="allTab-sec"> 
                  
                  <!-- Nav pills -->
                  <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="pill" href="#home">Other Details</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#menu1">Address</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#menu2">Contact Persons</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#menu3">Custom Fields</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#menu4">Reporting Tags</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#menu5">Remarks</a> </li>
                  </ul>
                  <div class="tab-content">
                    <div id="home" class="tab-pane active"><br>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="usr">PAN</label>
                          <div class="form-group">
                            <input type="text" class="form-control color_black" placeholder="PAN Number" id="usr" name="customer_pan_number">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="usr">Currency*</label>
                          <div class="form-group">
                            <select class="form-control" id="sel1" name="customer_currency">
                              <option>Currency</option>
                              <option value="AED-UAE Dirhan">AED-UAE Dirhan</option>
                              <option value="AUD-Australion Dollar">AUD-Australion Dollar</option>
                              <option value="CAD-Canadian Dollar">CAD-Canadian Dollar</option>
                              <option value="CNY-Yuan Renminbi">CNY-Yuan Renminbi</option>
                              <option value="EUR-Euro">EUR-Euro</option>
                              <option value="GBP-Pound Sterling">GBP-Pound Sterling</option>
                              <option value="INR-Indian Rupee">INR-Indian Rupee</option>
                              <option value="JPY-japanese Yen">JPY-japanese Yen</option>
                              <option value="SAR-Saudi Riyal">SAR-Saudi Riyal</option>
                              <option value="USD-United States Dollar">USD-United States Dollar</option>  
                              <option value="ZAR-South African Rand">ZAR-South African Rand</option>     
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="usr">Opening Balance</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Opening Balance" id="usr" name="customer_opening_balance">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="usr">Payment Terms</label>
                          <div class="form-group">
                            <div class="form-group">
                              <select class="form-control" id="sel1" name="customer_payment_terms">
                                <option>--Select--</option>
                                <option value="Net 15">Net 15</option>
                                <option value="Net 30">Net 30</option>
                                <option value="Net 45">Net 45</option>
                                <option value="Net 60">Net 60</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="usr">Enable Portal?</label>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" id="checkbox" value="Enable" name="customer_enable_portal">
                              Allow portal access for this customer </label><p id="text">( Email address is mandatory )</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="usr">Portal Language</label>
                          <div class="form-group">
                            <select class="form-control" id="sel1" name="customer_portal_language">
                              <option value="English">English</option>
                              <option value="English">English</option>
                              <option value="English">English</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="usr">Facebook (Url)</label>
                          <div class="form-group" id="messagefacebook">
                            <input type="text" class="form-control" placeholder="http://www.facebook.com/" id="facebookinput" name="customer_facebook_url">
                              <p id="facebookp">http://www.facebook.com/ <span></span></p> 
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="usr">Twitter (Url)</label>
                          <div class="form-group" id="messagetwitter">
                            <input type="text" class="form-control" placeholder="http://www.twitter.com/" id="twitterinput" name="customer_twitter_url">
                              <p id="twitterp">http://www.twitter.com/ <span></span></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="menu1" class="tab-pane fade"><br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="shipDiv">
                          <h2> BILLING ADDRESS </h2>
                          <div class="row">
                            <div class="col-md-12">
                              <label for="usr">Attention</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Attention" id="usr" name="billing_attention">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Country / Region</label>
                              <div class="form-group">
                                <select class="form-control" id="country" name="billing_country">
                                <option value="">-- Choose Country --</option>
                                <option value="India">India</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Address</label>
                              <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="Street 1" id="usr" name="billing_address_street_1"></textarea>
                                <textarea type="text" class="form-control" placeholder="Street 2" id="usr" name="billing_address_street_2"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">City</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="City" id="usr" name="billing_city">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">State</label>
                              <div class="form-group">
                                <select class="form-control" id="state" name="billing_state">
                                <option value="">-- Choose State --</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Zip Code</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Zip Code" id="usr" name="billing_zipcode">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Phone</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone No" id="usr" name="billing_phone">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Fax</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Fax" id="usr" name="billing_fax">
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="shipDiv">
                          <h2> SHIPPING ADDRESS </h2>
                          <div class="row">
                            <div class="col-md-12">
                              <label for="usr">Attention</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Attention" id="usr" name="shipping_attention">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Country / Region</label>
                              <div class="form-group">
                              <select class="form-control" id="shipping_country" name="shipping_country">
                                <option value="">-- Choose Country --</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="India">India</option>
                              </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Address</label>
                              <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="Street 1" id="usr" name="shipping_address_street_1" > </textarea>
                                <textarea type="text" class="form-control" placeholder="Street 2" id="usr" name="shipping_address_street_2" > </textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">City</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="City" id="usr" name="shipping_city">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">State</label>
                              <div class="form-group">
                              <select class="form-control" id="shipping_state" name="shipping_state">
                                <option value="">-- Choose State --</option>
                              </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Zip Code</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Zip Code" id="usr" name="shipping_zipcode">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Phone</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone No" id="usr" name="shipping_phone">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="usr">Fax</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Fax" id="usr" name="shipping_fax" >
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    <div id="menu2" class="tab-pane fade"><br>
                    <div class="borderDiv">
                    <table class="table-editable table-bordered">
                    
                    
                    <thead>
      <tr>
        <th>Salutation</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Work Phone</th>
        <th>Mobile</th>
        <th>Skype Name/Number</th>
        <th>Designation</th>
        <th>Department</th>
      </tr>
    </thead>
   
            <tbody>
              <tr>
                <td class="input"><input type="text" name="contact_persons_salutation"    ></td>
                <td class="input"><input type="text" name="contact_persons_first_name"    ></td>
                <td class="input"><input type="text" name="contact_persons_last_name"     ></td>
                <td class="input"><input type="text" name="contact_persons_email_address" ></td>
                <td class="input"><input type="text" name="contact_persons_work_phone"     ></td>
                <td class="input"><input type="text" name="contact_persons_mobile"         ></td>
                <td class="input"><input type="text" name="contact_persons_skype_name"    ></td>
                <td class="input"><input type="text" name="contact_persons_designation"   ></td>
                <td class="input"><input type="text" name="contact_persons_department"   ></td>
              

                <td rowspan="2" class="table-controls table-zapper"><button class="jDeleteRow btn-delete-row" type="button" disabled="">×</button></td>
              </tr> 
            </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4" class="table-submit">
                          <button type="button" class="jAddRow btn">Add Row</button>
                        </td>
                      </tr>
                    </tfoot>
  </table>
    </div>
                    
                    
                    
                    
                    
                    </div>
                    <div id="menu3" class="tab-pane fade"><br>
                      <p> Start adding custom fields for your contacts by going to Settings  Preferences  Customers and Vendors. You can also refine the address format of your customers from there. </p>
                    </div>
                    <div id="menu4" class="tab-pane fade"><br>
                      <p> You've not created any Reporting Tags.
                        Start creating reporting tags by going to More Settings  Reporting Tags </p>
                    </div>
                    <div id="menu5" class="container tab-pane fade"><br>
                      <div class="col-md-12">
                        <label for="usr">Remarks (For Internal Use)</label>
                        <div class="form-group">
                          <textarea class="form-control" rows="4" id="comment" name="remarks"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="full">
                
                
                <button type="submit" class="savDiv">Save</button>
                <a href="#" class="candiv"> Cancel </a>
                
                </div> 
              </div>



</form>
















<?php $__env->stopSection(); ?>






<?php $__env->startSection('footer'); ?>
<script type="text/javascript">

</script>


<script src="<?php echo e(url('assets/custom_create_js/dropdown.js')); ?>"></script>
<script src="<?php echo e(url('assets/custom_create_js/dropdown2.js')); ?>"></script>
<script src="<?php echo e(url('assets/custom_create_js/checkbox.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.index_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\East Side\east-side\resources\views/customer/create_customer.blade.php ENDPATH**/ ?>