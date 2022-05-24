@extends('customer.index_customer')

@section('content')

    <h2> <span> Member Of Team  </span><span class="tracking-wide">{{ $team->name }}</span> 

        <span><a href="{{ route('teams.index') }}" class="combtnDiv"> Team </a></span>
    </h2>

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-lg-12">
                  @if($message = Session::get('success'))
                      <div class="alert alert-success" role="alert">
                          <p>{{ $message }}</p>

                      </div>
                  @endif
                </div>
            </div>
        </div>

            <div class="table-responsive">
                <div id="no-more-tables">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                        @foreach($team->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if(auth()->user()->isOwnerOfTeam($team))
                                        @if(auth()->user()->getKey() !== $user->getKey())
                                            <form class="inline-block" action="{{ route('teams.members.destroy', [$team, $user]) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
                <form class="row g-5" method="post" action="{{route('teams.adduser', [ $team ] )}}">
                    @csrf

                    <div class="table-responsive">
                        <div class="customDiv">
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="usr">Existing User</label>
                                            <div class="form-group">                          
                                                    <select id="" class="form-control" id="sel1" name="id">
                                                        <option value="null" selected="" disabled=""> -- Select Users -- </option>
                                                        @foreach( $xusers as $xuser )
                                                        <option value="{{ $xuser->id }}">{{ $xuser->name }}</option>
                                                        @endforeach
                                                    </select>
                                                <div id="color_red"> @error('id')<li>{{ $message }}</li>@enderror</div>                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="full">
                            <button type="submit" class="savDiv">Add To Team</button>
                        </div> 
                    </div>
                </form>
            

            @if(auth()->user()->isOwnerOfTeam($team))
            <h2> <span> Pending invitations  </span></h2>
            <div class="table-responsive">
                <div id="no-more-tables">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> E-Mail </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                        @foreach($team->invites as $invite)
                        <tr>
                            <td>{{ $invite->email }}</td>
                            <td>
                            <a href="{{route('teams.members.resend_invite', $invite)}}" class="btn btn-success">
                                Resend invite
                            </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <h2> <span>Invite to team "{{ $team->name }}"</span></h2>
            <div>
                <form class="row g-5" method="post" action="{{route('teams.members.invite', $team)}}">
                    @csrf

                    <div class="table-responsive">
                        <div class="customDiv">
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="usr">Email</label>
                                            <div class="form-group">                          
                                                <input type="text" class="form-control color_black" placeholder="Enter Email" id="usr" name="email" value="{{ old('email') }}" required>
                                                <div id="color_red"> @error('email')<li>{{ $message }}</li>@enderror</div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="full">
                            <button type="submit" class="savDiv">Invite to Team</button>
                        </div> 

                    </div>
                </form>
            </div>
            @endif



            







@endsection


@section('footer')
<script>

</script>

@endsection