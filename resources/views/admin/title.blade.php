@extends('admin.layout.master')

@section('css')
    @include('admin.includes.voters-css')
@endsection

@section('content')







<!-- Update Modal -->
<form action="{{ route('title-update') }}" method="POST">
@csrf
@method('PUT')
<div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Edit Election Title</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                
                <!-- CONTENT -->
                <div class="mb-3">
                	<input type="hidden" name="edit_title_id" id="edit-title-id">
                    <label for="department-edit" class="form-label">Election Title</label>
                    <input type="text" class="form-control" id="title-edit" placeholder="Enter Title" name="title_edit">
                </div>
                <!-- ENDCONTENT -->
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>




<!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                @include('admin.includes.logo')

    
                <div class="h-100" id="leftside-menu-container" data-simplebar="">
                <!--- Sidemenu -->
                    @include('admin.includes.sidemenu')
                    <!-- End Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    @include('admin.includes.navbar')
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                   <form action="{{ route('title-change') }}" method="POST">
                                   	@csrf
	                                   <div style="display: flex; justify-content:center; align-items: center;">
		                                    <button type="submit" style="width: 400px; height: 50px; background-color: {{ $color }} color: white; border: none; font-weight: bold; border-radius: 8px; margin-bottom: 1rem; margin-top: 1rem;">{{ $election }} Election
		                                    </button>
	                                    </div>
	                                </form>

                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    
                
                                        <div class="table-responsive">
                                          <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Election Title</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($title as $value)
                                            <tr>
                                                <td>{{ $value->title }}</td>
                                                <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>

                                                            
                                                            <button class="editbtn" value="{{ $value->id }}" style="border: none; background-color: transparent;"><a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a></button>

                                                           
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->        
                        
                    </div> <!-- container -->

                </div> <!-- content -->

               

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


       
        
@endsection

@section('js')
    @include('admin.includes.voters-js')
    @include('admin.includes.title-edit-modal')
    @include('admin.includes.title-toast-notification')
@endsection