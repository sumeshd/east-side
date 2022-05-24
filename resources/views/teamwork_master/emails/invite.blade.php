
@extends('customer.index_customer')

@section('content')
You have been invited to join team {{ $team->name }}.<br>
Click here to join: <a href="{{ route('teams.accept_invite', $invite->accept_token) }}">{{ route('teams.accept_invite', $invite->accept_token) }}</a>


@endsection


@section('footer')


@endsection