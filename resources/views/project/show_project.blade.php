@extends('project.index_project')

@section('content')


<h2> <span> Project List </span> 
@can('project-create')
  <a href="{{ route('Project.create') }}" class="combtnDiv"> New Project </a>
@endcan

<a href="#" class="combtnDiv"> Export Data </a> </h2>


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
                        <th> Project </th>
                        <th> Created At </th>
                        <th> Project Type </th>
                        <th> Address</th>
                        <th> Customer </th>
                        <th> Completion </th>
                        <th> </th>
                      </tr>
                    </thead>

                    
                    <tbody>
                    @foreach( $project as $pro)
                      <tr>
                        <td class="py-1"> <span> {{ $pro->projectname }} </span></td>
                        <td>  {{ $pro->created_at }} </td>
                        <td>  
                                {{ $pro->project_type }} 
                             
                        </td>
                        <td>  {{ $pro->address_1 }}{{ $pro->address_2 }}{{ $pro->address_3 }} </td>
                        <td>  @foreach($pro->customers as $customer)
                                <li>{{ $customer->customer_first_name }}</li>
                              @endforeach
                        </td>
                        <td><div class="percent"> 20%
                            <div class="progressDiv"></div>
                          </div></td>
                        <td><span> <i class="fa fa-gear"></i> <a href="#"> Settings </a> </span>
                        @can('project-list')
                         <span> <i class="fa fa-eye"></i> <a href="{{ url('show/'.$pro->id) }}"> View </a> </span>
                        @endcan
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>







@endsection





@section('footer')

<script type="text/javascript">
   
</script>

@endsection