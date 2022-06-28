@extends('project.index_projectsettings')

@section('content')


<div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Project <span> <i class="fa fa-file"></i> </span> <small>Project - Documnts </small> </h1>
        <div class="card">
          <div class="card-body">



          @foreach( $settings as $setting)
            @if( $setting['type'] == 'presales')
            <h2><span> Gallery </span>
            <a href="{{ url('/adddocument/'.$setting['id'].'/'.$setting['project_id'].'/'.$setting['type']) }}" class="combtnDiv"> Create New Image </a>
            </h2>
            <div class="boxthree">
                          <ul>
                            <li class="active"> <a href="#"> Presales </a> </li>
                            <li> <a href="#"> Postsales </a> </li>
                            <li> <a href="#"> Execution </a> </li>
                          </ul>
                      </div>
            @elseif( $setting['type'] == 'postsales')
            <h2><span> Gallery </span>
            <a href="{{ url('/adddocument/'.$setting['id'].'/'.$setting['project_id'].'/'.$setting['type']) }}" class="combtnDiv"> Create New Image </a>
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
            <a href="{{ url('/adddocument/'.$setting['id'].'/'.$setting['project_id'].'/'.$setting['type']) }}" class="combtnDiv"> Create New Image </a>
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


  			<div> class="uplode-imgSec mt-2">

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
                	@foreach($documents as $document)
                	<div class="col-xl-2 col-lg-3 col-md-6 col-md-6 col-xs-12">
                		<div class="card mb-3">
                			<!-- <img src="{{ asset('images/'.$document->document_name) }}" class="card-img-top" alt="Broken" height="280" > -->
                			<iframe src="{{ url('/images/'.$document->document_name ) }}" class="card-img-top" alt="Broken" height="280"></iframe>
                      <div class="card-body">
                				<p class="card-text" style="color:black;">{{ $document->created_at->diffForHumans()}} </p>
                				
                					<a href="/images/{{ $document->document_name }}" download="{{$document->document_name}}"> <button class="btn btn-success"> Download </button> </a>
                					<!-- <a href="{{url('/image/download/'.$document->id) }}" class="btn btn-success"> Download</a> -->
                          <a href="{{url('/image/delete/'.$document->id.'/'.$document->project_settings_id.'/'.$document->project_id) }}" class="btn btn-danger"> Delete</a>
                					<!-- <input type="submit" name="" class="btn btn-danger" value="Delete"> -->

                			</div>
                		</div>
                	</div>
                	@endforeach
                </div>

                <div class="col-lg-12">
                    {{$documents->onEachSide(1)->links()}}
                </div>
            </div>




          </div>
        </div>
      </div>
    </div>
  </div>



@endsection





@section('footer')

@endsection