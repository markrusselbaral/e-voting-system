@extends('admin.layout.master')

@section('css')
    @include('admin.includes.voters-css')
@endsection

@section('content')
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
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Profile</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                         
                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('uploads/image3/'.auth()->user()->photo) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" id="myImage">

                                        <h4 class="mb-0 mt-2">{{ auth()->user()->name }}</h4>
                                        <p class="text-muted font-14">{{ auth()->user()->role }}</p>
                                        
                                        <form action="{{ route('photo-update') }}" method="POST" enctype="multipart/form-data">
                                        <label for="myFileInput" class="btn btn-success btn-sm mb-2">Browse</label>
                                        <input type="file" name="photo_edit" id="myFileInput" style="display: none;">
                                        
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm mb-2">Save</button>
                                        </form>


                                        

                                        <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase">About Me :</h4>
                                            <p class="text-muted font-13 mb-3">
                                                I am the admin
                                            </p>
                                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{ auth()->user()->name }}</span></p>

                                          

                                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">{{ auth()->user()->email }}</span></p>

                                           
                                        </div>

                                        <ul class="social-list list-inline mt-3 mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                            </li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->


                            </div> <!-- end col-->

                            <div class="col-xl-8 col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                            
                                            <li class="nav-item">
                                                <a href="#settings" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                                    Personal Info
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#password" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    Change Password
                                                </a>
                                            </li>
                                        </ul>


                                    
                                        <div class="tab-content">
                                            
                                            
                                            
                                            <div class="tab-pane show active" id="settings">
                                               <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ auth()->user()->name }}" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">Email Address</label>
                                                                <input type="email" class="form-control" id="useremail" placeholder="Enter email" value="{{ auth()->user()->email }}" name="email">
                                                            </div>
                                                        </div>
                                                        
                                                    </div> <!-- end row -->                
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        
                                            <div class="tab-pane" id="password">
                                               <form action="{{ route('password-update') }}" method="POST">
                                                @csrf
                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Change Password </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="userpassword" class="form-label">Type Old Password</label>
                                                                <input type="password" class="form-control" id="password1" placeholder="Enter password" value="" name="password1">
                                                               
                                                            </div>
                                                        </div> <!-- end col -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="userpassword" class="form-label">Type New Password</label>
                                                                <input type="password" class="form-control" id="password2" placeholder="Enter password" value="" name="password2">
                                                                
                                                            </div>
                                                        </div> <!-- end col -->

                                                    </div> <!-- end row -->
    
                
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                    </div>
                                                
                                            </div>
                                            <!-- end settings content-->
    
                                        </div> <!-- end tab-content -->
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

               

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        
        
@endsection

@section('js')
    @include('admin.includes.voters-js')
    @include('admin.includes.profile-toast-notification')

    <script>
    	var fileInput = document.getElementById("myFileInput");
    	var img = document.getElementById("myImage");

    	fileInput.addEventListener("change", function() {
    		var file = fileInput.files[0];
    		var reader = new FileReader();
    		reader.onload = function(event) {
    			img.src = event.target.result;
    		};
    		reader.readAsDataURL(file);
    	});
    </script>
@endsection