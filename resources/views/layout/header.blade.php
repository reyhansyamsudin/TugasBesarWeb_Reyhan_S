<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental | Admin Dashbaord</title>
    <link href="{{url('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('dashboard/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('dashboard/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('dashboard/css/styles.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Car</span>ental Admin</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    @include('layout.sidebar');
    @yield('content')
    @include('layout.footer');
    </body>
</html>