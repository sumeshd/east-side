@extends('customer.index_customer')

@section('content')

<h2> <span>Edit User  </span>
 <a href="{{ route('User.index') }}" class="combtnDiv"> Back User List </a>
</h2>



{!! Form::model($user, ['method' => 'PATCH','route' => ['User.update', $user->id]]) !!}
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">User Name</label>
                                <div class="form-group">                          
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    <div id="color_red"> @error('name')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Email Address</label>
                                <div class="form-group">                          
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    <div id="color_red"> @error('email')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Select Role</label>
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}                      
                                    <div id="color_red"> @error('roles')<li>{{ $message }}</li>@enderror</div>                                            
                                
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Password</label>
                                <div class="form-group">                          
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    <div id="color_red"> @error('password')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Confirm Password</label>
                                <div class="form-group">                          
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                                                                
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