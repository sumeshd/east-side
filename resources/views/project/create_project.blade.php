@extends('project.index_project')

@section('content')


<h2> <span> Add New Project</span> <a href="{{ route('Project.index') }}" class="combtnDiv"> Back Project List </a> </h2>



<!-- <div class="row">
    <div class="col-lg-12">
        @if ( $errors -> any() )
        <div class="alert alert-danger" role="alert">
           There Were Some Problem With Your Input.<br><br>
           <ul> @foreach ( $errors -> all() as $error )
               <li> {{ $error }} </li>
               @endforeach
           </ul>
        </div>
        @endif
    </div>
</div> -->





<form class="row g-5 " action="{{ route('Project.store') }}" method="POST">
    @csrf
        <!-- <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Project Name</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" >
                                                                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Status</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Status" id="usr" name="status">
                                    <div id="color_red"> @error('status')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Budject</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Budject" id="usr" name="budject">
                                    <div id="color_red"> @error('budject')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Team Name</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Team Name" id="usr" name="team">
                                    <div id="color_red"> @error('team')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                    </div>

                
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Complecation</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Complecation" id="usr" name="complecation">
                                    <div id="color_red"> @error('complecation')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Image</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="image">
                                    <div id="color_red"> @error('image')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>               
                    </div>

                </div>
            </div>
 
        </div> -->
<!--------------------------------------------------------------------->

        <div class="main_project">          
            <div class="row">
                <!-- <div class="col-md-4"> 
                    <div class="projectDiv_lft">
                        <h3> Project </h3>
                        <ul>
                            <li> Post Sales E </li>
                            <li> Post Sales D </li>
                            <li> Post Sales F </li>
                            <li> Post Sales G </li>
                            <li> Post Sales H </li>
                            <li> Post Sales J </li>
                    </ul>
                    </div>
                </div> -->
                <div class="col-md-12"> 
                    <div class="projectDiv_lft">
                        <!-- <h3> Add Project </h3>  -->
                        <div class="new-form-check">
                            <label> Type of Project</label>
                            <div class="form-group2">
                                <input type="checkbox" id="html" name="project_type[]" value="Residential">
                                <label for="html">Residential</label>
                            </div>
            
                            <div class="form-group2">
                                <input type="checkbox" id="css" name="project_type[]" value="Commercial">
                                <label for="css">Commercial</label>
                            </div>
            
                            <div class="form-group2">
                                <input type="checkbox" id="javascript" name="project_type[]" value="Furniture">
                                <label for="javascript">Furniture</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv1" placeholder="Name" id="usr" name="name" value="{{old('name')}}">
                            <div id="color_red"> @error('name')<li>{{ $message }}</li>@enderror</div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv1" placeholder="Project Name" id="usr" name="projectname">
                            <div id="color_red"> @error('projectname')<li>{{ $message }}</li>@enderror</div>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control userDiv2" placeholder="Project Number" id="usr" name="projectnumber">
                            <div id="color_red"> @error('projectnumber')<li>{{ $message }}</li>@enderror</div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 01" id="usr" name="address_1">
                            <div id="color_red"> @error('address_1')<li>{{ $message }}</li>@enderror</div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 02" id="usr" name="address_2">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 03" id="usr" name="address_3">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv4" placeholder="Pin" id="usr" name="pin">
                            <div id="color_red"> @error('pin')<li>{{ $message }}</li>@enderror</div>
                        </div>
                        <div class="form-group">
                            <input list="magicHouses" class="form-control" id="myHouse" name="customer" placeholder="-- Choose Customer --" />
                            <datalist id="magicHouses">
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{$customer->customer_first_name}} {{$customer->customer_last_name}}</option>
                                @endforeach
                            </datalist>
                            <div id="color_red"> @error('customer_id')<li>{{ $message }}</li>@enderror</div>
                        </div>


                        <!-- <a href="#" class="submitbtn"> Submit </a> -->
                        <div class="full">                
                            <button type="submit" class="savDiv">Save</button>
                            <!-- <a href="#" class="candiv"> Cancel </a> -->
                                    
                        </div>
                    </div> 
                </div>
            </div>
        </div>

    </form>



@endsection





@section('footer')

<script type="text/javascript">
   
</script>

@endsection


