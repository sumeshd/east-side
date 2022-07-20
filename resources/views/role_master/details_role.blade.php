@extends('customer.index_customer')
@section('content')

<div class="main-panel">
    <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
            <h1> Role <span> <i class="fa fa-registered"></i> </span> <small>Role - Detaisl </small> </h1>
            <div class="card">
                <div class="card-body">

<h2> <span>Edit Role  </span>
 <a href="{{ route('roles.index') }}" class="combtnDiv"> Back Role List </a>
</h2>




        <div class="table-responsive">
            <div id="no-more-tables">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Permission</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                    <td>{{ $role->name }}</td>
                    <td>@if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <li>{{ $v->name }}</li>
                            @endforeach
                        @endif
                    </td>
                    </tr>
                              
                  </tbody>
                  
                </table>
            </div>
          </div>
         


                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')


@endsection