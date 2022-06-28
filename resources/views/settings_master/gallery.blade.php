@extends('settings_master.index_settings')

@section('content')

@foreach( $settings as $setting)
  @if( $setting['type'] == 'presales')
  <h2><span> Gallery </span>
  <a href="{{ url('/addimage/'.$setting['name'].'/'.$setting['settings_name']) }}" class="combtnDiv"> Create New Image </a>
  </h2>
  <div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>
  @elseif( $setting['settings_name'] == 'postsales')
  <!-- <form action="" >
    @csrf
    <input type="hidden" name="postsales_name" value="{{ $setting['postsales_name'] }}">
    <input type="hidden" name="settings_name" value="{{ $setting['settings_name'] }}">
    <button type="submit" class="combtnDiv">Create New Image </button> 
  </form> -->
  <h2><span> Gallery </span>
  <a href="{{ url('/addimage/'.$setting['postsales_name'].'/'.$setting['settings_name']) }}" class="combtnDiv"> Create New Image </a>
  </h2>
      <div class="boxthree">
        <ul>
          <li> <a href="#"> Presales </a> </li>
          <li  class="active"> <a href="#"> Postsales </a> </li>
          <li> <a href="#"> Execution </a> </li>
        </ul>
      </div>
  @elseif( $setting['settings_name'] == 'execution')
  <h2><span> Gallery </span>
  <a href="{{ url('/addimage/'.$setting['execution_name'].'/'.$setting['settings_name']) }}" class="combtnDiv"> Create New Image </a>
  </h2>
    <div class="boxthree">
      <ul>
        <li> <a href="#"> Presales </a> </li>
        <li> <a href="#"> Postsales </a> </li>
        <li class="active"> <a href="#"> Execution </a> </li>
      </ul>
    </div>
  @endif
  @endforeach
  


						
                <div class="row" style="margin-top: 20px;">
                  <div class="col-lg-12">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ $message }}</p>

                        </div>
                        @endif
                  </div>
                </div>

            <div class="uplode-imgSec mt-2">

                <div class="row" style="margin-top: 20px;">
                  <div class="col-lg-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ Session::get('success') }}</p>

                        </div>
                    @endif
                  </div>
                </div>


                <div class="row">
                	@foreach($images as $image)
                	<div class="col-xl-2 col-lg-3 col-md-6 col-md-6 col-xs-12">
                		<div class="card mb-3">
                			<!-- <img src="{{ asset('images/'.$image->image) }}" class="card-img-top" alt="Broken" height="280" > -->
                			<iframe src="{{ url('/images/'.$image->image ) }}" class="card-img-top" alt="Broken" height="280"></iframe>
                      <div class="card-body">
                				<p class="card-text" style="color:black;">{{ $image->created_at->diffForHumans()}} </p>
                				
                					<a href="/images/{{ $image->image }}" download="{{$image->image}}"> <button class="btn btn-success"> Download </button> </a>
                					<!-- <a href="{{url('/image/download/'.$image->id) }}" class="btn btn-success"> Download</a> -->
                          <a href="{{url('/image/delete/'.$image->id.'/'.$image->task_name.'/'.$image->settings_name) }}" class="btn btn-danger"> Delete</a>
                					<!-- <input type="submit" name="" class="btn btn-danger" value="Delete"> -->

                				
                				
                			</div>
                		</div>
                	</div>
                	@endforeach
                </div>



                
                <div class="col-lg-12">
                    {{$images->onEachSide(1)->links()}}
                </div>
               
            </div>




@endsection





@section('footer')

@endsection