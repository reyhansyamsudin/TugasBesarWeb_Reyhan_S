<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Car - Login</title>
    <link href="{{url('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('dashboard/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('dashboard/css/styles.css')}}" rel="stylesheet">
<script src="https://use.fontawesome.com/f2fc9ac3b2.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                 @if($message=Session::get('success'))
                <div class="alert bg-teal" role="alert">
                    <em class="fa fa-lg fa-check">&nbsp;</em> 
                   {{$message}}
                </div>
                @endif
                @php $modelT = new App\Models\User(); @endphp
                @php $check = $modelT->get_contact(); @endphp
                @php $fix = str_split($check); 
                     unset($fix[0]);
                     $fix1=implode("",$fix);
                     $fix2 = '62'.$fix1;
                @endphp
                <div class="panel-body">
                    <form role="form" method="POST" action="{{route('login')}}">
                         @csrf
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" required placeholder="E-mail" name="email" type="email" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required placeholder="Password" name="password" type="password" value="">
                            </div>
                            If forgot the password , you can contact administator by click this con wahtsapp &nbsp;
                            <a target="_blank" href="https://wa.me/{{$fix2}}"> <i style="cursor: pointer;" class="fa fa-whatsapp"></i></a>
                            <p align="right">
                            <br>
                            <button  type="submit" class="btn btn-primary">Login</button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddCustomer">
                        Register
                        </button>
                         <a href="{{url('homepage')}}" class="btn btn-warning" >
                        Back To Home
                        </a>
                        </p>
                            </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->    
         <!-- The Modal -->
  <div class="modal" id="AddCustomer">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Register</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('register_customer')}}" method="POST">
                @csrf
       <div class="form-group">
            <label>Name Of User</label>
            <input class="form-control" 
            name="name" placeholder="Name Of User">
        </div>

         <div class="form-group">
            <label>Email Of User</label>
            <input class="form-control" 
            name="email" placeholder="Email Of User">
        </div>

         <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control see_create" 
            name="password" value="" placeholder="Password Of User">
        </div>
    
         <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" 
            name="phone_number" placeholder="Phone Of User">
        </div>

         <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" 
            name="address" placeholder="Address Of User">
                
            </textarea>
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="submit" class="btn btn-info">Registrasi</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    <script src="{{url('dashboard/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{url('dashboard/js/bootstrap.min.js')}}"></script>
</body>
</html>
