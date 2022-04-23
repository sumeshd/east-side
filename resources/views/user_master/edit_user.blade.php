@extends('customer.index_customer')

@section('content')

<h2> <span>Edit User  </span>
 <a href="{{ route('User.index') }}" class="combtnDiv"> Back User List </a>
</h2>



<form class="row g-5 " action="{{ url('/user/'.$user->id ) }}" method="">
    @csrf
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">User Name</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Emter User Name" id="usr" name="name" value="{{ $user->name }}">
                                    <div id="color_red"> @error('name')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Email Address</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Email Address" id="usr" name="email" value="{{ $user->email }}">
                                    <div id="color_red"> @error('email')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="role_id" value=0>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Select Role</label>
                                <div class="form-group">
                                    <select name="role_id" class="form-control">
                                        <option value=""> --Select Role-- </option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"{{ $role->id == $user->role_id ? 'selected' : ''}}>{{ $role->name }} </option>
                                        @endforeach
                                    </select>                          
                                    <div id="color_red"> @error('role_id')<li>{{ $message }}</li>@enderror</div>                                            
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
</form>







@endsection





@section('footer')


@endsection