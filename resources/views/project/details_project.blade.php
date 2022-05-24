@extends('project.index_project')

@section('content')




<h2> <span> View Project Details </span> <a href="{{ route('Project.index') }}" class="combtnDiv"> Back Project List </a> </h2>

    <div class="table-responsive" id="color_black" >
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> Project Name </th>
                      <th> Project Status </th>
                      <th> Phone Number </th>
                      <th> Email </th>
                      <th> Project </th>
                      <th> </th>                 
                    </tr>
                  </thead>

                  @foreach($projects as $project)
                  <tbody>
                   
                    <tr>
                      <td class="py-1"><img src="{{url('assets/images/round-img.jpg') }}" alt="img"> <span>{{ $project->projectname }} </span></td>
                      <td> {{ $project->status }} </td>
                      <td> {{ $project['budject'] }} </td>
                      <td> {{ $project['team'] }} </td>
                      <td> {{ $project['image'] }}</td>
                      <td> {{ $project['id'] }}</td>
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
                        <td></td>
                    </tr>
                  </tbody>
                  @endforeach
                  
                </table>
              </div>





@endsection


@section('footer')
<script type="text/javascript">
</script>
@endsection
