@extends('project.index_projectsettings')

@section('content')

<div class="main-panel">
    <div class="dashboard-bodypart">
      <div class="dashboard-bodypart-in">
        <h1> Project  <span> <i class="fa fa-file-text"></i> </span> <small>Projact - Details </small> </h1>
        <div class="card">
          <div class="card-body">




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
                    <th> Team </th>
                    <th> Customer</th>
                
                  </tr>
                </thead>
                
                <tbody>
                 
                  <tr>
                    <td class="py-1"><img src="{{url('assets/images/round-img.jpg') }}" alt="img"> <span>{{ $project-> project_type }} </span></td>
                    <td> {{ $project->name }} </td>
                    <td>  {{ $project->projectnumber }}</td>
                    <td>  {{ $project->projectname }}</td>
                    <td> {{ $project->address_1 }}{{ $project->address_2 }}{{ $project->address_3 }}</td>
                    <td>  @foreach($project->getTeam as $team)
                            {{ $team->name }}
                          @endforeach</td>
                    <td>  {{ $project->getCustomers }}      </td>
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


            </div>





          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


@section('footer')
<script type="text/javascript">
</script>
@endsection
