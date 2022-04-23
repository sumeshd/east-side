@extends('customer.index_customer')

@section('content')


<h2> <span>All User  </span>
 <a href="{{ route('User.create') }}" class="combtnDiv"> Create User </a>
</h2>


            <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> User Name </th>
                      <th> Email Address </th>
                      <th> Role </th>
                      <th> Permission </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  @foreach($userdata as $user)
                  <tbody>
                    <tr>
                      <td class="py-1"><img src="assets/images/round-img.jpg" alt="img"> <span>{{ $user->name}} </span></td>
                      <td> {{ $user->email }} </td>
                      <td> {{ $user->role->name }} </td>
                      <td> @foreach($user->role->permissions as $permission)
                              <li>{{ $permission -> name }}</li>
                            @endforeach
                      </td>
                      <td>
                        <span> <i class="fa fa-gear"></i> <a href="#"> Settings </a> </span> 
                        <span> <i class="fa fa-eye"></i> <a href=" user/{{ $user->id }}/edit"> Edit </a> </span>
                        <span> <i class="fa fa-edit"></i> <a href="{{ url('changepass/'.$user->id)  }}"> Change Password </a> </span>
                      </td>
                    </tr>
                              
                  </tbody>
                  @endforeach
                </table>









@endsection


@section('footer')


@endsection