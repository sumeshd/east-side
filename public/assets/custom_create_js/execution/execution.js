window.addEventListener('load',()=>{
  
    const tab_content = document.querySelector(".tab-content-el"); 
    const listItems = document.querySelector(".list-items");
  
    var tab_number = 0;
    var number = 0;
    var task_number = 0;
      $('#btn1').click(function(){
          tab_number += 1;
          const list_item = document.createElement('li');
          list_item.classList.add('nav-item'+tab_number);
          list_item.classList.add('nav-item');
          //list_item.onclick = showpanel(1);
          
          const newA =`<a class="nav-link" id="tablist" data-toggle="tab" href="#home`+tab_number+`">checklist</a>`;
          list_item.innerHTML = newA;
          listItems.appendChild(list_item);
    
  
          const navTab = document.createElement('div');
          navTab.classList.add('home'+tab_number);
          navTab.classList.add('tabpanel');
          navTab.id="home"+tab_number;
    
          const newnavtabhtml =`
          <form class="row g-5 " id="execution" >
          @csrf
          <div id="tab_item_input`+tab_number+`" class="container tab_item_box "></div>
          
          <div id="nav_item_input`+tab_number+`" class="container nav_item_input ">
          
          <div class="tab_input">
          <input type="text" class="tab_input_box" id="tab_input_box`+tab_number+`" placeholder="Create Tab"/>
          </div></div>
          
         
          </form>
          `;
          navTab.innerHTML = newnavtabhtml;
          tab_content.appendChild(navTab);

          let tablist = $("#tablist").val();
          $.ajax({
            url: "{{ url ('/execution/tablist') }}",
            type: "POST",
            data:{
             tablist:tablist,
            },
            success:function(result){
              console.log(result);
            }

          })
    
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
    
    //---------------------------  Tab Part------------------------------------------------>
      
    
          const tab_item_input = document.querySelector("#tab_item_input"+tab_number);
          const tab_input_box = document.querySelector("#tab_input_box"+tab_number);
    
          //$('#tab_add_box'+tab_number).click(function(){
          //const tab_add_box = document.querySelector(".tab_add_box");
          //<button class="tab_add_box" id="tab_add_box`+tab_number+`" type="submit"> ADD </button>
          tab_input_box.addEventListener('keyup', (e) => {
          
          if(e.keyCode === 13) {
          number += 1;
           
          const tab_el_el = document.createElement('div');
          tab_el_el.classList.add('tab_input');
          tab_el_el.classList.add('tab_input'+tab_number+number);
          const newC=`
          <h2 class="tab_heading" id="tablist">${tab_input_box.value} </h2>
          <div class="task" id="task_div`+tab_number+number+`" >
          </div>
           
          <input type="text" class="task_input_box" id="task_input`+tab_number+number+`" placeholder="Create A Task"/>
                       `;
                // <button class="task_add_box"  id="task`+number+`" type="submit"> ADD </button> 
                tab_el_el.innerHTML=newC;
                tab_item_input.appendChild(tab_el_el);
                tab_input_box.value="";
                     
           //const task_button=document.querySelector("#task"+number);
           const list_el = document.querySelector("#task_div"+tab_number+number);
           const task_input_box = document.querySelector("#task_input"+tab_number+number);      
            
        /*---------------------  Task Part  ---------------------------------*/
           //task_button.addEventListener('click', taskbutton);
           task_input_box.addEventListener('keyup', (e) => {
            
           //$("#task"+number).click(function(){
             //function taskbutton(){
              if(e.keyCode === 13) {
                task_number += 1;
               
            const task_content_el = document.createElement('div');
            task_content_el.classList.add('task_content'+tab_number+number+task_number);
            task_content_el.classList.add('task_content_el');
            const tasks=task_input_box.value;
    
            // const task_input_el=document.createElement('input');
            // task_input_el.classList.add('task_input_el');
            // task_input_el.type="text";
            // task_input_el.value=tasks;
            // task_input_el.setAttribute('readonly','readonly');
            // task_content_el.appendChild(task_input_el);
            const newTaskC=`
            <input type="text" class="task_input_el" id="tasklist" value="`+tasks+`">
            <span id="taske_delete`+tab_number+number+task_number+`" class="taske_delete"><i class="far fa-trash-alt"></i></span>`
            task_content_el.innerHTML=newTaskC;
            //$(this).append(`<span><i class="far fa-trash-alt"></i></span>`);
            list_el.appendChild(task_content_el);
            task_input_box.value="";
            
    
            const task_content_delete = document.querySelector(".task_content"+tab_number+number+task_number);
            const task_delete = document.querySelector("#taske_delete"+tab_number+number+task_number);
            task_delete.addEventListener('click', (e) => {
              list_el.removeChild(task_content_el);
            });//task_number += 1;
    
              }
        });
        
           
         }      
         
     });
    
                
              //});
    
          });
    
      });