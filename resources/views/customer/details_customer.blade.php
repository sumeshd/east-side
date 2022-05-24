@extends('customer.index_customer')

@section('content')


<h2> <span> View Customer Details </span> <a href="{{ route('Customer.index') }}" class="combtnDiv"> Back Customer List </a> </h2>

    <div class="table-responsive" id="color_black" >
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> Customer </th>
                      <th> Address </th>
                      <th> Phone Number </th>
                      <th> Email </th>
                      <th> Project </th>
                      <th> </th>
                     
                    </tr>
                  </thead>

                  @foreach( $data as $data)
                  <tbody>
                    <tr>
                      <td class="py-1"><img src="{{url('assets/images/round-img.jpg') }}" alt="img"> <span>{{ $data->customer_first_name}} </span></td>
                      <td> {{ $data->billing_address_street_1 }} </td>
                      <td> {{ $data->customer_phone }} </td>
                      <td> {{ $data->customer_email }} </td>
                      <td> {{ $data->customer_department }}</td>
                      <td> {{ $data->customer_website }}</td>
                    </tr>
                              
              

                    <tr>
                        @can('customer-edit')
                        <td><a class="btn btn-warning btn-lg" href="{{ url('customer_edit/'.$data->customer_id)  }}"> Edit</a></td>
                        @endcan
                        @can('customer-delete')
                        <td><a class="btn btn-danger btn-lg" href="{{ url('customer_delete/'.$data->customer_id)  }}">Delete</a></td>
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