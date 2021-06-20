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
                <a href="{{url('hompage')}}">CARENTAL</a>
              </div>
            </div>

            <div class="col-9  text-right">
              <span class="d-inline-block d-lg-none"><a href="" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

             <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  @guest
                  <li ><a href="{{url('homepage')}}" class="nav-link">Home</a></li>
                  <li><a href="{{url('login')}}" class="nav-link">Login</a></li>
                  @endauth
                  @auth
                  <li><a href="{{url('transaction_order/'.Auth::user()->id)}}" class="nav-link">My Orders</a></li>
                  <li>
                     <a style="cursor: pointer;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                     <form id="logout-form" action="{{ url('log_out_customer') }}"
                      method="POST" style="display: none;">@csrf </form>
                  </li>
                  <li><a href="#" class="nav-link">Hallo {{Auth::user()->name}}</a></li>
                  @endauth
                </ul>
              </nav>
            </div>
          </div>
        </div>

      </header>


        
    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url({{url('web/images/hero_1.jpg')}}">
        <div class="container">
          <div class="row align-items-center">
          </div>
        </div>
      </div>
    </div>
      <div class="site-section bg-light">
      <div class="container">
        <form action="{{url('car_search')}}" method="POST">
           @csrf
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search name of vendor or car!" aria-label="Recipient's username" aria-describedby="basic-addon2" name="search">
        <div class="input-group-append">
          <button class="input-group-text btn-info" id="basic-addon2"><i class="fa fa-search"></i></button>
        </div>
      </div>
</form>
        <br>
        <div class="row">
          @php $modelT = new App\Models\Transaction(); @endphp
          @foreach($cars as $car)
          @php $check = $modelT->checkRental($car->id); @endphp
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="item-1">
                <a href=""><img src="{{$car->img_car}}" alt="Image" class="img-fluid img-thumbnail"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="">{{$car->name_car}}</a></h3>
                  <div class="rent-price"><span>{{number_format($car->day_price)}}/</span>day</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Doors</span>
                      <span class="spec">{{$car->doors}}</span>
                    </li>
                    <li>
                      <span>Seats</span>
                      <span class="spec">{{$car->seats}}</span>
                    </li>
                    <li>
                      <span>Transmission</span>
                      <span class="spec">{{$car->type_car}}</span>
                    </li>
                    <li>Vendor</span>
                      <span class="spec">{{$car->name_vendor}}</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                     @if(count($check) > 0)
                     <a href="#" class="btn btn-default">Is being leased</a>
                    @else
                    <a href="{{url('rental_car/'.$car->id)}}" class="btn btn-primary">Rent Now</a>
                    @endif
                  </div>
                </div>
              </div>
          </div>
          @endforeach
          <div class="col-12">
           {{$cars->links()}}
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
  </body>

</html>

