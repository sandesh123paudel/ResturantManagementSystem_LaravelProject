	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Silver Point Restaurant:: Admin Panel</title>
			
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
			<!-- Font Awesome -->
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
			<link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
			<link rel="stylesheet" href="{{ asset('backend/css/adminlte.min.css') }}">
			<link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
			<link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-touch-icon.png')}}">
			<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
			<link rel="manifest" href="images/favicon/site.webmanifest">
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
			

			 



			
			


			



		</head>
		<body class="hold-transition sidebar-mini">
			<!-- Site wrapper -->
			<div class="wrapper">
				<!-- Navbar -->
				<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: ivory; color: black;">
					<!-- Right navbar links -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
						</li>					
					</ul>
					
					
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" data-widget="fullscreen" href="#" role="button">
								<i class="fas fa-expand-arrows-alt"></i>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
								<img src="{{asset('images/logo.svg')}}" class='img-circle elevation-0' width="40" height="40" alt="">
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
								<h4 class="h4 mb-0"><strong>Admin</strong></h4>
								<div class="mb-3">admin@admin.com</div>
								<div class="dropdown-divider"></div>
								<div class="dropdown-divider"></div>
								<div class="dropdown-divider"></div>
								
								<a href={{ route('admin.logout')}} class="dropdown-item text-danger">
									<i class="fas fa-sign-out-alt mr-2"></i> Logout							
								</a>							
							</div>
						</li>
					</ul>
				</nav>
				<!-- /.navbar -->
				<!-- Main Sidebar Container -->

				@include('admin.layouts.sidebar')
			
				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					@yield('content' )
				</div>
				<!-- /.content-wrapper -->
				<footer class="main-footer" style="background-color: ivory; color: black;">
					
	<strong>Copyright &copy; 2023-<script>document.write(new Date().getFullYear())</script> Silver Point Restaurant. All Rights Reserved</strong>
				</footer>
				
			</div>

			
			

			<!-- ./wrapper -->
			<!-- jQuery -->
			<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
			<!-- Bootstrap 4 -->
			<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
			<!-- AdminLTE App -->
			<script src="{{asset('backend/js/adminlte.min.js')}}"></script>
			<!-- AdminLTE for demo purposes -->
			<script src="{{asset('backend/js/demo.js')}}"></script>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<script>
	

	$(function(){
		$(document).on('click', '.delete-link', function(e) {
			e.preventDefault();
			var link = $(this).attr("href");

			Swal.fire({
				title: 'Are you sure?',
				text: 'Delete This Data?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = link;
					Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
				}
			});
		});
	});

	</script>


		</body>
	</html>