@extends('customer.index_customer')
@section('content')

<div class="main-panel">
    <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
            <h1> Team <span> <i class="fa fa-users"></i> </span> <small> Team - Edit </small> </h1>
            <div class="card">
                <div class="card-body">

                    <h2> <span>Edit Team  </span><span class="italic">{{ $team->name }}</span>
                     <a href="{{route('teams.index')}}" class="combtnDiv"> Back Team List </a>
                    </h2>


                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <form class="form-horizontal" method="post" action="{{route('teams.update', $team)}}">
                            @csrf
                            @method('PUT')

                            <div class="table-responsive">
                                <div class="customDiv">
                                    <div class="row">

                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="usr">Team Name</label>
                                                    <div class="form-group">                          
                                                        <input type="text" class="form-control color_black" placeholder="Team Name" id="usr" name="name" value="{{ old('name', $team->name) }}" required>
                                                        <div id="color_red"> @error('name')<li>{{ $message }}</li>@enderror</div>                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="full">                
                                    <button class="savDiv">Save</button>
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