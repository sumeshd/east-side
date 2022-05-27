

<?php $__env->startSection('content'); ?>


<h2> <span> Settings View </span> 
  	<!-- <a href="<?php echo e(route('Project.create')); ?>" class="combtnDiv"> New Project </a> -->
	<a href="#" class="combtnDiv"> Export Data </a> 
</h2>

			<div class="boxthree">
              <ul>
                <li> <a href="#"> Presales </a> </li>
                <li class="active"> <a href="#"> Postsales </a> </li>
                <li> <a href="#"> Execution </a> </li>
              </ul>
            </div>
            <div class="progressDiv">
              <div class="row">
                <div class="col-md-7">
                  <div class="progressDiv-in">
                    <h3> EGF post Sales progress </h3>

                    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="progressDiv-inbox"> <span> <img src="<?php echo e(url('assets/images/settings/psale-icon1.png')); ?>"> </span>
                      <h4> <?php echo e($setting['label_menu']); ?> <small> 01 Nov 21</small> </h4>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                      <a href="#" class="viewbtn"> View check list</a> </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    
                    
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="progressDiv-in-rht">
                    <h3> Requirement analysis  checklist <small> Filled by Mrs Y </small> </h3>
                    <div class="col-checkbox">
                      <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span> Room/ floor wise </label>
                      <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span> Approval <a href=""> View Details</a> </label>
                    </div>
                    <div class="col-checkbox">
                      <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span> Designer's checklist physics <a href=""> View Details</a> </label>
                      <div id="div8" class="hide8">
                        <ul>
                          <li>
                            <label for="checkbox19">
                              <input type="checkbox" id="checkbox19">
                              In Sync with the mood board (2D layout) </label>
                          </li>
                          <li>
                            <label for="checkbox20">
                              <input type="checkbox" id="checkbox20">
                              Beam/Coloumn layout </label>
                          </li>
                          <li>
                            <label for="checkbox21">
                              <input type="checkbox" id="checkbox21">
                              Furniture </label>
                          </li>
                          <li>
                            <label for="checkbox211">
                              <input type="checkbox" id="checkbox211">
                              Flooring </label>
                          </li>
                          <li>
                            <label for="checkbox22">
                              <input type="checkbox" id="checkbox22">
                              Civil Changes </label>
                          </li>
                          <li>
                            <label for="checkbox23">
                              <input type="checkbox" id="checkbox23">
                              False Ceiling </label>
                          </li>
                          <li>
                            <label for="checkbox24">
                              <input type="checkbox" id="checkbox24">
                              Door Window Schedules </label>
                          </li>
                          <li>
                            <label for="checkbox25">
                              <input type="checkbox" id="checkbox25">
                              Washrooms </label>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-checkbox">
                      <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span> Accessories <a href=""> View Details</a> </label>
                      <div id="div8" class="hide8">
                        <ul>
                          <li>
                            <label for="checkbox26">
                              <input type="checkbox" id="checkbox26">
                              Skirting </label>
                          </li>
                          <li>
                            <label for="checkbox27">
                              <input type="checkbox" id="checkbox27">
                             Curtains in the window </label>
                          </li>
                          <li>
                            <label for="checkbox28">
                              <input type="checkbox" id="checkbox28">
                              Blinds, if any </label>
                          </li>
                          <li>
                            <label for="checkbox29">
                              <input type="checkbox" id="checkbox29">
                              Carpets </label>
                          </li>
                          <li>
                            <label for="checkbox30">
                              <input type="checkbox" id="checkbox30">
                              Home decor </label>
                          </li>
                          <li>
                            <label for="checkbox31">
                              <input type="checkbox" id="checkbox31">
                              Dustbin </label>
                          </li>
                          <li>
                            <label for="checkbox32">
                              <input type="checkbox" id="checkbox32">
                              Lights </label>
                          </li>
                          <li>
                            <label for="checkbox33">
                              <input type="checkbox" id="checkbox33">
                              Fans </label>
                          </li>
                          <li>
                            <label for="checkbox34">
                              <input type="checkbox" id="checkbox34">
                              switchboard and Sockets </label>
                          </li>
                          <li>
                            <label for="checkbox35" id="audio">
                              <input type="checkbox" id="checkbox35">
                              Audio Visual </label>
                          </li>
                          <div id="div9" class="hide9" style="display:none;"> 
                        <ul>
                          <li>  
                            <label for="radio44">  
                              <input type="radio" id="radio44" name="optradio14" >  
                              Tv </label>  
                          </li>  
                          <li>
                            <label for="radio45">
                              <input type="radio" id="radio45" name="optradio14"> 
                             Home theatre </label>
                          </li>
                          
                        </ul>
                      </div>
                          <li>
                            <label for="checkbox36">
                              <input type="checkbox" id="checkbox36">
                              Dustbin </label>
                          </li>
                          <li>
                            <label for="checkbox37">
                              <input type="checkbox" id="checkbox37">
                              Door locks </label>
                          </li>
                          <li>
                            <label for="checkbox38">
                              <input type="checkbox" id="checkbox38">
                              Wordrobe locs </label>
                          </li>
                          <li>
                            <label for="checkbox39">
                              <input type="checkbox" id="checkbox39">
                              AC placements </label>
                          </li>
                          
                          <li>
                            <label for="checkbox40">
                              <input type="checkbox" id="checkbox40">
                              Sanitary fittings placements  </label>
                          </li>
                          
                          <li>
                            <label for="checkbox41">
                              <input type="checkbox" id="checkbox41">
                              Water heater placements </label>
                          </li>
                          
                          <li>
                            <label for="checkbox42">
                              <input type="checkbox" id="checkbox42">
                             Mirrors </label>
                          </li>
                          
                          <li>
                            <label for="checkbox43">
                              <input type="checkbox" id="checkbox43">
                             Chandeliers </label>
                          </li>
                           <li>
                            <label for="checkbox44">
                              <input type="checkbox" id="checkbox44">
                             Mirrors </label>
                          </li>
                         </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>













<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('settings_master.index_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 17.05.2022\east-side\resources\views/settings_master/settings_view.blade.php ENDPATH**/ ?>