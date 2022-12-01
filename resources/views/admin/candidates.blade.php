@extends('admin.layout.master')

@section('css')
    @include('admin.includes.voters-css')
@endsection

@section('content')

<!-- Delete All modal -->
<form action="{{ route('candidate-deleteAll') }}" method="POST">
@csrf
@method('DELETE')
<div id="deleteAllModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Delete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <h4>Are you sure you want to delete all candidates?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>


<!-- Delete modal -->
<form action="{{ route('candidate-delete') }}" method="POST">
@csrf
@method('DELETE')
<div id="deletemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Delete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="deleteid" id="deleteid">
                <h4>Are you sure you want to delete this candidate?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>


<!-- Update Modal -->
<form action="{{ route('candidate-update') }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Edit Candidate</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                
                <!-- CONTENT -->
                <div class="mb-3">
                	<input type="hidden" name="edit_candidate_id" id="edit-candidate-id">
                    <label for="edit_position" class="form-label">Position</label>
                    <select class="form-select mb-3" name="edit_position_id" id="edit_position">
                        <option selected>...</option>
                        @foreach($position as $value)
                        <option value="{{ $value->id }}">{{ $value->position }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="edit_partylist" class="form-label">Partylist</label>
                    <select class="form-select mb-3" id="edit_partylist" name="edit_partylist_id">
                        <option selected>...</option>
                        @foreach($partylist as $value)
                        <option value="{{ $value->id }}">{{ $value->partylists }}</option>
                        @endforeach
                    </select>
                </div>
                 <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input type="file" class="form-control" id="picture" placeholder="Enter picture" name="picture_edit">
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



<!-- Save modal -->
<form action="{{ route('candidate-save') }}" method="POST" enctype="multipart/form-data">
@csrf
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add Candidate</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" id="searhResult">
                
                <!-- CONTENT -->
                <div class="mb-3">
                    <label for="ismis-id" class="form-label">Search by ISMIS ID</label>
                    <input type="search" class="form-control" id="inputSearch" placeholder="Enter ISMIS ID" name="inputSearch">
                    <input type="hidden" class="form-control" id="voters_id" name="voters_id">
                </div>
                <div class="otherInputs" style="display: none;">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Enter Firstname" name="firstname" disabled>
                </div>  
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" disabled>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <select class="form-select mb-3" id="position" name="position_id">
                        <option selected>...</option>
                        @foreach($position as $value)
                        <option value="{{ $value->id }}">{{ $value->position }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="partylist" class="form-label">Partylist</label>
                    <select class="form-select mb-3" id="partylist" name="partylist_id">
                        <option selected>...</option>
                        @foreach($partylist as $value)
                        <option value="{{ $value->id }}">{{ $value->partylists }}</option>
                        @endforeach
                    </select>
                </div>
                 <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input type="file" class="form-control" id="picture" placeholder="Enter picture" name="picture">
                </div>
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
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                                            <li class="breadcrumb-item active">Candidates</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Candidates</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <a href="javascript:void(0);" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-plus-circle me-2"></i> Add Candidate</a>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <button type="button" class="btn btn-danger mb-2 me-1" data-bs-toggle="modal" data-bs-target="#deleteAllModal"><i class="mdi mdi-delete-outline"></i>Delete all</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                          <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Position</th>
                                                <th>ISMIS ID</th>
                                                <th>Fullname</th>
                                                <th>Partylists</th>
                                                <th>Picture</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($candidate as $value)
                                            <tr>
                                                <td>{{ $value->position }}</td>
                                                <td>{{ $value->ismis_id }}</td>
                                                <td>{{ $value->fname }} {{ $value->lname }}</td>
                                                <td>{{ $value->partylists }}</td>
                                                <td><img src="{{ asset('uploads/image3/'.$value->picture) }}" style="border-radius: 100%; width: 40px; height: 40px;"></td>
                                                <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>

                                                            
                                                            <button class="editbtn" value="{{ $value->cid }}" style="border: none; background-color: transparent;"><a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a></button>

                                                            <button class="deletebtn" value="{{ $value->cid }}" style="border: none; background-color: transparent;">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                            </button>
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
    @include('admin.includes.candidate-search-modal')
    @include('admin.includes.candidate-edit-modal')
    @include('admin.includes.candidate-delete-modal')
    @include('admin.includes.candidate-toast-notification')
@endsection