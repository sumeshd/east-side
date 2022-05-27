@extends('settings_master.index_settings')

@section('content')


<h2> <span> Settings View </span> 
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
              @foreach($menu as $menus)
              <div class="row">
                <div class="col-md-7">
                  <div class="progressDiv-in">
                    <h3> EGF PreSales Progress </h3>

                   <!--  @foreach( $settings_presaless as $presales)
                    <div class="progressDiv-inbox"> <span> <img src="{{ url('assets/images/settings/psale-icon1.png') }}"> </span>
                      <h4> {{ $presales['presales_name'] }} <small> 01 Nov 21</small> </h4>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                      <a href="#" class="viewbtn " id="{{ $presales['id']}}" data-name="{{ $presales['presales_name'] }}" data-table="settings_presales"> View check list</a> </div>
                    @endforeach -->


                    
                      <div class="progressDiv-inbox"> <span> <img src="{{ url('assets/images/settings/psale-icon1.png') }}"> </span>
                      <h4> {{ $menus['presales_name'] }} <small> 01 Nov 21</small> </h4>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                      <a href="#" class="viewbtn" > View check list</a> </div>
                    
                      @foreach( $menus['children'] as $children )
                        <li> {{ $children['presales_name'] }}</li>
                        
                      @endforeach

                    
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="progressDiv-in-rht" id="presales_child" >

                    <h3 id="preh3">  <small> Filled by Mrs Y </small> </h3>


                    @foreach( $menus['children'] as $children )
                      <div class="col-checkbox">
                        <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span>{{ $children['presales_name'] }} </label>
                        
                        <div id="div8" class="hide8">
                          <ul>
                            <li>
                              <label for="checkbox44">
                                <input type="checkbox" id="checkbox44">
                               Mirrors </label>
                            </li>
                           </ul>
                        </div>

                      </div>
                    @endforeach

                    
                    <!-- <div class="col-checkbox">
                      <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span> Room/ floor wise </label>
                      <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span> Approval <a href=""> View Details</a> </label>
                    </div> -->
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            

            <div class="progressDiv tabpanel" id="Postsales">
              <div class="row">
                <div class="col-md-7">
                  <div class="progressDiv-in">
                    <h3> EGF PostSales Progress </h3>

                    @foreach( $settings_postsales as $postsales)
                    <div class="progressDiv-inbox"> <span> <img src="{{ url('assets/images/settings/psale-icon1.png') }}"> </span>
                      <h4> {{ $postsales['postsales_name'] }} <small> 01 Nov 21</small> </h4>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                      <a href="#" class="viewbtn" id="{{ $postsales['id']}}" data-name="{{ $postsales['postsales_name'] }}" data-table="settings_postsales"> View check list</a> </div>
                    @endforeach

                  </div>
                </div>
                <div class="col-md-5">
                  <div class="progressDiv-in-rht" id="postsales_child" style="display:none">
                    <h3 id="posth3">  <small> Filled by Mrs Y </small> </h3>
                   
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

                        </ul>
                      </div>
                    </div>
                    <div class="col-checkbox">
                      <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span> Accessories <a href=""> View Details</a> </label>
                      <div id="div8" class="hide8">
                        <ul>
                          
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

            <div class="progressDiv tabpanel" id="Execution">
              <div class="row">
                <div class="col-md-7">
                  <div class="progressDiv-in">
                    <h3> EGF Execution Progress </h3>

                    @foreach( $settings_execution as $execution)
                    <div class="progressDiv-inbox"> <span> <img src="{{ url('assets/images/settings/psale-icon1.png') }}"> </span>
                      <h4> {{ $execution['execution_name'] }} <small> 01 Nov 21</small> </h4>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                      <a href="#" class="viewbtn" id="{{ $execution['id']}}" data-name="{{ $execution['execution_name'] }}" data-table="settings_execution"> View check list</a> </div>
                    @endforeach

                  </div>
                </div>
                <div class="col-md-5">
                  <div class="progressDiv-in-rht" id="execution_child" style="display:none">
                    <h3 id="exeh3"> Requirement analysis  checklist <small> Filled by Mrs Y </small> </h3>
                    
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

                        </ul>
                      </div>
                    </div>
                    <div class="col-checkbox">
                      <label class="chekk">
                        <input type="checkbox" >
                        <span class="checkmark"></span> Accessories <a href=""> View Details</a> </label>
                      <div id="div8" class="hide8">
                        <ul>
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
      //alert(table);
      $.ajax({
        url: "{{ url('/parent') }}",
        type: "GET",
        data:{ id:id, table:table },
        success:function(data)
        {
          if( table == "settings_presales" ){
            $("#preh3").text("");
            $("#preh3").text(name);
            $("#presales_child").show();

            $("#presales_child").find('.col-checkbox').remove();
            for( i=0 ; i <data.length ; i++ ){
              var child  ='<div class="col-checkbox">'+
                            '<label class="chekk">'+
                            '<input type="checkbox" >'+
                            '<span class="checkmark"></span>'+ data[i].presales_name +'</label>'+
                          '</div>';
              $("#presales_child").append(child);
              table = "";
            }
          }else if( table == "settings_postsales" ){
            $("#posth3").text("");
            $("#posth3").text(name);
            $("#postsales_child").show();

            $("#postsales_child").find('.col-checkbox').remove();
            for( i=0 ; i <data.length ; i++ ){
              var child  ='<div class="col-checkbox">'+
                            '<label class="chekk">'+
                            '<input type="checkbox" >'+
                            '<span class="checkmark"></span>'+ data[i].postsales_name +'</label>'+
                          '</div>';
                $("#postsales_child").append(child);
                table = "";
            }
          }else if( table == "settings_execution" ){
            $("#exeh3").text("");
            $("#exeh3").text(name);
            $("#execution_child").show();

            $("#execution_child").find('.col-checkbox').remove();
            for( i=0 ; i <data.length ; i++ ){
              var child  ='<div class="col-checkbox">'+
                            '<label class="chekk">'+
                            '<input type="checkbox" >'+
                            '<span class="checkmark"></span>'+ data[i].execution_name +'</label>'+
                          '</div>';
                $("#execution_child").append(child);
                table = "settings_execution";
                id = data[i].id ; 
                alert(id);
                $.ajax({ 
                  url: "{{ url('/parent') }}",
                  type: "GET",
                  data:{ id:id, table:table },
                  success:function(data)
                  {

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