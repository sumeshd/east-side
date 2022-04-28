@extends('customer.index_customer')

@section('content')

<h2> <span>Add Role  </span>
 <a href="{{ route('roles.index') }}" class="combtnDiv"> Back Role List </a>
</h2>




{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Role Name</label>
                                <div class="form-group">                          
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    <div id="color_red"> @error('name')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Permission</label>
                                <div class="form-group">                          
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                @endforeach
                                    <div id="color_red"> @error('permission')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="full">                
                <button type="submit" class="savDiv">Save</button>
                <a href="#" class="candiv"> Cancel </a>
                        
            </div> 

        </div>
        {!! Form::close() !!}






@endsection


@section('footer')


@endsection