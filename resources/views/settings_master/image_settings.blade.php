@extends('settings_master.index_settings')

@section('content')

<!-- <h2>
  <a href="{{ url('gallery') }}" class="combtnDiv">Gallery </a>
</h2> -->

			<div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>

            <div class="uplode-imgSec">
            	<form method="POST" action="/image/upload" enctype="multipart/form-data">
            		@csrf
                <h3> Add New Image </h3>
                <div class="row">
	                <div class="col-md-5">
	                    <div class="uplode-imgSec-in">
	                    	<!--<div class="upDiv">  <input type="file" class="fa fa-upload" name="image[]" multiple > --> <!-- <button type="file"><i class="fa fa-upload"></i> Uplode image</button>  accept="image/*"  </div>-->
												<div class="upDiv"> <input type="file" class="fa fa-upload" name="image" > </div>	                    
	                    </div>
	                    <div id="color_red"> @error('image')<li>{{ $message }}</li>@enderror</div>
	                </div>
	                <div class="col-md-7">
	                    <div class="uplode-imgSec-in">
	                      <div class="form-group">
	                        <input type="text" class="form-control" name="image_name" placeholder="Add image Name" id="usr">
	                        @foreach($settings as $setting)
		                        @if($setting['settings_name'] == 'presales')
		                        <input type="hidden" name="task_name" value="{{ $setting['presales_name'] }}">
		                        <input type="hidden" name="settings_name" value="{{ $setting['settings_name'] }}">
		                        
		                        @elseif($setting['settings_name'] == 'postsales')
		                        <input type="hidden" name="task_name" value="{{ $setting['postsales_name'] }}">
		                        <input type="hidden" name="settings_name" value="{{ $setting['settings_name'] }}">

		                        @elseif($setting['settings_name'] == 'execution')
		                        <input type="hidden" name="task_name" value="{{ $setting['execution_name'] }}">
		                        <input type="hidden" name="settings_name" value="{{ $setting['settings_name'] }}">
		                        @endif
	                        @endforeach
	                      </div>
	                      <!-- <a href="#" class="savbtn"> Save </a> -->
	                      <button type="submit" class="savbtn"> Save </button> 
	                  	</div> 
	                </div> 
                </div>
                </form>
            </div>




@endsection





@section('footer')

@endsection