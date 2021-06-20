@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Report</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Get Report Data</h1>
            </div>
        </div><!--/.row-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <p align="center">Set lease date and return date range for get report!</p>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                              <form target="_blank" role="form" action="{{url('transaction_get_report')}}" method="POST">
                                        @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label>Start Lease Date</label>
                                    <input type="date" required class="form-control" name="start_lease_date" value="{{$now}}">
                                </div>
                             <div class="form-group col-md-6">
                                    <label>End Lease Date</label>
                                    <input type="date" required class="form-control" name="end_lease_date" value="{{$now}}">
                                </div>
                            </div>

                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label>Start Retrun Date</label>
                                    <input type="date" required class="form-control" name="start_return_date" value="{{$now}}">
                                </div>
                             <div class="form-group col-md-6">
                                    <label>End Retrun Date</label>
                                    <input type="date" required class="form-control" name="end_return_date" value="{{$now}}">
                                </div>
                            </div>
                            <p align="right">
                                 <button type="submit" name="pdf" value="pdf" class="btn btn-info">Download Pdf <i class="fa fa-download"></i></button>
                                 <button type="submit" name="view" value="view" class="btn btn-success">View Data Report <i class="fa fa-eye"></i></button>

                                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                            </p>
                            </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.panel-->
@endsection
