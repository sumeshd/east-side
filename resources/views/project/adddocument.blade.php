@extends('project.index_projectsettings')
@section('content')

<div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Project <span> <i class="fa fa-file"></i> </span> <small>Project - Add Documents </small> </h1>
        <div class="card">
          <div class="card-body">





            <div class="boxthree">
                <ul>
                  <li class="active"> <a href="#"> Presales </a> </li>
                  <li> <a href="#"> Postsales </a> </li>
                  <li> <a href="#"> Execution </a> </li>
                </ul>
            </div>


            div class="uplode-imgSec">
              <form method="POST" action="/document/upload" enctype="multipart/form-data">
                @csrf
                <h3> Add New Image </h3>
                <div class="row">
                  <div class="col-md-5">
                      <div class="uplode-imgSec-in">
                        <!--<div class="upDiv">  <input type="file" class="fa fa-upload" name="image[]" multiple > --> <!-- <button type="file"><i class="fa fa-upload"></i> Uplode image</button>  accept="image/*"  </div>-->
                        <div class="upDiv"> <input type="file" class="fa fa-upload" name="document" > </div>                     
                      </div>
                      <div id="color_red"> @error('document')<li>{{ $message }}</li>@enderror</div>
                  </div>
                  <div class="col-md-7">
                      <div class="uplode-imgSec-in">
                        <div class="form-group">
                          <input type="text" class="form-control" name="document_name" placeholder="Add image Name" id="usr">
                          @foreach($settings as $setting)
                            @if($setting['type'] == 'presales')
                            <input type="hidden" name="project_id" value="{{ $setting['project_id'] }}">
                            <input type="hidden" name="type" value="{{ $setting['type'] }}">
                            <input type="hidden" name="project_settings_id" value="{{ $setting['id'] }}">
                            
                            @elseif($setting['type'] == 'postsales')
                            <input type="hidden" name="project_id" value="{{ $setting['project_id'] }}">
                            <input type="hidden" name="type" value="{{ $setting['type'] }}">
                            <input type="hidden" name="project_settings_id" value="{{ $setting['id'] }}">

                            @elseif($setting['type'] == 'execution')
                            <input type="hidden" name="project_id" value="{{ $setting['project_id'] }}">
                            <input type="hidden" name="type" value="{{ $setting['type'] }}">
                            <input type="hidden" name="project_settings_id" value="{{ $setting['id'] }}">
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


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection





@section('footer')

@endsection