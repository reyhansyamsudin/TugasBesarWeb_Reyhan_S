@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Banks</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Banks</h1>
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
                         <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddBanks">
                          Add Banks
                        </button></p>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Name Of Bank</th>
                                        <th >Account Number</th>
                                        <th >In The Name </th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($banks as $Bank)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$Bank->name_bank}}</td>
                                    <td>{{$Bank->no_rek}}</td>
                                    <td>{{$Bank->an}}</td>
                                    <td>
                                                    <button 
                                                        class="btn btn-info btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#EditBank-{{$Bank->id}}">
                                                    Edit
                                                    </button>
                                                    <button 
                                                        class="btn btn-danger btn-sm" 
                                                        data-toggle="modal"
                                                        data-target="#DeleteBank-{{$Bank->id}}">
                                                    Delete
                                                    </button>
                                    </td>
                                </tr>
                                @php $no++; @endphp
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.panel-->
    </div>  <!--/.main-->

     <!-- The Modal -->
  <div class="modal" id="AddBanks">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Bank</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('bank_add')}}" method="POST">
                @csrf
        <div class="form-group">
            <label>Bank Name</label>
            <input class="form-control" name="name_bank" placeholder="Bank Name">
        </div>
        <div class="form-group">
            <label>Account Number</label>
            <input class="form-control" name="no_rek" placeholder="Account Number">
        </div>
        <div class="form-group">
            <label>In The Name</label>
            <input class="form-control" name="an" placeholder="In The Name">
        </div>
    
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

   @foreach($banks as $vd)
   <div class="modal" id="EditBank-{{$vd->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Bank</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('bank_update/'.$vd->id)}}" method="POST">
                @csrf
        <div class="form-group">
            <label>Bank Name</label>
            <input class="form-control" value="{{$vd->name_bank}}"
            name="name_bank" placeholder="Bank Name">
        </div>
         <div class="form-group">
            <label>Account Number</label>
            <input class="form-control" name="no_rek" value="{{$vd->no_rek}}" placeholder="Account Number">
        </div>
        <div class="form-group">
            <label>In The Name</label>
            <input class="form-control" name="an" value="{{$vd->an}}" placeholder="In The Name">
        </div>
    
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="submit" class="btn btn-info">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>

     <div class="modal" id="DeleteBank-{{$vd->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Bank</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to this data! this action cannot be canceled</h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <a href="{{url('Bank_delete/'.$vd->id)}}" class="btn btn-info">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   @endforeach
@endsection
