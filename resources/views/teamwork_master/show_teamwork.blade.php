@extends('customer.index_customer')
@section('content')

<div class="main-panel">
    <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
            <h1> Team <span> <i class="fa fa-users"></i> </span> <small> Team - View </small> </h1>
            <div class="card">
                <div class="card-body">

                <h2> <span> Team List  </span>
                    <a href="{{ route('teams.create') }}" class="combtnDiv"> New Team </a>
                    <a href="#" class="combtnDiv"> Export Data </a>
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
                        <th> Name </th>
                        <th> Status </th>
                        <th> Project </th>
                        <th> </th>
                        <th width="200px"> Action </th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y">
                        @foreach($teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                                <td>
                                    @if(auth()->user()->isOwnerOfTeam($team))
                                        <span class="">Owner</span>
                                    @else
                                        <span class="text-indigo-700 bg-indigo-200 rounded-xl">Member</span>
                                    @endif
                                </td>
                                <td>
                                        @foreach( $team->getTeamProject as $project)
                                            {{ $project->name }}
                                        @endforeach
                                </td>
                                <td>
                                    @if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey())
                                        <a href="{{ route('teams.switch', $team) }}" class="btn btn-info">
                                            Switch
                                        </a>
                                    @else
                                        <lavel class="btn btn-success">Current team</lavel>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('teams.members.show', $team)}}" class="btn btn-primary">
                                        Members
                                    </a>

                                    @if(auth()->user()->isOwnerOfTeam($team))
                                        
                                        <a href="{{ route('teams.edit', $team) }}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        
                                        <div style="margin-top:10px ;">
                                        <form class="inline-block" action="{{ route('teams.destroy', $team) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                        </div>
                                        
                                    @endif
                                </td>
                            </tr>
                        @endforeach
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