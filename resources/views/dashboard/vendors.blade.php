@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Vendors</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Vendors</h1>
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
                         <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddVendors">
                          Add Vendors
                        </button></p>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Name Of Vendor</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($vendors as $vendor)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$vendor->name_vendor}}</td>
                                    <td>
                                                    <button 
                                                        class="btn btn-info btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#EditVendor-{{$vendor->id}}">
                                                    Edit
                                                    </button>
                                                    <button 
                                                        class="btn btn-danger btn-sm" 
                                                        data-toggle="modal"
                                                        data-target="#DeleteVendor-{{$vendor->id}}">
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
  <div class="modal" id="AddVendors">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Vendor</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('vendor_add')}}" method="POST">
                @csrf
        <div class="form-group">
            <label>Vendor Name</label>
            <input class="form-control" name="name_vendor" placeholder="Vendor Name">
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

   @foreach($vendors as $vd)
   <div class="modal" id="EditVendor-{{$vd->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Vendor</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('vendor_update/'.$vd->id)}}" method="POST">
                @csrf
        <div class="form-group">
            <label>Vendor Name</label>
            <input class="form-control" value="{{$vd->name_vendor}}"
            name="name_vendor" placeholder="Vendor Name">
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

     <div class="modal" id="DeleteVendor-{{$vd->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Vendor</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to this data! this action cannot be canceled</h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <a href="{{url('vendor_delete/'.$vd->id)}}" class="btn btn-info">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   @endforeach
@endsection
