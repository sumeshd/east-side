@extends('settings_master.index_settings')

@section('content')

<h2>
  <a href="{{ url('gallery') }}" class="combtnDiv">Gallery </a>
</h2>

			<div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>

            <div class="uplode-imgSec">
            	<form method="post" action="/image/upload" enctype="multipart/form-data">
            		@csrf
                <h3> Add New Image </h3>
                <div class="row">
	                <div class="col-md-5">
	                    <div class="uplode-imgSec-in">
	                    	<div class="upDiv"> <input type="file" class="fa fa-upload" name="image[]" multiple accept="image/*"> <!-- <button type="file"><i class="fa fa-upload"></i> Uplode image</button> --> </div>
	                    </div>
	                </div>
	                <div class="col-md-7">
	                    <div class="uplode-imgSec-in">
	                      <div class="form-group">
	                        <input type="text" class="form-control" name="image_name" placeholder="Add image Name" id="usr">
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