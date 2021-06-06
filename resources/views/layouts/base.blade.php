<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Test App</title>

	<link rel="stylesheet" href="{{asset('bootstrap-4.5.3/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('fa-5.15/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('styles/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('styles/main.css')}}">
	<link rel="stylesheet" href="{{asset('styles/filieres.css')}}">
	<link rel="stylesheet" href="{{asset('styles/accordion.css')}}">
	<link rel="stylesheet" href="{{asset('styles/custom.css')}}">
    @yield('css')

</head>

<body>


	<!-- Start of top nav bar -->
    @include('partials.header')

	<!-- End of top nav bar -->

	<div class="col-lg-12">
		<div class="row">
			<!-- sibebar -->
{{--
			<div class="col-md-3 col-lg-3 d-md-block bg-darkblue text-white py-3">
				<h5 class="py-3">
					<span class="">Dashboard<i class="fa fa-chart-pie ml-2"></i></span>
				</h5>
				<!-- <p class="font-80">Page de configuration des données</p> -->
				<nav class="sidebar d-md-block collapse" id="sidebarMenu">
					<div class="sidebar-sticky">
						<ul class="nav flex-column">
							<li class="nav-item my-2 font-90 from-left-anim">
								<a class="nav-link text-white d-flex align-items-center justify-content-between p-2 " href="{{route('menu.create')}}">
									<span><i class="fa fa-tools mr-2"></i> Menu</span>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
--}}
			<!-- end sidebar -->

			<!-- main content -->
            @yield('content')
			<!-- end main content -->

		</div>
	</div>

	<!-- Start of footer -->
    @include('partials.footer')
	<!-- end footer -->


	<script src="{{asset('bootstrap-4.5.3/js/jquery-3.2.1.slim.min.js')}}"></script>
	<script src="{{asset('bootstrap-4.5.3/js/popper.min.js')}}"></script>
	<script src="{{asset('bootstrap-4.5.3/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/accordion.js')}}"></script>

	<!-- particular script for the page -->
    @yield('js')
    <!-- end particular script for the page -->

</body>

</html>