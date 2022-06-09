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


			<div class="mt-4">
                <div class="card card-body">
                  <h6>Leav A Comment</h6>

                  <form action="{{ url('comment') }}" method="post">
                    @csrf
                    <input type="hidden" name="settings_name" value="{{ $presales->settings_name}}">
                    <input type="hidden" name="settings_id" value="{{ $presales->id }}">
                    <div class="form-group">
                      <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                    </div>
                      <button type="submit" class="btn btn-primary"> Submit</button>
                  </form>

                </div>
            </div>

           @forelse($presales->comments as $comment)


           @empty


           @endforelse



@endsection





@section('footer')

@endsection