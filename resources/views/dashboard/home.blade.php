@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                            <div class="large">{{$order}}</div>
                            <div class="text-muted">Total Orders</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-red"></em>
                            <div class="large">{{$transaction}}</div>
                            <div class="text-muted">Total Transaction</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                            <div class="large">{{$customer}}</div>
                            <div class="text-muted">Total Customer</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="row no-padding"><em class="fa fa-xl fa-users"></em>
                            <div class="large">{{$admin}}</div>
                            <div class="text-muted">Total Admin</div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>
        
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Vendor Cars</h4>
                        <div class="easypiechart" id="easypiechart-blue" data-percent="{{$vendor}}" >
                            <span class="percent">{{$vendor}}</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Cars</h4>
                        <div class="easypiechart" id="easypiechart-orange" data-percent="{{$car}}" >
                            <span class="percent">{{$car}}</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Leased Cars</h4>
                        <div class="easypiechart" id="easypiechart-teal" data-percent="{{$leased}}" ><span class="percent">{{$leased}}</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Return Cars</h4>
                        <div class="easypiechart" id="easypiechart-red" data-percent="{{$return_car}}" >
                            <span class="percent">{{$return_car}}</span></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@endsection
