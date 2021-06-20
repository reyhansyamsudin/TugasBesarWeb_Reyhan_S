@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Transactions</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Transactions</h1>
            </div>
        </div><!--/.row-->

        @if($message=Session::get('success'))
        <div class="alert bg-teal" role="alert">
            <em class="fa fa-lg fa-check">&nbsp;</em> 
           {{$message}}
        </div>
        @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th>Code Transaction</th>
                                        <th>Name Of Customers</th>
                                        <th>Name Of Car</th>
                                        <th>Day Price</th>
                                        <th>Fine</th>
                                        <th>Amount</th>
                                        <th>Destination</th>
                                        <th>Order date</th>
                                        <th>Lease date</th>
                                        <th>Return date</th>
                                        <th>Status Car</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @php $modelT = new App\Models\Transaction(); @endphp
                                @foreach($transactions as $car)
                                 @php $check = $modelT->rangeDay($now,$car->return_date); @endphp
                                 @php $fine = $modelT->fineCheck($car->return_date,$now,$car->car->id); @endphp
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$car->code_transaction}}</td>
                                    <td>{{$car->user->name}}</td>
                                    <td>{{$car->car->name_car}}</td>
                                    <td>{{number_format($car->car->day_price)}}</td>
                                    <td>{{number_format($car->car->fine)}}</td>
                                    <td>{{number_format($car->amount)}}</td>
                                    <td>{{$car->where_go}}</td>
                                    <td>{{$car->transaction_date}}</td>
                                    <td>{{$car->lease_date}}</td>
                                    <td>{{$car->return_date}}</td>
                                    <td>
                                      @if($car->status_car=='leased' && $car->return_date > $now)
                                      Is being leased {{$check}} day Remaining...
                                      @endif
                                      @if($car->status_car=='leased' && $car->return_date == $now)
                                      Back Today !
                                      @endif
                                      @if($car->status_car=='leased' && $now > $car->return_date)
                                      Late , <span style="color: red">Fine : {{$fine}}</span>
                                      @endif
                                      @if($car->status_car=='done')
                                      Done
                                      @endif

                                    </td>
                                    <td>
                                      @if($car->status_car=='leased')
                                     <a title="View" class="btn btn-info btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#leased-{{$car->id}}">
                                                    <i class="fa fa-eye"></i>
                                                    </a>
                                      @else
                                      <i class="fa fa-check"></i>
                                      @endif     
                                    </td>
                                </tr>
                                @php $no++; @endphp

                                <div class="modal" id="leased-{{$car->id}}">
                                  <div class="modal-dialog ">
                                    <div class="modal-content">
                                    <div class="modal-footer">
                                        <a onclick="return confirm('are you sure to update this transaction')" class="btn btn-success" href="{{url('transaction_car/'.$car->id)}}">Yes</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Status Car Transaction</h4>
                                      </div>   
                                       <div class="modal-body">
                                        <p>has the car been returned?</p>
                                      </div>
                                      <!-- Modal footer -->
                                    </div>
                                  </div>
                                </div>

                                @endforeach
                                </tbody>
                                </table>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.panel-->
    </div>  <!--/.main-->
@endsection
