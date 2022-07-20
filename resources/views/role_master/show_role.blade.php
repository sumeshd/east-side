@extends('customer.index_customer')
@section('content')

<div class="main-panel">
    <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
            <h1> Role <span> <i class="fa fa-registered"></i> </span> <small>Role - List </small> </h1>
            <div class="card">
                <div class="card-body">

                    <h2> <span>All Roles </span>
                     <a href="{{ route('roles.create') }}" class="combtnDiv"> Create Role </a>
                    </h2>


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif



        <div class="table-responsive">
            <div id="no-more-tables">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                  @foreach ($roles as $key => $role)
                  <tbody>
                    <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                    </tr>
                              
                  </tbody>
                  @endforeach
                </table>
            </div>
          </div>
          {!! $roles->render() !!}


                </div>
            </div>
        </div>
    </div>
</div>













@endsection


@section('footer')


@endsection