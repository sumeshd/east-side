@extends('settings_master.index_settings')

@section('content')

				  <div class="row" style="margin-top: 20px;">
                  <div class="col-lg-12">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ $message }}</p>

                        </div>
                        @endif
                  </div>
                </div>

              @if( $settings->settings_name == 'presales') 
  			       <div class="mt-4 ">
                <div > <h2 class="center">Presales</h2> </div>
                  <div class="card card-body commentsDiv">
                    <h2>Leav A Comment {{ $settings->presales_name }}</h2>

                    <form action="{{ url('comment') }}" method="post">
                      @csrf
                      <input type="hidden" name="settings_name" value="{{ $settings->settings_name}}">
                      <input type="hidden" name="settings_id" value="{{ $settings->id }}">
                      <div class="form-group">
                        <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                      </div>
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </form>
                  </div>
                </div>

                @forelse($settings->precomments as $comment)
                  <div class="commentsDiv">
                  <div class="row">
                  <div class="col-md-2">
                  <div class="commentsDiv-lft">
                  <span> <img src="assets/images/profile-img1.jpg" alt="img"> </span>
                  <h3> @if($comment->user)
                      {{ $comment->user->name }} 
                      @endif </h3><h4 style="color:black;"><small>comment on : {{ $comment->created_at->format('d-m-y') }}</small></h4>
                  </div>
                  </div>
                       <div class="col-md-10">
                  <div class="commentsDiv-rht">
                  <p> {{ $comment->comment_body }} </p>
                  </div>
                  </div>
                  </div>
                  
                   @if(Auth::check() && Auth::id() == $comment->user_id )
                    <div>
                      <a href="" class="btn btn-primary btn-sm">Edit</a>
                      <a href="{{ url('/comment/'.$comment->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    @endif
                  
                   </div>
                @empty
                <h6>no comment yet</h6>
                @endforelse

              @elseif( $settings->settings_name == 'postsales')
                <div class="mt-4 ">
                  <div > <h2 class="center">Postsales</h2> </div>
                  <div class="card card-body commentsDiv">
                    <h2>Leav A Comment {{ $settings->postsales_name }}</h2>

                    <form action="{{ url('comment') }}" method="post">
                      @csrf
                      <input type="hidden" name="settings_name" value="{{ $settings->settings_name}}">
                      <input type="hidden" name="settings_id" value="{{ $settings->id }}">
                      <div class="form-group">
                        <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                      </div>
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </form>
                  </div>
                </div>

                @forelse($settings->postcomments as $comment)
                  <div class="commentsDiv">
                  <div class="row">
                  <div class="col-md-2">
                  <div class="commentsDiv-lft">
                  <span> <img src="assets/images/profile-img1.jpg" alt="img"> </span>
                  <h3> @if($comment->user)
                      {{ $comment->user->name }} 
                      @endif </h3><h4 style="color:black;"><small>comment on : {{ $comment->created_at->format('d-m-y') }}</small></h4>
                  </div>
                  </div>
                       <div class="col-md-10">
                  <div class="commentsDiv-rht">
                  <p> {{ $comment->comment_body }} </p>
                  </div>
                  </div>
                  </div>
                  
                   @if(Auth::check() && Auth::id() == $comment->user_id )
                    <div>
                      <a href="" class="btn btn-primary btn-sm">Edit</a>
                      <a href="{{ url('/comment/'.$comment->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    @endif
                  
                   </div>
                @empty
                <h6>no comment yet</h6>
                @endforelse
              @else
                <div class="mt-4 ">
                  <div> <h2 class="center"> Execution </h2> </div>
                  <div class="card card-body commentsDiv">
                    <h2>Leav A Comment {{ $settings->execution_name }}</h2>

                    <form action="{{ url('comment') }}" method="post">
                      @csrf
                      <input type="hidden" name="settings_name" value="{{ $settings->settings_name}}">
                      <input type="hidden" name="settings_id" value="{{ $settings->id }}">
                      <div class="form-group">
                        <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                      </div>
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </form>
                  </div>
                </div>

                @forelse($settings->execomments as $comment)
                  <div class="commentsDiv">
                  <div class="row">
                  <div class="col-md-2">
                  <div class="commentsDiv-lft">
                  <span> <img src="assets/images/profile-img1.jpg" alt="img"> </span>
                  <h3> @if($comment->user)
                      {{ $comment->user->name }} 
                      @endif </h3><h4 style="color:black;"><small>comment on : {{ $comment->created_at->format('d-m-y') }}</small></h4>
                  </div>
                  </div>
                       <div class="col-md-10">
                  <div class="commentsDiv-rht">
                  <p> {{ $comment->comment_body }} </p>
                  </div>
                  </div>
                  </div>
                  
                   @if(Auth::check() && Auth::id() == $comment->user_id )
                    <div>
                      <a href="" class="btn btn-primary btn-sm">Edit</a>
                      <a href="{{ url('/comment/'.$comment->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    @endif
                  
                   </div>
                @empty
                <h6>no comment yet</h6>
                @endforelse
              @endif





@endsection





@section('footer')

@endsection