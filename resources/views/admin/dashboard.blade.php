@extends('admin.layout.master')

@section('css')

	@include('admin.includes.voters-css')
    <style>
        .cardCon{
            display: flex;
            justify-content: center;
            align-items: center;
            /*border: 1px solid black;*/
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .cards{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50%;
            /*border: 1px solid black;*/
            margin-bottom: 2rem;
        }

        .header{
            width: 70%;
            height: 5vh;
            /*border: 1px solid black;*/
            background-color: #6169D0;
            color: white;
            display: flex;
            padding-left: 1rem;
            align-items: center;
        }
        .cbody{
            height: 20vh;
            width: 70%;
            border: 1px solid #D7DDD7;
            background-color: #fff;
            padding-top: 2rem;
        }

        .cname{
            display: flex;
            justify-content: center;
            align-items: center;
            /*border: 1px solid black;*/
        }

        .cname span{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cdetails{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-bottom: .5rem;
            /*align-items: center;*/
        }

        
    </style>

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
                   @include('admin.includes.navbar')

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                                        <h3><span>29</span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Projects</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                                        <h3><span>715</span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                                        <h3><span>31</span></h3>
                                                        <p class="text-muted font-15 mb-0">Members</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                                        <h3><span>93%</span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                                        <p class="text-muted font-15 mb-0">Productivity</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
 
                                       



                        <div class="row">
                            @foreach($votes as $value)
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">{{ $value->position }}</h4>

                                        <div dir="ltr">
                                            <div class="mt-3 chartjs-chart" style="height: 320px;">
                                                <canvas id="{{ $value->id }}" data-colors="#fa5c7c,#727cf5"></canvas>
                                            </div>
                                        </div>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                            @endforeach
                        </div>
                                       

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
     @include('admin.includes.dashboard-chart')
     <!-- <script>
  var seen = {};
  $('.header').each(function(){
    var txt = $(this).text();
    if(seen[txt])
      $(this).remove();
    else
      seen[txt] = true;
  });
</script> -->
 
@endsection