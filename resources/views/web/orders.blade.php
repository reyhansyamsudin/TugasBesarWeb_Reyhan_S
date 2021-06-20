<!doctype html>
<html lang="en">

  <head>
    <title>CARENTAL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('web/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{url('web/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('web/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{url('web/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{url('web/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('web/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('web/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('web/css/aos.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{url('web/css/style.css')}}">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="{{url('hompage')}}" style="color: black">CARENTAL</a>
              </div>
            </div>

            <div class="col-9  text-right">
              <span class="d-inline-block d-lg-none"><a href="" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
            </div>
          </div>
        </div>

      </header>

        <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          @php $modelT = new App\Models\User(); @endphp
                @php $check = $modelT->get_contact(); @endphp
                @php $fix = str_split($check); 
                     unset($fix[0]);
                     $fix1=implode("",$fix);
                     $fix2 = '62'.$fix1;
                @endphp
        <div class="col-7 text-center mb-5">
          <h2>Your Order Rental Car</h2>
          <p>This is the data table for your car rental order, pay attention to the status of the transaction, if you have just made a new rental request, please upload the proof of transfer first, and if you feel that you have paid and uploaded but there is no further action from us, please contact us via whatsapp by using this icon
             <a target="_blank" href="https://wa.me/{{$fix2}}"> <i style="cursor: pointer;" class="fa fa-whatsapp"></i></a>
          </p>
        </div>
        <div class="col-md-6" align="center">
                  <a href="{{url('homepage')}}" class="btn btn-block btn-success text-white">Back To Home</a>
                </div>
                <br>
      </div>
          <div class="col-lg-12" >
                <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th>Code Transaction</th>
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
                                @foreach($data as $car)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$car->code_transaction}}</td>
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
                                      <a title="Upload" class="btn btn-info btn-sm"
                                                         data-toggle="modal" 
                                                        data-target="#upload-{{$car->id}}">
                                                    <i class="fa fa-upload"></i>
                                                    </a>
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
                                       <a title=" Download Invoice" target="_blank" 
                                       href="{{url('transaction_print_invoice/'.$car->id)}}"
                                        class="btn btn-success btn-sm">
                                                   <i class="fa fa-file"></i>
                                                    </a>
                                      @endif     
                                    </td>
                                </tr>
                                @php $no++; @endphp
                                             <!-- The Modal -->
                                <div class="modal" id="upload-{{$car->id}}">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Upload proof of transaction</h4>
                                      </div>
                                      
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                          <form role="form" action="{{url('transaction_upload/'.$car->id)}}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                     <div class="form-group">
                                          <label>File image transaction</label>
                                          <input class="form-control" 
                                          name="img_transaction" type="file">
                                      </div>
                                       <div class="form-group">
                                          <label>List Of Account Number</label>
                                          @foreach($banks as $b)
                                          <p>Bank : {{$b->name_bank}}</p>
                                          <p>Number : {{$b->no_rek}}</p>
                                          <p>Name Of : {{$b->an}}</p>
                                          @endforeach
                                      </div>
                                      </div>
                                      
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                       <button type="submit" class="btn btn-info">Upload</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal" id="waiting-{{$car->id}}">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Your transaction under wainting approval by adminstrator</h4>
                                      </div>   
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                     
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal" id="refuse-{{$car->id}}">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Your transaction was refuse by administartor please check your data trasaction!</h4>
                                      </div>   
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                     
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal" id="agree-{{$car->id}}">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Your transaction has been approved by administartor, you can take the car beside lease date now !</h4>
                                      </div>   
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                     
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
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

    <footer class="site-footer">
      <div class="container">
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="" target="_blank" >CARENTAL</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>
    </div>



    <script src="{{url('web/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('web/js/popper.min.js')}}"></script>
    <script src="{{url('web/js/bootstrap.min.js')}}"></script>
    <script src="{{url('web/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('web/js/jquery.sticky.js')}}"></script>
    <script src="{{url('web/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('web/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{url('web/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{url('web/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{url('web/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('web/js/aos.js')}}"></script>

    <script src="{{url('web/js/main.js"></script>
  <script src="https://use.fontawesome.com/f2fc9ac3b2.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js "></script>
        <script type="text/javascript">
          $(document).ready(function() {
    $('#tableok').DataTable();
} );
        </script>
  </body>

</html>

