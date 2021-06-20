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
        <div class="col-7 text-center mb-5">
          <h2>New Order Rental Car</h2>
          <p>Fill this form to order rental car online and following step top steo until finish</p>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form  action="{{url('transaction_add')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <div class="col-md-6">
                  <label>Full Name</label>
                  <input readonly type="text" class="form-control" value="{{Auth::user()->name}}">
                </div>
                 <div class="col-md-6">
                  <label>Email</label>
                  <input readonly type="text" class="form-control" value="{{Auth::user()->email}}">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label>Phone Number</label>
                  <input readonly type="text" class="form-control" value="{{Auth::user()->phone_number}}">
                </div>
                 <div class="col-md-6">
                  <label>Address</label>
                  <input readonly type="text" class="form-control" value="{{Auth::user()->address}}">
                   <input name="car_id" type="hidden" class="form-control" value="{{$cars->id}}">
                </div>
              </div>

             <div class="form-group row">
                <div class="col-md-6">
                  <label>Lease Date</label>
                  <input required type="date" class="form-control" id="date1" name="lease_date">
                </div>
                 <div class="col-md-6">
                  <label>Return Date</label>
                  <input required type="date" class="form-control" id="date2" name="return_date">
                </div>
              </div>

               <div class="form-group row">
                <div class="col-md-6">
                  <label>Where You Go?</label>
                  <input required type="text" class="form-control" placeholder="Where You Go?" name="where_go">
                </div>
                 <div class="col-md-6">
                  <label>Upload Identity Card</label>
                  <input required type="file" class="form-control" name="img_ktp">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <a style="cursor: pointer;" onclick="get_summary()" class="btn btn-block btn-primary text-white">Preview Summary</a>
                </div>
                 <div class="col-md-6">
                  <a href="{{url('homepage')}}" class="btn btn-block btn-success text-white">Back To Home</a>
                </div>
              </div>
            
          </div>
<input type="hidden" id="price_car" value="{{$cars->day_price}}">
          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Car Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Name Of Car | Price | Fine:</span>
                  <span>{{$cars->name_car}} | <small>{{number_format($cars->day_price)}}/Day  | {{number_format($cars->fine)}}/Day if late return car!</small>
                  </span>
                   <span class="d-block text-black">Vendor:</span>
                  <span>{{$cars->vendor->name_vendor}}</span>
                   <span class="d-block text-black">Doors:</span>
                  <span>{{$cars->doors}} Door</span>
                   <span class="d-block text-black">Seats:</span>
                  <span>{{$cars->seats}} Seat</span>
                   <span class="d-block text-black">Image Of Car:</span>
                  <span><img src="{{$cars->img_car}}" height="100px" width="150px"></span>
                </li>
              </ul>
            </div>
          </div>
        </div>

          <div class="col-lg-8 mb-5" id="preview_info" style="display: none">
             <p>Preview Summary Order Car</p>
           <!--  <form action="#" method="post"> -->
              <div class="form-group row">
                <div class="col-md-6">
                  <label>Range Day</label>
                  <input readonly type="text" id="range_day" class="form-control" >
                </div>

                 <div class="col-md-6">
                  <label>Amount</label>
                  <input readonly type="text" id="amount_fix" name="amount" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-block btn-primary text-white">Submit Rental <i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </form>
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
  <script type="text/javascript">
    function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
    function get_summary()
    {
        $('#preview_info').show();
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById("date2").value;
        const diffDays = (date, otherDate) => Math.ceil(Math.abs(date - otherDate) / (1000 * 60 * 60 * 24));
        // Example
        var price = document.getElementById("price_car").value;
        var result = diffDays(new Date(date1), new Date(date2));   // 1839
        $('#range_day').val(result +' '+ 'Days');
        var amount = result * price;
        $('#amount_fix').val(numberWithCommas(amount));
    }
  </script>
  </body>

</html>

