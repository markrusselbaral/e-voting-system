@extends('admin.layout.master')

@section('css')
    @include('admin.includes.voters-css')
@endsection

@section('content')

<!-- Delete All modal -->
<form action="{{ route('deleteAll') }}" method="POST">
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
                <h4>Are you sure you want to delete all voters?</h4>
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
<form action="{{ route('delete') }}" method="POST">
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
                <h4>Are you sure you want to delete this voter?</h4>
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
<form action="{{ route('update') }}" method="POST">
@csrf
@method('PUT')
<div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Edit Voter</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button> -->
            </div>
            <div class="modal-body">
                
                <!-- CONTENT -->
                <div class="mb-3">
                    <label for="ismis_id" class="form-label">ISMIS ID</label>
                    <input type="hidden" id="editid" name="editid">
                    <input type="number" class="form-control" id="ismis_id" placeholder="Enter ISMIS ID" name="update_ismis_id">
                </div>
                <div class="mb-3">
                    <label for="Firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="Firstname" placeholder="Enter your firstname" name="update_fname">
                </div>
                <div class="mb-3">
                    <label for="Lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="Lastname" placeholder="Enter your lastname" name="update_lname">
                </div>
                <div class="mb-3">
                    <label for="course_section" class="form-label">Course & Section</label>
                    <select class="form-select mb-3" id="course_section" name="update_course_section">
                        <option selected>...</option>
                        @foreach($course_sections as $value)
                        <option value="{{ $value->id }}">{{ $value->course_sections }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="edit_department" class="form-label">Department</label>
                    <select class="form-select mb-3" id="edit_department" name="edit_department">
                        <option selected>...</option>
                        @foreach($department as $value)
                        <option value="{{ $value->id }}">{{ $value->departments }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="edit_college" class="form-label">College</label>
                    <select class="form-select mb-3" id="edit_college" name="edit_college">
                        <option selected>...</option>
                        @foreach($college as $value)
                        <option value="{{ $value->id }}">{{ $value->colleges }}</option>
                        @endforeach
                    </select>
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
<form action="{{ route('save') }}" method="POST">
@csrf
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add Voter</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                
                <!-- CONTENT -->
                <div class="mb-3">
                    <label for="ismis_id" class="form-label">ISMIS ID</label>
                    <input type="number" class="form-control" id="ismis_id" placeholder="Enter ISMIS ID" name="ismis_id">
                </div>
                <div class="mb-3">
                    <label for="Firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="Firstname" placeholder="Enter your firstname" name="fname">
                </div>
                <div class="mb-3">
                    <label for="Lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="Lastname" placeholder="Enter your lastname" name="lname">
                </div>
                <div class="mb-3">
                    <label for="course_section" class="form-label">Course & Section</label>
                    <select class="form-select mb-3" id="course_section" name="course_section">
                        <option selected>...</option>
                        @foreach($course_sections as $value)
                        <option value="{{ $value->id }}">{{ $value->course_sections }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <select class="form-select mb-3" id="department" name="department">
                        <option selected>...</option>
                        @foreach($department as $value)
                        <option value="{{ $value->id }}">{{ $value->departments }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="college" class="form-label">College</label>
                    <select class="form-select mb-3" id="college" name="college">
                        <option selected>...</option>
                        @foreach($college as $value)
                        <option value="{{ $value->id }}">{{ $value->colleges }}</option>
                        @endforeach
                    </select>
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
                                            <li class="breadcrumb-item active">Voters</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Voters</h4>
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
                                                <a href="javascript:void(0);" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-plus-circle me-2"></i> Add Voter</a>
                                            </div>
                                            <div class="col-sm-8">
                                                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="text-sm-end">
                                                    <button type="button" class="btn btn-danger mb-2 me-1" data-bs-toggle="modal" data-bs-target="#deleteAllModal"><i class="mdi mdi-delete-outline"></i>Delete all</button>

                                                    <input type="file"  class="btn btn-light mb-2 me-1" name="file">
                                                    
                                                    <button type="submit" class="btn btn-light mb-2">Import</button>

                                                    <a href="{{ route('file-export') }}"><button type="button" class="btn btn-light mb-2">Export</button></a>
                                                </div>
                                            </div><!-- end col-->
                                            </form>
                                        </div>
                
                                        <div class="table-responsive">
                                          <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>ISMIS ID</th>
                                                <th>Fullname</th>
                                                <th>Course & Section</th>
                                                <th>Department</th>
                                                <th>College</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($voters as $value)
                                            <tr>
                                                <td>{{ $value->ismis_id }}</td>
                                                <td>{{ $value->fname }} {{ $value->lname }}</td>
                                                <td>{{ $value->course_sections }}</td>
                                                <td>{{ $value->departments }}</td>
                                                <td>{{ $value->colleges }}</td>
                                                <td>
                                                    <span class="badge bg-danger">{{ $value->status }}</span>
                                                </td>
                                                <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>

                                                            
                                                            <button class="editbtn" value="{{ $value->voter_id }}" style="border: none; background-color: transparent;"><a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a></button>

                                                            <button class="deletebtn" value="{{ $value->voter_id }}" style="border: none; background-color: transparent;">
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
    @include('admin.includes.voter-edit-modal')
    @include('admin.includes.voter-delete-modal')
    @include('admin.includes.voters-toast-notification')
@endsection