

<?php $__env->startSection('content'); ?>














<div class="tabdiv-part">
    <ul class="nav nav-tabs" role="tablist" id="list2"> 

    </ul>
 
 
    <div class="no-tabpart">
        <ol class="list-items">
          <?php $__currentLoopData = $settings_tablists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tablist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#home_show<?php echo e($tablist->id); ?>"><?php echo e($tablist->tablist); ?></a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
          
        <div id="btn1"> <img src="<?php echo e(url('assets/images/icon/Subtraction-icon.png')); ?>" alt="img"></div>
    </div>      
            
        <div class="tab-content-el" id="nav-tab-item">

<!---------------------------------------show todo----------------------------------->
        
        <?php $__currentLoopData = $settings_tablists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tablist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="tabpanel" id="home_show<?php echo e($tablist->id); ?>" >
            <div id="tab_item_input" class="container tab_item_box ">
                <!-- <input type="text" id="tablist_id" name="tablist_id" value="<?php echo e($tablist->id); ?>"> -->


              <?php $__currentLoopData = $settings_tasklists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasklist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($tablist->id == $tasklist->tablist_id ): ?>  
              <div class="tab_input">
                              
                      <h2 class="tab_heading" id="tablist" ><?php echo e($tasklist->tasklist); ?>  <span id="taske_delete" class="taske_delete" ><i class="fa fa-trash"></i></span> </h2> 
                    <!-- <input type="hidden" id="tasklist" value="<?php echo e($tasklist->tasklist); ?>"> -->
                 
              <div class="task" id="task_div`+ tab_number + task_number +`" >
                    <input type="hidden" id="tasklist_id" name="tasklist_id" value="<?php echo e($tasklist->tablist_id); ?>">

                   
                    <?php $__currentLoopData = $settings_subtasklists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtasklist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($tasklist->tasklistid == $subtasklist->tasklist_id ): ?>
                    <div class="task_content_el">
                        <form>
                          <input type="text" class="task_input_el" id="subtask_list" value="<?php echo e($subtasklist->subtasklist); ?>">

                          <div class="subtask-icon-sec-datashow">
                            <?php if($subtasklist->view == true ): ?>{
                              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/view-svgrepo-com-true.svg')); ?>" alt="icon"> </a> 
                            }<?php else: ?>{
                              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/view-svgrepo-com.svg')); ?>" alt="icon"> </a> 
                            }
                            <?php endif; ?>

                            <?php if($subtasklist->upload == true ): ?>{
                              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/upload-svgrepo-com-true.svg')); ?>" alt="icon"> </a> 
                            }<?php else: ?>{
                              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/upload-svgrepo-com.svg')); ?>" alt="icon"> </a> 
                            }
                            <?php endif; ?>


                            <?php if($subtasklist->download == true ): ?>{
                              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/download-svgrepo-com-true.svg')); ?>" alt="icon"> </a> 
                            }<?php else: ?>{
                              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/download-svgrepo-com.svg')); ?>" alt="icon"> </a> 
                            }
                            <?php endif; ?>



                            <?php if($subtasklist->comments == true ): ?>{
                              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/comment-svgrepo-com-true.svg')); ?>" alt="icon"> </a> 
                            }<?php else: ?>{
                              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/comment-svgrepo-com.svg')); ?>" alt="icon"> </a> 
                            }
                            <?php endif; ?>








                            

                            <span id="subtaske_edit" class="subtaske_edit" ><i class="fa fa-pencil-square-o"></i></span>
                            <span id="subtaske_delete" class="subtaske_delete" ><i class="fa fa-trash"></i></span>
                          </div>


                        </form>
                          
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </div>
              </div>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                


            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<!-- ---------------end todo ------------------>





        </div>

</div>










<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>


<!-- <script src="<?php echo e(url('assets/custom_create_js/execution/execution.js')); ?>"></script> -->
<!-- <script type="text/javascript">
   $("execution").submit(function(e){
       e.preventDefault();
       let checklist = $("").val();
       let tablist = $("#tablist").val();
       let tasklist =$("#tasklist").val();
       let _token =$("input[name=_token]").val();
       $.ajax({
           url: "<?php echo e(route ('Execution.store')); ?>",
           type: "POST",
           data:{
            checklist:checklist,
            tablist:tablist,
            tasklist:tasklist,
            _token:_token

           },
           success:function(response)
           {
               if(response)
               {
                   $("#table tbody").prepend('<tr><td>'+response.checklist+'</td><td>'+response.tablist+'</td><td>'+response.tasklist+'</td></tr>');
               }
           }
       });
   });<a target="_blank" href="https://icons8.com/icon/fqRKAxXwzgAR/view">View</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a>
  
</script> -->

<script type="text/javascript">
window.addEventListener('load',()=>{
  
  const tab_content = document.querySelector(".tab-content-el"); 
  const listItems = document.querySelector(".list-items");

  var tab_number = 0;
  var task_number = 0;
  var sub_task_number = 0;
    $('#btn1').click(function(){
        tab_number += 1;
        const list_item = document.createElement('li');
        list_item.classList.add('nav-item'+tab_number);
        list_item.classList.add('nav-item');
        //list_item.onclick = showpanel(1);
        
        const newA =`<a class="nav-link" data-toggle="tab" href="#home`+ tab_number +`">checklist</a>
        <form >
        <?php echo csrf_field(); ?>
        <input type="hidden" id="tablist`+ tab_number +`" value="checklist`+ tab_number +`">
        </form>`;


        list_item.innerHTML = newA;
        listItems.appendChild(list_item);
  

        const navTab = document.createElement('div');
        navTab.classList.add('home'+ tab_number);
        navTab.classList.add('tabpanel');
        navTab.id="home"+ tab_number;
  
        const newnavtabhtml =`       
        <div id = "tab_item_input`+ tab_number +`" class="container tab_item_box ">
          <input type="hidden" id="tablist_id`+ tab_number +`" name="tablist_id`+ tab_number +`">
                 
        </div>
        
        <div id="nav_item_input`+ tab_number +`" class="container nav_item_input ">
          <div class="tab_input">
            <input type="text" class="tab_input_box" id="tab_input_box`+ tab_number +`" placeholder="Create A Task">
          </div>
        </div>        
        `;
        navTab.innerHTML = newnavtabhtml;
        tab_content.appendChild(navTab);
        
        let tablist = $("#tablist"+tab_number).val();
        //alert(tablist);
        $.ajax({
          url: "<?php echo e(url ('/execution/tablist')); ?>",
          type: "GET",
          data:{
            tablist:tablist,
          },
          success:function(response){
              $("#tablist_id"+tab_number).val(response);
              
              // const tablist_id = document.querySelector("#tablist_id"+tab_number).val(response); 
            console.log(response);
          }

        });
  
  //----------------------------------------------------------------------
  
    // Show the first tab and hide the rest
    $('.list-items li:first-child').addClass('active');
    $('.tabpanel').hide();
    $('.tabpanel:first').show();
    
    // Click function
    $('.list-items li').click(function(){
        $('.list-items li').removeClass('active');
        $(this).addClass('active');
        $('.tabpanel').hide();
        
        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
    });
  
  //---------------------------  Task Part------------------------------------------------>
    
  
        const tab_item_input = document.querySelector("#tab_item_input"+tab_number);
        const tab_input_box = document.querySelector("#tab_input_box"+tab_number);
  
        //$('#tab_add_box'+tab_number).click(function(){
        //const tab_add_box = document.querySelector(".tab_add_box");
        //<button class="tab_add_box" id="tab_add_box`+tab_number+`" type="submit"> ADD </button>
        tab_input_box.addEventListener('keyup', (e) => {
        
        if(e.keyCode === 13) {
          task_number += 1;
         
        const tab_el_el = document.createElement('div');
        tab_el_el.classList.add('tab_input');
        tab_el_el.classList.add('tab_input'+tab_number+task_number);
        const newC=`
        <form id="userForm">
        <?php echo csrf_field(); ?>
          <h2 class="tab_heading" id="tablist">${tab_input_box.value} </h2>
          <input type="hidden" id="tasklist`+ tab_number + task_number +`" value="${tab_input_box.value}">
        </form>
        <div class="task" id="task_div`+ tab_number + task_number +`" >
          <input type="hidden" id="tasklist_id`+ tab_number + task_number +`" name="tasklist_id`+ tab_number + task_number +`">
        </div>
        <div >
          <input type="text" class="task_input_box" id="task_input`+ tab_number + task_number +`" placeholder="Create A Sub-Task"/>
        </div>
        <div class="icon3-part">
          <a href="#"> <img src="<?php echo e(url('assets/images/icon/chach-icon1.png')); ?>" alt="icon"> </a>
          <a onclick="myFunction()"> <img src="<?php echo e(url('assets/images/icon/chach-icon2.png')); ?>" alt="icon"> </a> 
          <a href="#"> <img src="<?php echo e(url('assets/images/icon/chach-icon3.png')); ?>" alt="icon"> </a> 
        </div>           
        
        `;
              // <button class="task_add_box"  id="task`+number+`" type="submit"> ADD </button> 
              tab_el_el.innerHTML=newC;
              tab_item_input.appendChild(tab_el_el);
              tab_input_box.value="";

        const tablist_id = document.querySelector("#tablist_id"+tab_number).value;
        let tasklist = $("#tasklist"+tab_number+task_number).val();
        alert("My Tablist id " + tablist_id);
        
        $.ajax({
          url: "<?php echo e(url ('/execution/tasklist')); ?>",
          type: "GET",
          data:{
            tasklist:tasklist,
            tablist_id:tablist_id,
            
          },
          success:function(response){
            $("#tasklist_id"+tab_number+task_number).val(response);
            //$('#userForm').trigger("reset");
            // const tasklist_id=document.querySelector("#tasklist_id"+tab_number+task_number).val(response); 
            //console.log(response);
          }

        });//end ajax
                   
         //const task_button=document.querySelector("#task"+number);
         const list_el = document.querySelector("#task_div"+tab_number+task_number);
         const task_input_box = document.querySelector("#task_input"+tab_number+task_number);      
          
      /*--------------------- SubTask Part  ---------------------------------*/
         //task_button.addEventListener('click', taskbutton);
         task_input_box.addEventListener('keyup', (e) => {
          
         //$("#task"+number).click(function(){
           //function taskbutton(){
          if(e.keyCode === 13) {
            sub_task_number += 1; 
            const task_content_el = document.createElement('div');
            task_content_el.classList.add('task_content'+tab_number+task_number+sub_task_number);
            task_content_el.classList.add('task_content_el');
            const tasks=task_input_box.value;
  
          // const task_input_el=document.createElement('input');
          // task_input_el.classList.add('task_input_el');
          // task_input_el.type="text";
          // task_input_el.value=tasks;
          // task_input_el.setAttribute('readonly','readonly');
          // task_content_el.appendChild(task_input_el);
            const newTaskC=`
            <form id="userForm">
            <?php echo csrf_field(); ?>
              <input type="text" class="task_input_el" id="subtask_list`+ tab_number + task_number + sub_task_number +`" value="`+tasks+`">
            </form>

            <div class="subtask-icon-sec">
              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/check-list-icon1.png')); ?>" alt="icon"> </a> 
              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/check-list-icon2.png')); ?>" alt="icon"> </a> 
              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/check-list-icon3.png')); ?>" alt="icon"> </a> 
              <a href="#" style="background:#fff !important;"> <img src="<?php echo e(url('assets/images/icon/check-list-icon4.png')); ?>" alt="icon"> </a> 
            </div>


            <span id="taske_delete`+ tab_number + task_number + sub_task_number +`" class="taske_delete"><i class="far fa-trash-alt"></i></span>`
            task_content_el.innerHTML=newTaskC;
            //$(this).append(`<span><i class="far fa-trash-alt"></i></span>`);
            list_el.appendChild(task_content_el);
            task_input_box.value="";
          

            const tasklist_id=document.querySelector("#tasklist_id"+tab_number+task_number).value;
            const subtasklist=document.querySelector("#subtask_list"+tab_number+task_number+sub_task_number).value;
            alert("Tasklist id "+tasklist_id);
            $.ajax({
              url: "<?php echo e(url('/execution/subtasklist')); ?>",
              type: "GET",
              data: {
                subtasklist:subtasklist,
                tasklist_id:tasklist_id,
              },
              success:function(response){
                $('#userForm').trigger("reset");
                //alert(response);
                console.log(response);
              }
            });//end ajax

          const task_content_delete = document.querySelector(".task_content"+tab_number+task_number+sub_task_number);
          const task_delete = document.querySelector("#taske_delete"+tab_number+task_number+sub_task_number);
          task_delete.addEventListener('click', (e) => {
            list_el.removeChild(task_content_el);
          });//task_number += 1;
        }
      });//end key
      
         
       }      
       
   });
  
              
            //});
  
  });



//         function sleep (ms) {
//   return new Promise(resolve => setTimeout(resolve, ms))
// }

// async timeoutHandler() {
//   await sleep(1)
//    // heavy duty code here
// }

// setTimeout(timeoutHandler, 10000)





// Show the first tab and hide the rest
  $('.list-items li:first-child').addClass('active');
      $('.tabpanel').hide();
      $('.tabpanel:first').show();
      
      // Click function
      $('.list-items li').click(function(){
          $('.list-items li').removeClass('active');
          $(this).addClass('active');
          $('.tabpanel').hide();
          
          var activeTab = $(this).find('a').attr('href');
          $(activeTab).fadeIn();
          return false;
      });


 
});
</script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('execution.index_execution', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side Project\eastside\resources\views/execution/show_execution.blade.php ENDPATH**/ ?>