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
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Permission</label>
                                <div class="form-group">                          
                                @foreach($permission as $value)
                                    
                                @endforeach
                                    <div id="color_red"> @error('permission')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                            <h2 class="center"><span>Permissions</span></h2>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="usr">Role</label>
                                <ul>
                                @php $role = 1;  @endphp
                                @foreach($permission as $value)
                                    @if( $role < 5 )
                                        <li><label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label></li>
                                    @endif
                                    @php $role ++ @endphp
                                @endforeach
                                </ul>
                            </div>

                            <div class="col-md-3">
                                <label for="usr">User</label>
                                <ul>
                                @php $user = 1;  @endphp
                                @foreach($permission as $value)
                                    @if( $user > 4 &&  $user < 9 ) 
                                        <li> <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label></li>
                                    @endif
                                    @php $user ++ @endphp
                                @endforeach
                                </ul>
                            </div>

                            <div class="col-md-3">
                                <label for="usr">Project</label>
                                <ul>
                                @php $project = 1;  @endphp
                                @foreach($permission as $value)
                                    @if( $project > 8 && $project < 13 )
                                            <li><label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label></li> 
                                    @endif
                                    @php $project ++ @endphp
                                @endforeach
                                </ul>
                            </div>

                            <div class="col-md-3">
                                <label for="usr">Customer</label>
                                <ul>
                                @php $customer = 1;  @endphp
                                @foreach($permission as $value)
                                    @if( $customer > 12 )
                                        <li> <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label></li>
                                        
                                    @endif
                                    @php $customer ++ @endphp
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            
                <div id="no-more-tables">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>Role</th>
                            <th>User</th>
                            <th>Project</th>
                            <th>Customer</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                                <td>
                                    <ul>
                                    @php $role = 1;  @endphp
                                    @foreach($permission as $value)
                                        @if( $role < 5 )
                                            <li>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ $value->name }}</li><br>
                                        @endif
                                        @php $role ++ @endphp
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                    @php $user = 1;  @endphp
                                    @foreach($permission as $value)
                                        @if( $user > 4 &&  $user < 9 ) 
                                            <li>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ $value->name }}</li><br>
                                        @endif
                                        @php $user ++ @endphp
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                    @php $project = 1;  @endphp
                                    @foreach($permission as $value)
                                        @if( $project > 8 && $project < 13 )
                                                <li>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</li><br> 
                                        @endif
                                        @php $project ++ @endphp
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                    @php $customer = 1;  @endphp
                                    @foreach($permission as $value)
                                        @if( $customer > 12 )
                                            <li>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</li><br>
                                            
                                        @endif
                                        @php $customer ++ @endphp
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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