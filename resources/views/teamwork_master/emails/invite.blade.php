@extends('customer.index_customer')
@section('content')
<div class="main-panel">
    <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
            <h1> Team <span> <i class="fa fa-users"></i> </span> <small> Team - Invite </small> </h1>
            <div class="card">
                <div class="card-body">


				You have been invited to join team {{ $team->name }}.<br>
				Click here to join: <a href="{{ route('teams.accept_invite', $invite->accept_token) }}">{{ route('teams.accept_invite', $invite->accept_token) }}</a>

				</div>
            </div>
        </div>
    </div>
</div>       

@endsection


@section('footer')


@endsection