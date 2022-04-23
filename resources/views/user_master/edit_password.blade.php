
@extends('customer.index_customer')

@section('content')

<form class="row g-5 " action="" method="POST">
    @csrf
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-8">
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
                                <label for="usr">Password</label>
                                <div class="form-group">                          
                                    <input type="password" class="form-control color_black" placeholder="Enter Password" id="usr" name="password" >
                                    <div id="color_red"> @error('password')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Confirm Password</label>
                                <div class="form-group">                          
                                    <input type="password" class="form-control color_black" placeholder="Confirm Password" id="usr" name="password_confirmation" value="">
                                                                                
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