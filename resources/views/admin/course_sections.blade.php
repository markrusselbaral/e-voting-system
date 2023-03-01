@extends('admin.layout.master')

@section('css')
    @include('admin.includes.voters-css')
@endsection

@section('content')

<!-- Delete All modal -->
<form action="{{ route('course-section-deleteAll') }}" method="POST">
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
                <h4>Are you sure you want to delete all courses & sections?</h4>
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
<form action="{{ route('course-section-delete') }}" method="POST">
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
                <h4>Are you sure you want to delete this course & section?</h4>
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
<form action="{{ route('course-section-update') }}" method="POST">
@csrf
@method('PUT')
<div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Edit Course & Section</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                
                <!-- CONTENT -->
                <div class="mb-3">
                	<input type="hidden" name="edit_course_section_id" id="edit-course_section-id">
                    <label for="course_section" class="form-label">Course & Section</label>
                    <input type="text" class="form-control" id="course_section-edit" placeholder="Enter Course & Section" name="course_section_edit" required>
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
<form action="{{ route('course-section-save') }}" method="POST">
@csrf
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add Course & Section</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                
                <!-- CONTENT -->
                <div class="mb-3">
                    <label for="course_section" class="form-label">Course & Section</label>
                    <input type="text" class="form-control" id="course_section" placeholder="Enter Course & Section" name="course_section" required>
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
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="admin/assets/images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="admin/assets/images/logo_sm.png" alt="" height="16">
                    </span>
                </a>

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
                                            <li class="breadcrumb-item active">Course & Sections</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Course & Sections</h4>
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
                                                <a href="javascript:void(0);" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="mdi mdi-plus-circle me-2"></i> Add Course & Section</a>
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
                                                <th>Course & Section</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($course_section as $value)
                                            <tr>
                                                <td>{{ $value->course_sections }}</td>
                                                <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>

                                                            
                                                            <button class="editbtn" value="{{ $value->id }}" style="border: none; background-color: transparent;"><a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a></button>

                                                            <button class="deletebtn" value="{{ $value->id }}" style="border: none; background-color: transparent;">
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
    @include('admin.includes.course_section-edit-modal')
    @include('admin.includes.course_section-delete-modal')
    @include('admin.includes.course_section-toast-notification')
@endsection