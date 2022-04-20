@extends('execution.index_execution')

@section('content')






<!-- 
<form class="row g-5 " action="{{ route('Execution.store') }}" method="POST">
    @csrf
        <div class="table-responsive">
            <div class="customDiv">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Checklist</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Project Name" id="usr" name="checklist">
                                    <div id="color_red"> @error('checklist')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Status</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Status" id="usr" name="tablist">
                                    <div id="color_red"> @error('tablist')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="usr">Enter Budject</label>
                                <div class="form-group">                          
                                    <input type="text" class="form-control color_black" placeholder="Enter Budject" id="usr" name="tasklist">
                                    <div id="color_red"> @error('tasklist')<li>{{ $message }}</li>@enderror</div>                                            
                                </div>
                            </div>
                        </div>
                       
                    </div>

                





                </div>
                

            </div>
            <div class="full">                
                <button type="submit" class="savDiv">Save</button>
                <a href="#" class="candiv"> Cancel </a>
                        
            </div> 
        </div>
</form> -->







<!--------------------------------test------------------- -->




















@endsection


@section('footer')


<script src="{{ url('assets/custom_create_js/execution/execution.js') }}"></script>
<!-- <script type="text/javascript">
   $("execution").submit(function(e){
       e.preventDefault();
       let checklist = $("").val();
       let tablist = $("#tablist").val();
       let tasklist =$("#tasklist").val();
       let _token =$("input[name=_token]").val();
       $.ajax({
           url: "{{ route ('Execution.store') }}",
           type: "POST",
           data:{
            checklist:checklist,
            tablist:tablist,
            tasklist:tasklist,
            _token:_token

           },
           success:function(response)
           {
               if(response)
               {
                   $("#table tbody").prepend('<tr><td>'+response.checklist+'</td><td>'+response.tablist+'</td><td>'+response.tasklist+'</td></tr>');
               }
           }
       });
   });
  
</script> -->
@endsection
