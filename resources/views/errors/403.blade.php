@php
    $setting = App\Models\SiteSetting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="{{ asset('/backend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('/backend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/backend/assets/css/icons.css') }}" rel="stylesheet">
	<title>403-Not Found</title>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<nav class="bg-white rounded shadow-sm navbar navbar-expand-lg navbar-light fixed-top rounded-0">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="{{ asset($setting->logo) }}" width="140" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent1">
					<ul class="mb-2 navbar-nav ms-auto mb-lg-0">
						<li class="nav-item"> <a class="nav-link active" aria-current="page" href="javascript:history.back()"><i class='bx bx-home-alt me-1'></i>Home</a>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="error-404 d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="py-5 card">
					<div class="row g-0">
						<div class="col col-xl-5">
							<div class="p-4 card-body">
								<h1 class="display-1"><span class="text-primary">4</span><span class="text-danger">0</span><span class="text-success">3</span></h1>
								<h2 class="font-weight-bold display-4">User Not Have Permission.</h2>
								<p>You have reached the edge of the universe.
									<br>The page you requested could not be found.
									<br>Dont'worry and return to the previous page.</p>
								<div class="mt-5"> <a href="javascript:history.back()" class="btn btn-primary btn-lg px-md-5 radius-30">Go Home</a>
									<a href="javascript:history.back()" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a>
								</div>
							</div>
						</div>
						<div class="col-xl-7">
							<img src="https://cdn.searchenginejournal.com/wp-content/uploads/2019/03/shutterstock_1338315902.png" class="img-fluid" alt="">
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
		{{-- <div class="p-3 bg-white shadow fixed-bottom border-top">
			<div class="flex-wrap d-flex align-items-center justify-content-between">
				<ul class="mb-0 list-inline">
					<li class="list-inline-item">Follow Us :</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-facebook me-1'></i>Facebook</a>
					</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-twitter me-1'></i>Twitter</a>
					</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-google me-1'></i>Google</a>
					</li>
				</ul>
				<p class="mb-0">Copyright © 2021. All right reserved.</p>
			</div>
		</div> --}}
	</div>
	<!-- end wrapper -->
	<!-- Bootstrap JS -->
	<script src="{{ asset('/backend/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>