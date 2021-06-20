<!DOCTYPE html>
<html>
<head>
	<title>Transaction Report Data</title>
</head>
<body>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #269abc;
  color: white;
}
</style>
	<center>
		<h5>Report Data Lease date : {{$lease}} , Return : {{$return}}</h4>
		</center>
		<table id="customers" class='table table-bordered' style="width: 100%">
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
                                </tr>
                                @php $no++; @endphp
                                 @endforeach
			</tbody>
			</table>
			<p align="left"> Data From {{url('/')}}</p>
			<p align="left"> Generate at {{$now}}</p>
		</body>
		</html>