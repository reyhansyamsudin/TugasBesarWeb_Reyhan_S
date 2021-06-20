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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($transactions as $car)
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
                                      @if($car->status_transaction== 'process' && $car->img_transaction==NULL)
                                      <i class="fa fa-file"></i> have not uploaded proof of transfer
                                      @elseif($car->status_transaction== 'process' && $car->img_transaction!=NULL)
                                      <i class="fa fa-clock"></i> Waiting Approval
                                      @elseif($car->status_transaction== 'refuse' && $car->img_transaction!=NULL)
                                      <i class="fa fa-close"></i> Refuse
                                      @elseif($car->status_transaction== 'agree' && $car->img_transaction!=NULL)
                                      <i class="fa fa-check"></i> Agree
                                      @endif

                                    </td>
                                    <td>
                                      @if($car->status_transaction== 'process' && $car->img_transaction==NULL)
                                     
                                      @elseif($car->status_transaction== 'process' && $car->img_transaction!=NULL)
                                      <a title="View" class="btn btn-info btn-sm"
                                                    data-toggle="modal" 
                                                    data-target="#waiting-{{$car->id}}">
                                                    <i class="fa fa-eye"></i>
                                                    </a>
                                      @elseif($car->status_transaction== 'refuse' && $car->img_transaction!=NULL)
                                      <a title="View" class="btn btn-danger btn-sm" data-toggle="modal" 
                                                    data-target="#refuse-{{$car->id}}">
                                                    <i class="fa fa-eye"></i>
                                                    </a>
                                      @elseif($car->status_transaction== 'agree' && $car->img_transaction!=NULL)
                                      <a title="View" class="btn btn-success btn-sm" data-toggle="modal" 
                                                    data-target="#agree-{{$car->id}}">
                                                    <i class="fa fa-eye"></i>
                                                    </a>
                                      @endif     
                                    </td>
                                </tr>
                                @php $no++; @endphp

                                <div class="modal" id="waiting-{{$car->id}}">
                                  <div class="modal-dialog ">
                                    <div class="modal-content">
                                    <div class="modal-footer">
                                        <a onclick="return confirm('are you sure approve this transaction')" class="btn btn-success" href="{{url('transaction_action/'.$car->id.'/'.'agree')}}">Approve</a>
                                        <a onclick="return confirm('are you sure refuse this transaction')" class="btn btn-warning"href="{{url('transaction_action/'.$car->id.'/'.'refuse')}}">Refuse</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Proof Of Transaction adn Identity Card</h4>
                                      </div>   
                                       <div class="modal-body">
                                        <img src="{{$car->img_transaction}}" style="width: 100%">
                                        <br>
                                         <img src="{{$car->img_ktp}}" style="width: 100%">
                                      </div>
                                      <!-- Modal footer -->
                                    </div>
                                  </div>
                                </div>

                                 <div class="modal" id="agree-{{$car->id}}">
                                  <div class="modal-dialog ">
                                    <div class="modal-content">
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Status Transaction</h4>
                                      </div>   
                                       <div class="modal-body">
                                       <p>This transaction have been approved at {{$car->updated_at}}</p>
                                      </div>
                                       <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                      <!-- Modal footer -->
                                    </div>
                                  </div>
                                </div>

                                 <div class="modal" id="refuse-{{$car->id}}">
                                  <div class="modal-dialog ">
                                    <div class="modal-content">
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Status Transaction</h4>
                                      </div>   
                                       <div class="modal-body">
                                       <p>This transaction have been refused at {{$car->updated_at}}</p>
                                      </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
