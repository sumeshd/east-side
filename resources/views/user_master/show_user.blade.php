@extends('customer.index_customer')

@section('content')


<h2> <span>All User  </span>
  @can('user-create')
  <a href="{{ route('User.create') }}" class="combtnDiv"> Create User </a>
  @endcan
</h2>


          <div class="row" style="margin-top: 20px;">
            <div class="col-lg-12">
              @if($message = Session::get('success'))
                  <div class="alert alert-success" role="alert">
                      <p>{{ $message }}</p>
                  </div>
              @endif
            </div>
          </div>


            <div class="table-responsive">
              <div id="no-more-tables">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> User Name </th>
                      <th> Email Address </th>
                      <th> Role </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  @foreach($userdata as $user)
                  <tbody>
                    <tr>
                      <td class="py-1"><img src="assets/images/round-img.jpg" alt="img"> <span>{{ $user->name}} </span></td>
                      <td> {{ $user->email }} </td>
                      <td>
                        @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                          @endforeach
                        @endif
                      </td>
                     
                      <td>
                        @can('user-edit')
                        <span> <i class="fa fa-edit"></i> <a href=" user/{{ $user->id }}/edit"> Edit </a> </span>
                        @endcan
                        @can('user-delete')
                        <span>  {!! Form::open(['method' => 'DELETE','route' => ['User.destroy', $user->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                        </span>
                        @endcan
                      </td>
                    </tr>        
                  </tbody>
                  @endforeach
                </table>
                
              </div>
              <div class="col-lg-12">
                      {{$userdata->onEachSide(1)->links()}}
              </div>
            </div>









@endsection


@section('footer')


@endsection