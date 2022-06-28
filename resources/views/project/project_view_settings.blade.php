@extends('project.index_projectsettings')

@section('content')

  <div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Project Settings <span> <i class="fa fa-cogs"></i> </span> <small>Projact Settings - View </small> </h1>
        <div class="card">
          <div class="card-body">






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



@endsection





@section('footer')

<script type="text/javascript">
  $(document).ready(function()
  {


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
                comments = '<a href="/comment/'+ data[i].id +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/comment-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
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
                        view = '<a href="gallery/'+ data[i].name +'/'+data[i].type+'" class="viewbtn3"> <img src={{ url("assets/images/icon/view-svgrepo-com.svg") }} alt="icon" style="width:17px;"></a>';         
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
                      var child_lavel2 ='<li>'+
                                          '<label><input type="checkbox">'+data[i].name + ' '+view +' '+upload + ' ' +download +' ' + comments +' </label>'+   
                                        '</li>'+
                                        '<div id="div9" class="hide9">' +
                                          '<ul class="prechild_lavel3'+data[i].id+'">'+
                                          '</ul>'+
                                        '</div>';
                      $(".prechild_lavel2"+data[i].parent_id).append(child_lavel2);
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
                    console.log(data);
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
                    //console.log(data);
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
                          //console.log(data);
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