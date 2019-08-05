<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>KPC</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="{{asset('/template/vendors/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
	
	<!-- Toastr CSS -->
    <link href="{{asset('/template/vendors/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Toggles CSS -->
    <link href="{{asset('/template/vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/template/vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/template/vendors/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
	
    <!-- Custom CSS -->
    <link href="{{asset('/template/dist/css/style.css')}}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
	
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-alt-nav hk-icon-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="{{route('homepage')}}" height="15%" width="15%">
                <img src="{{asset('template/logo.png')}}" alt="logo" class="brand-img d-inline-block align-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown show-on-hover">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Requests
                        </a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            @if(\Illuminate\Support\Facades\Auth::user()->role == "User")
                                <a class="dropdown-item" href="{{route('request.new')}}">New Request</a>
                            @endif
                            <a class="dropdown-item" href="{{route('request.view')}}">List Request</a>
                            <a class="dropdown-item" href="{{route('revision.list')}}">Revision List</a>
                        </div>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == "Admin")
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.view')}}" >Users</a>
                        </li>
                    @endif
                </ul>
            </div>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-body">
                                <span>{{\Illuminate\Support\Facades\Auth::user()->name}}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
						<div class="hk-row">
								@yield('content')
						</div>
					</div>
                </div>
                <!-- /Row -->
			</div>
            <!-- /Container -->
			<!-- Footer -->
            <div class="hk-footer-wrap container-fluid">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Pampered by<a href="https://hencework.com/" class="text-dark" target="_blank">Hencework</a> © 2019</p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('/template/vendors/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('/template/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('/template/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{asset('/template/dist/js/jquery.slimscroll.js')}}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{asset('/template/dist/js/dropdown-bootstrap-extended.js')}}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{asset('/template/dist/js/feather.min.js')}}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{asset('/template/vendors/jquery-toggles/toggles.min.js')}}"></script>
    <script src="{{asset('/template/dist/js/toggle-data.js')}}"></script>
	
	<!-- Counter Animation JavaScript -->
	<script src="{{asset('/template/vendors/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('/template/vendors/jquery.counterup/jquery.counterup.min.js')}}"></script>
	
	<!-- Easy pie chart JS -->
    <script src="{{asset('/template/vendors/easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
	
	<!-- Sparkline JavaScript -->
    <script src="{{asset('/template/vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="{{asset('/template/vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('/template/vendors/morris.js/morris.min.js')}}"></script>
   
	<!-- EChartJS JavaScript -->
    <script src="{{asset('/template/vendors/echarts/dist/echarts-en.min.js')}}"></script>
    
	<!-- Peity JavaScript -->
    <script src="{{asset('/template/vendors/peity/jquery.peity.min.js')}}"></script>
   
	<!-- Toastr JS -->
    <script src="{{asset('/template/vendors/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

    <script src="{{asset('/template/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('/template/dist/js/tinymce-data.js')}}"></script>
    <script src="{{asset('/template/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('/template/vendors/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('/template/dist/js/daterangepicker-data.js')}}"></script>

    <script src="{{asset('/template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/template/vendors/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('/template/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('/template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('/template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('/template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('/template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/template/dist/js/dataTables-data.js')}}"></script>

    <!-- Init JavaScript -->
    <script src="{{asset('/template/dist/js/init.js')}}"></script>
    <script src="{{asset('/template/dist/js/kpc.js')}}"></script>
</body>

</html>