@extends('project.index_projectsettings')

@section('content')

  <div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Project Settings <span> <i class="fa fa-cogs"></i> </span> <small>Projact Settings - View </small> </h1>
        <div class="card">
          <div class="card-body">

            <div class="container" style="margin-top: 20px;">
              <div class="row">
                  <div class="col-lg-12">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ $message }}</p>

                        </div>
                    @endif
                  </div>
              </div>
            </div>




              <h2> <span>Project View Settings </span>
                	<!-- <a href="{{ route('Project.create') }}" class="combtnDiv"> New Project </a> -->
              	<a href="#" class="combtnDiv"> Export Data </a> 
              </h2>

              <div class="boxthree">
                <ul class="list-items">
                  <li class="active"> <a href="#Presales"> Presales </a> </li>
                  <li> <a href="#Postsales"> Postsales </a> </li>
                  <li> <a href="#Execution"> Execution </a> </li>
                </ul>
              </div>
            
              <div class="progressDiv tabpanel" id="Presales">
                <div class="row">
                  <div class="col-md-7">
                    <div class="progressDiv-in">
                      <h3> EGF PreSales Progress  </h3>

                      @foreach( $settings_presales as $presales)
                      <div class="progressDiv-inbox"> <span> <img src="{{ url('assets/images/settings/psale-icon1.png') }}"> </span>
                        <h4> {{ $presales['name'] }} <small> 01 Nov 21</small> </h4>
                        <p> {{ $presales['description'] }} </p>
                        <a href="#" class="viewbtn " id="{{ $presales['id']}}" data-name="{{ $presales['name'] }}" data-table="project_settings" data-type="{{ $presales['type'] }}"> View check list</a> </div>
                      @endforeach

                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="progressDiv-in-rht" id="presales_child" style="display:none" >

                    </div>
                  </div>
                </div>
               
              </div>
            

            <div class="progressDiv tabpanel" id="Postsales">
              <div class="row">
                <div class="col-md-7">
                  <div class="progressDiv-in">
                    <h3> EGF PostSales Progress </h3>

                    @foreach( $settings_postsales as $postsales)
                    <div class="progressDiv-inbox"> <span> <img src="{{ url('assets/images/settings/psale-icon1.png') }}"> </span>
                      <h4> {{ $postsales['name'] }} <small> 01 Nov 21</small> </h4>
                      <p> {{ $postsales['description'] }} </p>
                      <a href="#" class="viewbtn" id="{{ $postsales['id']}}" data-name="{{ $postsales['name'] }}" data-table="project_settings" data-type="{{ $postsales['type'] }}"> View check list</a> </div>
                    @endforeach

                  </div>
                </div>
                <div class="col-md-5">
                  <div class="progressDiv-in-rht" id="postsales_child" style="display:none">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="progressDiv tabpanel" id="Execution">
              <div class="row">
                <div class="col-md-7">
                  <div class="progressDiv-in">
                    <h3> EGF Execution Progress </h3>

                    @foreach( $settings_execution as $execution)
                    <div class="progressDiv-inbox"> <span> <img src="{{ url('assets/images/settings/psale-icon1.png') }}"> </span>
                      <h4> {{ $execution['name'] }} <small> 01 Nov 21</small> </h4>
                      <p> {{ $execution['description'] }} </p>
                      <a href="#" class="viewbtn" id="{{ $execution['id']}}" data-name="{{ $execution['name'] }}" data-table="project_settings" data-type="{{ $execution['type'] }}"> View check list</a> </div>
                    @endforeach

                  </div>
                </div>
                <div class="col-md-5">
                  <div class="progressDiv-in-rht" id="execution_child" style="display:none">
                    <h3 id="exeh3"> Requirement analysis  checklist <small> Filled by Mrs Y </small> </h3>
                  </div>
                </div>
              </div>
            </div>




        </div>
      </div>
    </div>
  </div>
</div>




       
<div class="custom-model-main">
    <div class="custom-model-inner">        
    <div class="close-btn">×</div>
        <div class="custom-model-wrap">
          <!-- <div class="pop-up-content-wrap"> -->


            <div class="window-module">
              <div class="window-module-title description-title">
                <span class="icon-lg title-icon"> <i class="fa fa-credit-card-alt" ></i></span>
                  
                <div class="taskdiv">
              
                </div>
                   <!-- <button type="button" class="text-button" name="" value="Cancel">Hide Details</button> -->
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">

                <div class="form-group">
                  <input type="hidden" name="project_settings_id" id="project_settings_id">
                  <input type="hidden" name="project_id" id="project_id" >
                  <input type="hidden" name="task_id" id="task_id">
                </div>
                <div class="form-group">
                  <input type="hidden" class="content-wrap userDiv4" name="task_name" id="task" >
                </div>

                <div class="window-module">
                  <div class="window-module-title description-title">
                    <span class="icon-lg title-icon"> <i class="fa fa-calendar-minus-o" ></i></span>
                    
                    <h3>Task Due Date</h3>
                    <span class="status-span">
                     <!--  <label class="status-label"><input type="checkbox" name="status" class="status"> <span class="status-date"> 12/07/2022 </span><span class="alert alert-danger" id="status-alert"> Incomplite</span>  </label> -->
                    </span>
                    <!-- <button type="button" class="text-button" name="" value="Cancel">Hide Details</button> -->
                  </div>
                </div>

                <div class="window-module">
                  <div class="window-module-title description-title">
                    <span class="icon-lg title-icon"> <i class="fa fa-align-left" ></i></span>
                    
                     <h3>Description</h3>
                  </div>
                  <p class="text-area-p">Add a more detailed description…</p>
                  <div class="text-area">
                    <textarea name="description" id="description" class="textarea" rows="5" placeholder="Add a more detailed description…" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"> </textarea>
                    <div class="text-area-button-div">
                      <button type="button" class="text-area-button description" name="" value="">Save</button>
                      <button type="button" class="text-area-button description-cancel" name="" value="Cancel">Cancel</button>
                      
                    </div>
                  </div>
                </div>

                <div class="window-module">
                  <div class="window-module-title description-title">
                    <!-- <span class="icon-lg title-icon"> <i class="fa fa-list" ></i></span> -->
                    
                     <input type="text" class="content-wrap" name="task_comment" id="task_comment" placeholder="Wirte A Comment..." id="datepicker">
                   <button class="text-button comment"> Save </button>
                  </div>
                </div>

                <div class="window-module">
                  <div class="window-module-title description-title">
                    <span class="icon-lg title-icon"> <i class="fa fa-list" ></i></span>
                    
                     <h3>Activity</h3>
                     <button type="button" class="text-button" id="logButton" name="" >Show Details</button>
                  </div>
                </div>

                

              <!-- <div class="form-group">
                 <input type="text" class="content-wrap" name="task_comment" id="task_comment" placeholder="Wirte A Comment..." id="datepicker">
                 <button class="text-button comment"> Save </button>
              </div> -->

                <div class="tasklog">
                  
                </div>
              </div>


          <div class="col-md-4">
            <div class="add-task">
              <button class="button-link member" ><span class="icon-sm fa fa-user"></span><span class="js-sidebar-action-text"></span>Members</button>
            </div>

            <div class="add-member">
            </div>


            <div>
              <button class="button-link date" ><span class="icon-sm fa fa-calendar "></span><span class="js-sidebar-action-text"></span>Date</button>
            </div>

            <div class="add-date">
              <div class="form-group">
                <input type="text" class="content-wrap task_duedate" name="task_duedate" placeholder="Due Date" id="task_duedate">
                <button class="due_datesubmit">Due Date</button>
              </div>
            </div>

            <div>
              <button class="button-link date" ><span class="icon-sm fa fa-commenting "></span><span class="js-sidebar-action-text"></span> Comment </button>
            </div>

          </div>
        </div>

        </div>  
    </div>  
    <div class="bg-overlay"></div>
</div> 




<!-- Member Modal -->
<!-- <div class="pop-over is-shown" data-elevation="2" >
  <div class="no-back">
    <div class="pop-over-header js-pop-over-header"><span class="pop-over-header-title">Members</span><a href="#" class="pop-over-header-close-btn icon-sm icon-close"></a></div>
    <div class="pop-over-content js-pop-over-content u-fancy-scrollbar js-tab-parent" style="max-height: 125px;">
      <div><input class="js-search-mem js-autofocus" type="text" placeholder="Search members">
        <div class="pop-over-section js-suggestions hide"><h4><span class="icon-sm icon-sparkle"></span>Suggested</h4>
          <ul class="pop-over-member-list checkable u-clearfix js-mem-list"></ul>
        </div>
        <div class="pop-over-section js-board-members"><h4>Board members</h4>
          <div class="js-loading hide"><p class="empty" style="padding: 24px 6px">Loading…</p></div>
          <div class="js-no-results hide"><p class="empty" style="padding: 24px 6px">No results</p></div>
          <ul class="pop-over-member-list checkable u-clearfix js-mem-list">
            <li class="item js-member-item">
              <a class="name js-select-member" href="#" idmember="62c53bd95cd7e301b545ae25" title="Indranil Dhar (indranildhar7)" autocompletetext="indranildhar7"><span class="member js-member"><img class="member-avatar" height="30" width="30" src="https://trello-members.s3.amazonaws.com/62c53bd95cd7e301b545ae25/2f410f8e994e339c3081c308123edd61/30.png" srcset="https://trello-members.s3.amazonaws.com/62c53bd95cd7e301b545ae25/2f410f8e994e339c3081c308123edd61/30.png 1x, https://trello-members.s3.amazonaws.com/62c53bd95cd7e301b545ae25/2f410f8e994e339c3081c308123edd61/50.png 2x" alt="Indranil Dhar (indranildhar7)" title="Indranil Dhar (indranildhar7)"><span id="62c53bd95cd7e301b545ae25-avatar"></span><span class="member-gold-badge" title="This member has Trello Gold." aria-label="This member has Trello Gold."></span></span><span class="full-name" name="Indranil Dhar (indranildhar7" aria-hidden="aria-hidden">Indranil Dhar <span class="username">(indranildhar7)</span></span><span class="icon-sm icon-check checked-icon" aria-label="This member was added to card"></span><span class="icon-sm icon-forward light option js-open-option"></span></a>
            </li>
            <li class="item js-member-item active">
              <a class="name js-select-member" href="#" idmember="55c45415487ca2ca6fb3e4b5" title="sumesh_d (sumesh15)" autocompletetext="sumesh15"><span class="member js-member"><img class="member-avatar" height="30" width="30" src="https://trello-members.s3.amazonaws.com/55c45415487ca2ca6fb3e4b5/59adebfb4f0cecde2b2d5b91d00855c7/30.png" srcset="https://trello-members.s3.amazonaws.com/55c45415487ca2ca6fb3e4b5/59adebfb4f0cecde2b2d5b91d00855c7/30.png 1x, https://trello-members.s3.amazonaws.com/55c45415487ca2ca6fb3e4b5/59adebfb4f0cecde2b2d5b91d00855c7/50.png 2x" alt="sumesh_d (sumesh15)" title="sumesh_d (sumesh15)"><span id="55c45415487ca2ca6fb3e4b5-avatar"></span><span class="member-gold-badge" title="This member has Trello Gold." aria-label="This member has Trello Gold."></span></span><span class="full-name" name="sumesh_d (sumesh15" aria-hidden="aria-hidden">sumesh_d <span class="username">(sumesh15)</span></span><span class="icon-sm icon-check checked-icon" aria-label="This member was added to card"></span><span class="icon-sm icon-forward light option js-open-option"></span></a>
            </li>
          </ul>
        </div>
        <div class="pop-over-section js-org-members hide"><h4>Workspace members</h4>
          <div class="js-loading hide"><p class="empty" style="padding: 24px 6px">Loading…</p></div>
          <div class="js-no-results"><p class="empty" style="padding: 24px 6px">No results</p></div>
          <ul class="pop-over-member-list checkable u-clearfix js-mem-list"></ul>
        </div>
        <div class="js-show-org-members"><a class="subtle button full" href="#" style="margin-top: 8px;">Show other Workspace members</a></div>
        <div class="js-invite-no-results hide"><p class="empty" style="padding: 24px 6px">Looks like that person isn't a member yet. Enter their email address to add them to the card and board.</p></div>
        <div class="js-invite-results hide"></div>
        <div class="js-invite-error hide"><p class="error" style="margin: 16px 8px 6px;"></p></div>
      </div>
    </div>
  </div>
</div>
 -->
@endsection





@section('footer')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script type="text/javascript">
  $(document).ready(function()
  {
    $(".text-area").hide();
    $(".tasklog").hide();



    $(document).on('click','.text-area-p',function(){
      $(".text-area-p").hide();
      $(".text-area").show();
    });
    
    $(document).on('click','.description-cancel',function(){
      $(".text-area-p").show();
      $(".textarea").val('');
      $(".text-area").hide();
    });

    
    $(document).on('click','#logButton',function(){
      var text = $('#logButton').text();;
      if( text == 'Show Details' ){
        $(".tasklog").show();
        $("#logButton").text('Hide Details');
      }else{
        $(".tasklog").hide();
        $("#logButton").text('Show Details');
      }
    });

    $(document).on('click',".member", function() {
      $('.user').remove();
        var psettings_id = $('#project_settings_id').val();
        var task_name = $('#task').val();
        var project_id =  $('#project_id').val();
        $.ajax({
          url: "{{ url('/project/task') }}",
          type: "GET",
          data:{ project_id:project_id, task_name:task_name, psettings_id:psettings_id },
          success:function(data)
          {
            var select ='<div class="user">'+
                        '<select data-placeholder="-- Choose User --" class="select-link" name="user" id="user">'+
                        '<option> -- Choose User -- </option>'+
                        '</select>'+
                        '<button class="membersubmit">Assigned Member</button>'+
                        '</div>';
            $('.add-member').append(select);
              for( i=0 ; i <data.length ; i++ ){
                var user_option = '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                $('#user').append(user_option);
              }

          }
        });


    });



    $(document).on('click',".membersubmit", function() {
      
      var psettings_id = $('#project_settings_id').val();
      var task_name = $('#task').val();
      var project_id =  $('#project_id').val();
      var user = $('#user').val();
      //alert(user);
        $.ajax({
          url: "{{ url('/project/addmember') }}",
          type: "GET",
          data:{ project_id:project_id, task_name:task_name, psettings_id:psettings_id, user:user },
          success:function(data)
          {

            tasklog(data.project_settings_id);
            $("#task_id").val("");
            $("#task_id").val(data.task_id);
          }
        })
    })


    $(document).on('click',".description", function() {
      var psettings_id = $('#project_settings_id').val();
      var task_name = $('#task').val();
      var project_id =  $('#project_id').val();
      var description = $('#description').val();
      //alert(user);
        $.ajax({
          url: "{{ url('/project/description') }}",
          type: "GET",
          data:{ project_id:project_id, task_name:task_name, psettings_id:psettings_id, description:description },
          success:function(data)
          {
            tasklog(data.project_settings_id);
            alert(data.message);
            $("#task_id").val("");
            $("#task_id").val(data.task_id);
          }
        })
    })


    $(document).on('click',".comment", function() {
      var task_id = $('#task_id').val();
      var task_comment = $('#task_comment').val();
      alert(task_comment);
      //alert(user);
        $.ajax({
          url: "{{ url('/project/comment') }}",
          type: "GET",
          data:{ task_id:task_id, task_comment:task_comment },
          success:function(data)
          {
            // tasklog(data.project_settings_id);
            alert(data);
            console.log(data);
          }
        })
    })


    $(document).on('click','.date',function(){
      $('.task_duedate').val('');
      $('.add-date').show();
    });

    $(document).on('click',".due_datesubmit", function() {
      var psettings_id = $('#project_settings_id').val();
      var task_name = $('#task').val();
      var project_id =  $('#project_id').val();
      var task_duedate = $('#task_duedate').val();
      //alert(user);
        $.ajax({
          url: "{{ url('/project/date') }}",
          type: "GET",
          data:{ project_id:project_id, task_name:task_name, psettings_id:psettings_id, task_duedate:task_duedate },
          success:function(data)
          {
            tasklog(data.project_settings_id);
            statusdate(data.project_settings_id);
            $("#task_id").val("");
            $("#task_id").val(data.task_id);
          }
        })
    })

    $(document).on('click','.status',function(){
      if(this.checked) {
        // $('#output').html('Checkbox is checked');
        $("#status-alert").removeClass("alert alert-success");
        $("#status-alert").removeClass("alert alert-danger");
        $("#status-alert").addClass("alert alert-success");
        $("#status-alert").text("Complete");
        var project_settings_id = $('#project_settings_id').val();
        var completed = 'Completed';
        //alert('work');

        $.ajax({
          url: "{{ url('/task/status') }}",
          method: "GET",
          data: { project_settings_id:project_settings_id, completed:completed },
          success:function(data){
            alert(data);
            completed = "";
          }
        });
      }else{
        $("#status-alert").removeClass("alert alert-success");
        $("#status-alert").removeClass("alert alert-danger");
        $("#status-alert").addClass("alert alert-danger");
        $("#status-alert").text("Incomplete");
        var project_settings_id = $('#project_settings_id').val();
        var completed = 'Incomplete';
        $.ajax({
          url: "{{ url('/task/status') }}",
          method: "GET",
          data: { project_settings_id:project_settings_id, completed:completed },
          success:function(data){
            alert(data);
            completed = "";
          }
        });
      }


    })



    function tasklog(project_settings_id){
      $.ajax({
        url: "{{ url('/tasklog') }}",
        type: "GET",
        data: { project_settings_id:project_settings_id },
        success:function(data)
        {
          console.log(data);
          $('.log-delete').remove();
          var logdelete = '<div class="log-delete">'+

                          '</div>';
          $('.tasklog').append(logdelete);    
          for( i=0 ; i <data.length ; i++ ){

            if( data[i].field_name == 'Description'){
              var userlog = '<div class="tasklog_details">'+

                              '<div class="row">'+

                                '<div class="col-md-1"> '+data[i].name +'</div>'+
                                '<div class="col-md-11">'+
                                  '<div class="userdesc col-md-12"> '+data[i].name +' set this description -> '+data[i].field_data+' Jul 14 at 1:16 AM</div>'+
                                  '<div class="user-meta col-md-12">'+ moment(data[i].created_at).format('MMMM Do YYYY')+'</div>'+
                                '</div>'+

                              '</div>'+

                            '</div>';
              $('.log-delete').append(userlog);  

            } else if(data[i].field_name == 'Due Date'){
              var userlog = '<div class="tasklog_details">'+
                              '<div class="row">'+
                                '<div class="col-md-1"> '+data[i].name +'</div>'+
                                '<div class="col-md-11">'+
                                  '<div class="userdesc col-md-12"> '+data[i].name +' set this card to be due -> '+ moment(data[i].field_data).format('MMMM Do YYYY')+' </div>'+
                                  '<div class="user-meta col-md-12">'+ moment(data[i].created_at).format('MMMM Do YYYY')+'</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>';
              $('.log-delete').append(userlog);

            }else{
              var userlog = '<div class="tasklog_details">'+
                            '<div class="row">'+
                              '<div class="col-md-1"> User</div>'+
                              '<div class="col-md-11">'+
                                '<div class="userdesc col-md-12"> Indranil Dhar set this card to be due Jul 14 at 1:16 AM</div>'+
                                '<div class="user-meta col-md-12"></div>'+
                              '</div>'+
                            '</div>'+
                          '</div>';
              $('.log-delete').append(userlog);
            }

          }

        }
      });

    }


    function statusdate(project_settings_id){
      $(".status-label").remove();
      // var status = '<label class="status-label">'+
      //               '</label>';
      // $(".status-span").append(status);
      $.ajax({
        url: "{{ url('/task/statusdate') }}",
        type: "GET",
        data: { project_settings_id:project_settings_id },
        success:function(data)
        {
            $("#task_id").val("");
            $("#task_id").val(data.id);

          if (data.status == 'Completed') {
            var date ='<label class="status-label">'+
                      '<input type="checkbox" name="status" class="status" checked>'+
                      '<span class="status-date"> '+ moment(data.task_duedate).format('MMMM Do YYYY') +' </span>'+
                      '<span class="alert alert-success" id="status-alert"> Complete</span>'+
                      '</label>';
            $(".status-span").append(date);

          }else if(data.status == 'Assigned'){
            var date ='<label class="status-label">'+
                      '<input type="checkbox" name="status" class="status">'+
                      '<span class="status-date"> '+ moment(data.task_duedate).format('MMMM Do YYYY') +' </span>'+
                      '<span class="alert alert-danger" id="status-alert"> Incomplete</span>'+
                      '</label>';
            $(".status-span").append(date);
          }
          
          
          console.log('Converted date: '+ moment(data.task_duedate).format('MMMM Do YYYY'));

        }
      });
    }









    $( "#task_duedate" ).datepicker({
      dateFormat:'dd/mm/yy',
    });
    // $( ".task_assing_on" ).datepicker({
    //   dateFormat:'dd/mm/yy',
    // });
    //$( ".datepicker" ).datepicker( "option", "altFormat", "mm-dd-yy" );

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




    $(document).on('click','.viewbtn',function(){
      var id=$(this).attr("id");
      let name = $(this).attr('data-name');
      let table = $(this).attr('data-table');
      let stype = $(this).attr('data-type');
      //alert(stype);
      $.ajax({
        url: "{{ url('/project/parent') }}",
        type: "GET",
        data:{ id:id, stype:stype },
        success:function(data)
        {
          if( stype == "presales" ){
            $("#preh3").text("");
            $("#preh3").text(name);
            $("#presales_child").show();

            $("#presales_child").find('.col-checkbox').remove();
            var view = "", upload="", download="",comments="" ;
            for( i=0 ; i <data.length ; i++ ){
              if ( data[i].can_view != 0) {
                view = '<a href="/document/'+ data[i].id +'/'+ data[i].project_id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].can_upload != 0) {
                upload = '<a href="/adddocument/'+ data[i].id +'/'+ data[i].project_id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/upload-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].can_download != 0) {
                download = '<a href="#" class="viewbtn3"> <img src={{ url("assets/images/icon/download-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].can_comment != 0) {
                comments = '<a href="/comment/'+ data[i].id +'/'+ data[i].project_id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/comment-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              var child  ='<div class="col-checkbox">'+
                            '<label class="chekk">'+
                            '<input type="checkbox" >'+
                            '<span class="checkmark"></span>'+ data[i].name + ' '+view +' '+upload + ' ' +download +' ' + comments +'</label>'+
                            '<ul class="prechild_lavel2'+data[i].id+'">'+
                            '</ul>'+
                          '</div>';
              $("#presales_child").append(child);
              view = ""; upload=""; download=""; comments="";
              stype = "presales";
               id = data[i].id ;
                $.ajax({
                  url: "{{ url('/project/parent') }}",
                  type: "GET",
                  data:{ id:id, stype:stype },
                  success:function(data)
                  {
                    for( i=0 ; i <data.length ; i++ ){
                      if ( data[i].can_view != 0) {
                        view = '<a href="/document/'+ data[i].id +'/'+ data[i].project_id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].can_upload != 0) {
                        upload = '<a href="/adddocument/'+ data[i].id +'/'+ data[i].project_id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/upload-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].can_download != 0) {
                        download = '<a href="#" class="viewbtn3"> <img src={{ url("assets/images/icon/download-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].can_comment != 0) {
                        comments = '<a href="/comment/'+ data[i].id +'/'+ data[i].project_id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/comment-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      var child_lavel2 ='<li>'+
                                          '<label><input type="checkbox">'+data[i].name+ ' '+view +' '+upload + ' ' +download +' ' + comments +' </label>'+
                                          '<button class="Click-here" data-name="'+data[i].name +'" data-projectid="'+data[i].project_id+'" data-psettings-id="'+data[i].id+'" id="id'+data[i].id+'">Click Here</button>' +  
                                        '</li>'+
                                        '<div id="div9" class="hide9">' +
                                          '<ul class="prechild_lavel3'+data[i].id+'">'+
                                          '</ul>'+
                                        '</div>';
                      $(".prechild_lavel2"+data[i].parent_id).append(child_lavel2);
                      view = ""; upload=""; download=""; comments="";
                      stype = "presales";
                      id = data[i].id ;
                      $(document).on('click',"#id"+data[i].id, function() {
                        $(".custom-model-main").addClass('model-open');
                        $('.user').remove();
                        $(".tasklog").hide();
                        $("#logButton").text('Show Details');

                        $('#project_id').val("");
                        $('#task').val("");
                        $('#project_settings_id').val("");

                        //alert($(this).attr('data-psettings-id'));
                        var project_id =$(this).attr('data-projectid');
                        var task_name =$(this).attr('data-name');
                        var psettings_id=$(this).attr('data-psettings-id');


                        
                        $('.taskh2').remove();
                        var h2 = '<h2 class="taskh2">'+task_name+'</h2>';
                        $('.taskdiv').append(h2);

                        $('#project_id').val(project_id);
                        $('#task').val(task_name);
                        $('#project_settings_id').val(psettings_id);
                        tasklog(psettings_id);
                        statusdate(psettings_id);

                        
                        // $.ajax({
                        //     url: "{{ url('/project/task') }}",
                        //     type: "GET",
                        //     data:{ project_id:project_id, task_name:task_name, psettings_id:psettings_id },
                        //     success:function(data)
                        //     {
                        //       var select ='<select data-placeholder="-- Choose User --" name="user" id="user" class="content-wrap userDiv4">'+
                        //                       '<option> -- Choose User -- </option>'+
                        //                     '</select>';
                        //       $('.userdiv').append(select);
                        //       for( i=0 ; i <data.length ; i++ ){
                        //         var user_option = '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        //         $('#user').append(user_option);
                        //       }
                        //       //alert(data);
                        //       console.log(data);
                        //     }

                        // })

                      }); 
                      $(".close-btn, .bg-overlay").click(function(){
                        $(".custom-model-main").removeClass('model-open');
                      });
 
                      $.ajax({
                        url: "{{ url('/project/parent') }}",
                        type: "GET",
                        data:{ id:id, stype:stype },
                        success:function(data)
                        {
                          for( i=0 ; i <data.length ; i++ ){
                            var child_lavel3 ='<li>'+  
                                                '<label for="radio44"> ' +
                                                '<input type="checkbox" id="radio44" name="optradio14" > '+ data[i].name +' </label>' + 
                                              '</li>'+
                                              '<div id="div9" class="hide9">' +
                                                '<ul class="prechild_lavel4'+data[i].id+'">'+
                                                '</ul>'+
                                              '</div>';
                            $(".prechild_lavel3"+data[i].parent_id).append(child_lavel3);
                            view = ""; upload=""; download=""; comments="";
                            stype = "presales";
                            id = data[i].id ;
                            $.ajax({
                              url: "{{ url('/project/parent') }}",
                              type: "GET",
                              data:{ id:id, stype:stype },
                              success:function(data)
                              {
                                for( i=0 ; i <data.length ; i++ ){
                                  var child_lavel4 ='<li>'+  
                                                '<label for="radio44"> ' +
                                                '<input type="checkbox" id="radio44" name="optradio14" > '+ data[i].name +' </label>' + 
                                              '</li>';
                                $(".prechild_lavel4"+data[i].parent_id).append(child_lavel4);
                                view = ""; upload=""; download=""; comments="";
                                 stype ="";id="";

                                }
                              }
                            }) 
                          }
                        }
                      })   
                    }
                  }
                })
            }
          }else if( stype == "postsales" ){
            $("#posth3").text("");
            $("#posth3").text(name);
            $("#postsales_child").show();
            $("#postsales_child").find('.col-checkbox').remove();
            var view = "", upload="", download="",comments="" ;
            for( i=0 ; i <data.length ; i++ ){
              if ( data[i].can_view != 0) {
                view = '<a href="/gallery/'+ data[i].name +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].can_upload != 0) {
                upload = '<a href="/addimage/'+ data[i].name +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/upload-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].can_download != 0) {
                download = '<a href="#" class="viewbtn3"> <img src={{ url("assets/images/icon/download-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].can_comment != 0) {
                comments = '<a href="/comment/'+ data[i].id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/comment-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              var child  ='<div class="col-checkbox">'+
                            '<label class="chekk">'+
                            '<input type="checkbox" >'+
                            '<span class="checkmark"></span>'+ data[i].name + ' '+view +' '+upload + ' ' +download +' ' + comments +'</label>'+
                            '<ul class="postchild_lavel2'+data[i].id+'">'+
                            '</ul>'+
                          '</div>';
                $("#postsales_child").append(child);
                view = ""; upload=""; download=""; comments="";
                stype = "postsales";
                id = data[i].id ;
                $.ajax({
                  url: "{{ url('/project/parent') }}",
                  type: "GET",
                  data:{ id:id, stype:stype },
                  success:function(data)
                  {
                    for( i=0 ; i <data.length ; i++ ){
                      if ( data[i].can_view != 0) {
                        view = '<a href="/gallery/'+ data[i].name +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].can_upload != 0) {
                        upload = '<a href="/addimage/'+ data[i].name +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/upload-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].download != 0) {
                        download = '<a href="#" class="viewbtn3"> <img src={{ url("assets/images/icon/download-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].can_comment != 0) {
                        comments = '<a href="/comment/'+ data[i].id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/comment-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      var child_lavel2 ='<li>'+
                                          '<label><input type="checkbox">'+data[i].name + ' '+view +' '+upload + ' ' +download +' ' + comments +' </label>'+   
                                        '</li>'+
                                        '<div id="div9" class="hide9">' +
                                          '<ul class="postchild_lavel3'+data[i].id+'">'+

                                          '</ul>'+
                                        '</div>';
                      $(".postchild_lavel2"+data[i].parent_id).append(child_lavel2);
                      view = ""; upload=""; download=""; comments="";
                      stype = "postsales";
                      id = data[i].id ;
                      $.ajax({ 
                        url: "{{ url('/parent') }}",
                        type: "GET",
                        data:{ id:id, stype:stype },
                        success:function(data){
                          for( i=0 ; i <data.length ; i++ ){
                             var child_lavel3 ='<li>'+  
                                                '<label for="radio44"> ' +
                                                '<input type="checkbox" id="radio44" name="optradio14" > '+ data[i].name +' </label>' + 
                                              '</li>'+
                                              '<div id="div9" class="hide9">' +
                                                '<ul class="postchild_lavel4'+data[i].id+'">'+
                                          
                                                '</ul>'+
                                              '</div>';
                            $(".postchild_lavel3"+data[i].parent_id).append(child_lavel3);
                            stype = "postsales";
                            id = data[i].id ; 
                            $.ajax({
                              url: "{{ url('/parent') }}",
                              type: "GET",
                              data:{ id:id, stype:stype },
                              success:function(data)
                              {
                                for( i=0 ; i <data.length ; i++ ){
                                  var child_lavel4 ='<li>'+  
                                                '<label for="radio44"> ' +
                                                '<input type="checkbox" id="radio44" name="optradio14" > '+ data[i].name +' </label>' + 
                                              '</li>';
                                $(".postchild_lavel4"+data[i].parent_id).append(child_lavel4);
                                stype = "";
                                id = "";


                                }
                              }
                            })
                          }
                        }
                      }) 
                    }

                  }

                })
            }
          }else if( stype == "execution" ){
            $("#exeh3").text("");
            $("#exeh3").text(name);
            $("#execution_child").show();

            $("#execution_child").find('.col-checkbox').remove();
            var view = "", upload="", download="",comments="" ;
            for( i=0 ; i <data.length ; i++ ){
              if ( data[i].view != 0) {
                view = '<a href="/gallery/'+ data[i].name +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].upload != 0) {
                upload = '<a href="/addimage/'+ data[i].name +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/upload-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].download != 0) {
                download = '<a href="#" class="viewbtn3"> <img src={{ url("assets/images/icon/download-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              if ( data[i].comment != 0) {
                comments = '<a href="/comment/'+ data[i].id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/comment-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
              }
              var child  ='<div class="col-checkbox">'+
                            '<label class="chekk">'+
                            '<input type="checkbox" >'+ 
                            '<span class="checkmark"></span>'+ data[i].name + ' '+view +' '+upload + ' ' +download +' ' + comments +'</label>'+ 
                            '<ul class="exchild_lavel2'+data[i].id+'">'+
                            '</ul>'+
                            
                          '</div>';
                $("#execution_child").append(child);
                view = ""; upload=""; download=""; comments="";
                stype = "execution";
                id = data[i].id ;
                $.ajax({ 
                  url: "{{ url('/parent') }}",
                  type: "GET",
                  data:{ id:id, stype:stype },
                  success:function(data)
                  {
                    for( i=0 ; i <data.length ; i++ ){
                      if ( data[i].view != 0) {
                        view = '<a href="/gallery/'+ data[i].name +'/'+data[i].type+'.index" class="viewbtn3"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].upload != 0) {
                        upload = '<a href="/addimage/'+ data[i].name +'/'+data[i].type+'.create" class="viewbtn3"> <img src={{ url("assets/images/icon/upload-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].download != 0) {
                        download = '<a href="#" class="viewbtn3"> <img src={{ url("assets/images/icon/download-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      if ( data[i].comment != 0) {
                        comments = '<a href="/comment/'+ data[i].id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/comment-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
                      }
                      var child_lavel2 ='<li>'+
                                          '<label><input type="checkbox">'+data[i].name + ' '+view +' '+upload + ' ' +download +' ' + comments +' </label>'+   
                                        '</li>'+
                                        '<div id="div9" class="hide9">' +
                                          '<ul class="exchild_lavel3'+data[i].id+'">'+

                                          '</ul>'+
                                        '</div>';
                      $(".exchild_lavel2"+data[i].parent_id).append(child_lavel2);
                      view = ""; upload=""; download=""; comments="";
                      stype = "execution";
                      id = data[i].id ; 
                      $.ajax({ 
                        url: "{{ url('/parent') }}",
                        type: "GET",
                        data:{ id:id, stype:stype },
                        success:function(data)
                        {
                          for( i=0 ; i <data.length ; i++ ){

                            var child_lavel3 ='<li>'+  
                                                '<label for="radio44"> ' +
                                                '<input type="checkbox" id="radio44" name="optradio14" > '+ data[i].name +' </label>' + 
                                              '</li>'+
                                              '<div id="div9" class="hide9">' +
                                                '<ul class="exchild_lavel4'+data[i].id+'">'+
                                          
                                                '</ul>'+
                                              '</div>';
                            $(".exchild_lavel3"+data[i].parent_id).append(child_lavel3);
                            stype = "execution";
                            id = data[i].id ; 
                            $.ajax({
                              url: "{{ url('/parent') }}",
                              type: "GET",
                              data:{ id:id, stype:stype },
                              success:function(data)
                              {
                                for( i=0 ; i <data.length ; i++ ){
                                var child_lavel4 ='<li>'+  
                                                '<label for="radio44"> ' +
                                                '<input type="checkbox" id="radio44" name="optradio14" > '+ data[i].name +' </label>' + 
                                              '</li>';
                                $(".exchild_lavel4"+data[i].parent_id).append(child_lavel4);
                                stype = "";
                                id = "";

                                }
                              }

                            })
                          }
                        }
                      })
                    }
                  }
                })
            }
          }

        }
      })
    })
  })




</script>


@endsection