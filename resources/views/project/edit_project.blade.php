@extends('project.index_project')

@section('content')


<h2> <span> Edit Project</span> <a href="{{ route('Project.index') }}" class="combtnDiv"> Back Project List </a> </h2>



<!-- <div class="row">
    @if ( $errors -> any() )
    <div class="alert alert-danger" role="alert">
       There Were Some Problem With Your Input.<br><br>
       <ul> @foreach ( $errors -> all() as $error )
           <li> {{ $error }} </li>
           @endforeach
       </ul>
    </div>
    @endif
</div> -->


    
    
    

@foreach($projects as $data)
@php $type = explode(",", $data['project_type'] ); @endphp
@php $settings_name = explode(",", $data['settings_name'] ); @endphp
<form class="row g-5 " action="{{ url('updete_project/'.$data['id']) }}" >
    @method('PATCH') 
    @csrf
        
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
                            <label> Type of Project </label>
                            <div class="form-group2">
                                <input type="checkbox" id="html" name="project_type[]" value="Residential" {{ in_array('Residential',$type )? 'checked' : '' }}>
                                <label for="html">Residential</label>
                            </div>
            
                            <div class="form-group2">
                                <input type="checkbox" id="css" name="project_type[]" value="Commercial" {{ in_array('Commercial',$type )? 'checked' : '' }}>
                                <label for="css">Commercial</label>
                            </div>
            
                            <div class="form-group2">
                                <input type="checkbox" id="javascript" name="project_type[]" value="Furniture" {{ in_array('Furniture',$type )? 'checked' : '' }}>
                                <label for="javascript">Furniture</label>
                            </div>
                        </div>


                        <div class="new-form-check">
                            <label> Project Settings Name</label>
                            <div class="">
                                <input type="checkbox" id="html" name="settings_name[]" value="Presales" {{ in_array('Presales',$settings_name )? 'checked' : '' }}>
                                <label for="html">Presales</label>
                            </div>
            
                            <div class="">
                                <input type="checkbox" id="css" name="settings_name[]" value="Postsales" {{ in_array('Postsales',$settings_name )? 'checked' : '' }}>
                                <label for="css">Postsales</label>
                            </div>
            
                            <div class="">
                                <input type="checkbox" id="javascript" name="settings_name[]" value="Execution" {{ in_array('Execution',$settings_name )? 'checked' : '' }}>
                                <label for="javascript">Execution</label>
                            </div>
                        </div>



                        <div class="form-group">
                            <input type="text" class="form-control userDiv1" placeholder="Name" id="usr" name="name" value="{{old('name',$data['name'] )}}">
                            <div id="color_red"> @error('name')<li>{{ $message }}</li>@enderror</div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv1" placeholder="Project Name" id="usr" name="projectname" value="{{ $data['projectname']}}">
                            <div id="color_red"> @error('projectname')<li>{{ $message }}</li>@enderror</div>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control userDiv2" placeholder="Project Number" id="usr" name="projectnumber" value="{{ $data['projectnumber']}}">
                            <div id="color_red"> @error('projectnumber')<li>{{ $message }}</li>@enderror</div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 01" id="usr" name="address_1" value="{{ $data['address_1']}}">
                            <div id="color_red"> @error('address_1')<li>{{ $message }}</li>@enderror</div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 02" id="usr" name="address_2" value="{{ $data['address_2']}}">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv3" placeholder="Address 03" id="usr" name="address_3" value="{{ $data['address_3']}}">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control userDiv4" placeholder="Pin" id="usr" name="pin" value="{{ $data['pin']}}">
                            <div id="color_red"> @error('pin')<li>{{ $message }}</li>@enderror</div>
                        </div>
                        <div class="form-group">
                            <input list="magicHouses" multiple="multiple" class="form-control" id="myHouse" name="customer" placeholder="-- Choose Customer --" />
                            <datalist id="magicHouses">
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{$customer->customer_first_name}} {{$customer->customer_last_name}}</option>
                                @endforeach
                            </datalist>
                            <div id="color_red"> @error('customer')<li>{{ $message }}</li>@enderror</div>
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

@endforeach






@endsection





@section('footer')

<script type="text/javascript">
   
</script>

@endsection



