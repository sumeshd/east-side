@extends('customer.index_customer')

@section('content')

<div class="main-panel">
      <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
          <h1> Customer <span> <i class="fa fa-address-card-o"></i> </span> <small> Customer - View </small> </h1>
          <div class="card">
            <div class="card-body">


            <h2> <span> Customer List </span>
            @can('customer-create')
             <a href="{{ route('Customer.create') }}" class="combtnDiv"> Add Customer </a>
            @endcan
            </h2>
            
            
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
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> Customer </th>
                      <th> Address </th>
                      <th> Phone Number </th>
                      <th> Email </th>
                      <th> Project </th>
                      <th>  </th>
                      <th> </th>
                    </tr>
                  </thead>

                  @foreach( $customerdata as $cus)
                  <tbody>
                    <tr>
                      <td class="py-1"><img src="assets/images/round-img.jpg" alt="img"> <span>{{ $cus->customer_first_name}} </span></td>
                      <td> {{ $cus->billing_address_street_1 }} <br> Town School  </td>
                      <td> {{ $cus->customer_phone }} </td>
                      <td> {{ $cus->customer_email }} </td>
                      <td> {{ !empty($cus->projects)? $cus->projects->name : "" }} </td>
                      <td><div class="percent"> 20%
                          <div class="progressDiv"></div>
                        </div></td>
                      <td>
                        <span> <i class="fa fa-gear"></i> <a href="#"> Settings </a> </span>
                        @can('customer-list')
                        <span> <i class="fa fa-eye"></i> <a href="{{ url('customer_show/'.$cus->id) }}"> View </a> </span>
                        @endcan
                      </td>
                    </tr>          
                  </tbody>
                  @endforeach
                </table>


                <div class="col-lg-12">
                    {{$customerdata->onEachSide(1)->links()}}
                </div>
          </div>

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection