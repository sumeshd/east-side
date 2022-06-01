@extends('project.index_project')

@section('content')




<h2> <span> View Project Details </span> <a href="{{ route('Project.index') }}" class="combtnDiv"> Back Project List </a> </h2>

            <div class="table-responsive" id="color_black" >
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th> Project Type </th>
                    <th> Name </th>
                    <th> Projectnumber </th>
                    <th> project Name </th>
                    <th> Address </th>
                    <th> </th>                 
                  </tr>
                </thead>
                
                <tbody>
                 
                  <tr>
                    <td class="py-1"><img src="{{url('assets/images/round-img.jpg') }}" alt="img"> <span>{{ $project-> project_type }} </span></td>
                    <td> {{ $project->name }} </td>
                    <td>  {{ $project->projectnumber }}</td>
                    <td>  {{ $project->projectname }}</td>
                    <td> {{ $project->address_1 }}{{ $project->address_2 }}{{ $project->address_3 }}</td>
                    <td> </td>
                  </tr>

                  <tr>
                    @can('project-edit')
                    <td><a class="btn btn-warning btn-lg" href="{{ url('edit_project/'.$project->id) }}"> Edit</a></td>
                    @endcan
                    @can('project-delete')
                    <td><a class="btn btn-danger btn-lg" href="{{ url('delete_project/'.$project->id) }}">Delete</a></td>
                      @endcan
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      
                    </td>
                  </tr>
                </tbody>
                 
              </table>
              <div class="mt-4">
                <div class="card card-body">
                  <h6>Leav A Comment</h6>

                  <form action="{{ url('comment') }}" method="post">
                    @csrf
                    <input type="hidden" name="project_slug" value="{{ $project->slug }}">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                      <textarea name="comment_body" class="form-control userDiv1" rows="6" required></textarea>
                    </div>
                      <button type="submit" class="btn btn-primary"> Submit</button>
                  </form>

                </div>
              </div>
              @forelse($project->comments as $comment)
              <div class="card card-body mt-3" >
                <h6>@if($comment->user)
                  {{ $comment->user->name }}
                  @endif
                  
                <small>comment on : 3-8-2022</small></h6>

                <p class="mb-1">{{ $comment->comment_body }}</p>
                @if(Auth::check() && Auth::id() == $comment->user_id )
                <div>
                  <a href="" class="btn btn-primary btn-sm">Edit</a>
                  <a href="" class="btn btn-danger btn-sm">Delete</a>
                </div>
                @endif
                
              </div>
              @empty
              <h6>no comment yet</h6>
              @endforelse
            </div>







@endsection


@section('footer')
<script type="text/javascript">
</script>
@endsection
