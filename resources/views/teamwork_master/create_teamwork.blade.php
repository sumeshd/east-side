@extends('customer.index_customer')
@section('content')

<div class="main-panel">
    <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
            <h1> Team <span> <i class="fa fa-users"></i> </span> <small> Team - Create </small> </h1>
            <div class="card">
                <div class="card-body">


<h2> <span>Create A New Team  </span>
 <a href="{{route('teams.index')}}" class="combtnDiv"> Back Team List </a>
</h2>



    <div class="p-4 bg-white rounded-lg shadow-md">
        <form class="form-horizontal" method="post" action="{{route('teams.store')}}">
            @csrf


            <div class="table-responsive">
                <div class="customDiv">
                    <div class="row">

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="usr">Team Name</label>
                                    <div class="form-group">                          
                                        <input type="text" class="form-control color_black" placeholder="Team Name" id="usr" name="name" value="{{ old('name') }}" required>
                                        <div id="color_red"> @error('name')<li>{{ $message }}</li>@enderror</div>                                            
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <input list="magicHouses" class="form-control" id="myHouse" name="project_id" placeholder="-- Choose Project --" />
                                        <datalist id="magicHouses">
                                            @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{$project->name}} </option>
                                            @endforeach
                                        </datalist>
                                        <div id="color_red"> @error('project')<li>{{ $message }}</li>@enderror</div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="full">                
                    <button type="submit" class="savDiv">Save</button>
                    <a href="#" class="candiv"> Cancel </a>
                            
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