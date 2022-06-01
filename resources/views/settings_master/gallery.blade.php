@extends('settings_master.index_settings')

@section('content')
<h2><span> Gallery </span>
  <a href="{{ url('settings/imageadd') }}" class="combtnDiv">Create New Image </a>
</h2>

						<div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>

            <div class="uplode-imgSec mt-2">
            	
                <h3>  </h3>


                <div class="row" style="margin-top: 20px;">
								  <div class="col-lg-12">
								    @if($message = Session::get('success'))
								        <div class="alert alert-success" role="alert">
								            <p>{{ $message }}</p>

								        </div>
								        @endif
								  </div>
								</div>


                <div class="row">
                	@foreach($images as $image)
                	<div class="col-xl-2 col-lg-3 col-md-6 col-md-6 col-xs-12">
                		<div class="card mb-3">
                			<img src="{{ url($image->image) }}" class="card-img-top" alt="Broken" height="280" >
                			<div class="card-body">
                				<form action="image/delete/{{ $image->id }}" method="POST" >
                					@method('DELETE')
                					@csrf
                					<input type="submit" name="" class="btn btn-danger" value="Delete">
                				</form>
                				
                			</div>
                		</div>
                	</div>
                	@endforeach

	                




                </div>
               
            </div>




@endsection





@section('footer')

@endsection