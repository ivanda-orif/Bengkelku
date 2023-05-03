<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/custom.css">

  <title><?php echo TITLE ?></title>
</head>

<body>
	<!-- Navbar Atas -->
	<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="CustomerProfile.php">Bengkelku</a>
	</nav>

	<!-- Start Container -->
	<div class="container-fluid" style="margin-top: 40px;">
		<div class="row">
			<!-- Coloumn 1(sidebar) -->
			<nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'ProfilPengguna'){echo 'active';} ?>" href="CustomerProfile.php"><i class="fas fa-user"></i> Profil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'PesananBaru'){echo 'active';} ?>" href="BuatPesanan.php"><i class="fas fa-pencil-alt"></i> Buat Pesanan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'StatusPesanan'){echo 'active';} ?>" href="StatusPesanan.php"><i class="fas fa-clipboard-list"></i> Status Pesanan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'UbahSandi'){echo 'active';} ?>" href="GantiPassword.php"><i class="fas fa-key"></i> Ganti Password</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="Logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a>
						</li>
					</ul>
				</div>
			</nav>