<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">

  <title>Bengkelku</title>

</head>
<body>

	<!-- Start Navbar -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
		<a href="index.php" class="navbar-brand">Bengkelku</a>
		<span class="navbar-text">#TimAntiMogok</span>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="myMenu">
			<ul class="navbar-nav ml-auto pr-5 custom-nav">
				<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="#Services" class="nav-link">Service</a></li>
				<li class="nav-item"><a href="#Registration" class="nav-link">Register</a></li>
				<li class="nav-item"><a href="Customer/CustomerLogin.php" class="nav-link">Login</a></li>
				<li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
			</ul>
		</div>
	</nav>
	<!-- End Navbar -->

	<!--Start Header Jubotron -->
	<header class="jumbotron back-image" style="background-image:url(images/gambar.jpeg);">
		<div class="myclass mainHeading">
			<h1 class=" text-danger font-weight-bold highlight1" style="">Selamat datang di Bengkelku</h1>
			<p class="font-italic"><span class="highlight">Kami ada kapanpun dan dimanapun Anda berada!</p>
			<a href="Customer/CustomerLogin.php" class="btn btn-success mr-4">Masuk</a>
			<a href="#Registration" class="btn btn-danger mr-4">Daftar</a>
		</div>
	</header>
	<!--End Header Jubotron -->

	<!-- Start Introduction Container -->
	<div class="container">
		<div class="jumbotron">
			<h3 class="text-center">Tentang Bengkelku</h3>
			<p class="text-center">
				Bengkelku merupakan sebuah perusahaan yang bergerak dibidang jasa otomotif yang sudah berdiri sejak tahun 2008. Dengan lebih dari 4800 lokasi layanan yang tersebar di seluruh Indonesia. Kami menyediakan jasa dan kebutuhan yang diperlukan, dimanapun dan kapanpun Anda berada. Dengan para mekanik kami yang sudah tersertifikasi, kami jamin Anda akan puas. Kami juga melayani pembelian sparepart secara terpisah.<br  id="Services">
			</p>
		</div>
	</div>
	<!-- End Introduction Container -->

	<!-- Start Service Section -->
	<div class="container text-center border-bottom">
		<h2>Layanan Bengkelku</h2>
		<div class="row mt-4">
			<div class="col-sm-4 mb-4">
				<a href="#"><i class="fas fa-car fa-8x text-success"></i></a>
				<h4 class="mt-4">Mobil Pribadi</h4>
			</div>
			<div class="col-sm-4 mb-4">
				<a href="#"><i class="fas fa-cogs fa-8x text-primary"></i></a>
				<h4 class="mt-4">Servis Berkala</h4>
			</div>
			<div class="col-sm-4 mb-4">
				<a href="#"><i class="fas fa-shopping-cart fa-8x text-secondary"></i></a>
				<h4 class="mt-4"  id="Registration">Suku Cadang</h4>
			</div>
		</div>
	</div>
	<!-- End Service Section -->

	<!-- Start Form Registrasi Container -->
	<?php include('RegistrasiUser.php') ?>
	<!-- End Form Registrasi Container -->

	<!-- Start Testimoni -->
	<div class="jumbotron bg-danger">
		<div class="container">
			<h2 class="text-center text-white">Testimoni</h2>
			<div class="row mt-5">
				<!-- Testimoni1 -->
				<div class="col-lg-3 col-sm-6">
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="images/customer1.jpg" class="img-fluid" style="border-radius: 100px;" alt="customer1">
							<h4 class="card-title">Donald Trump</h4>
							<p class="card-text">Saya pikir mobil presiden tidak akan pernah mogok, tetapi saya salah, untungnya ada Bengkelku yang siap datang ke lokasi.</p>
						</div>
					</div>
				</div>
				<!-- Testimoni2 -->
				<div class="col-lg-3 col-sm-6">
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="images/customer0.jpg" class="img-fluid" style="border-radius: 100px;" alt="customer2">
							<h4 class="card-title">Najwa Shihab</h4>
							<p class="card-text">Pernah waktu itu pake mobilnya mama, pertama kali nyoba matic juga waktu itu. Eh pas dijalan mogok, langsung order Bengkelku.</p>
						</div>
					</div>
				</div>
				<!-- Testimoni3 -->
				<div class="col-lg-3 col-sm-6">
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="images/customer3.jpg" class="img-fluid" style="border-radius: 100px;" alt="customer3">
							<h4 class="card-title">Mark Zuckerberg</h4>
							<p class="card-text">Urusan bisnis sama perusahaan sebelah, tetapi pas dijalan mobil mogok, gak tau harus ngapain, cari di Internet, ketemu Bengkelku.</p>
						</div>
					</div>
				</div>
				<!-- Testimoni4 -->
				<div class="col-lg-3 col-sm-6">
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="images/customer4.jpg" class="img-fluid" style="border-radius: 100px;" alt="customer4">
							<h4 class="card-title">Lalisa Manoban</h4>
							<p class="card-text">Beberapa waktu lalu ada meetup sama Blink, baru keluar bandara, mobil tiba-tiba mati, terus sopirnya manggil Bengkelku.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Testimoni -->

	<!-- Contact Us -->
	<div class="container" id="Contact">
		<h2 class="text-center mb-4">Contact Us</h2>
		<div class="row">
			<!-- Coloumn 1 -->
			<div class="col-md-4 text-left"> 
				<strong>Kantor Pusat: </strong><br>
				PT Bengkel Bergerak<br>
				Jl. Iskandar Dinata no 125<br>
				Jakarta Selatan - 28443<br>
				(021)2223411<br>
				<a href="#" target="_blank">www.bengkelku.com</a><br>
				<br> <br>
				<strong>Kantor Cabang: </strong><br>
				PT Bengkel Bergerak<br>
				Jl. Gandaria no 33, Kediri<br>
				Jawa Timur - 64155<br>
				(0354)2223411<br>
				<a href="#" target="_blank">www.bengkelku.com</a><br>
			</div>
			<!-- Coloumn 2 -->
			<?php include('ContactForm.php') ?>						
		</div>	
	</div>
	<!-- End Contact Us -->

	<!-- Start Footer -->
	<footer class="container-fluid bg-dark mt-5 text-white">
		<div class="container">
			<div class="row py-3">
				<!-- Coloumn 1 -->
				<div class="col-md-6 ft-mobile">
					<span class="pr-2">Follow Us:</span>
					<a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
					<a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
					<a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
					<a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" target="_blank" class="pr-2 fi-color"><i class="fa fa-rss"></i></a>
				</div>
				<!-- Coloumn 2 -->
				<div class="col-md-6 text-right ft-mobile">
					<small>Designed by Ivanda Orif F. &copy; 2020</small>
					<small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
				</div>
				<br> <br>
				<div>				
					<a href="https://play.google.com/"><img src="images/Logo_Google_Store.png" width="150"></a>
					<a href="https://apps.apple.com/"><img src="images/Logo_Apple_Store.png" width="150"></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Javascript -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/all.min.js"></script>


</body>
</html>
