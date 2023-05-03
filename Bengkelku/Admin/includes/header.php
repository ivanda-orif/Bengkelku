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
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">Bengkelku</a>
	</nav>

	<!-- Start Container -->
	<div class="container-fluid" style="margin-top: 40px;">
		<div class="row">
			<!-- Coloumn 1(sidebar) -->
			<nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'Dashboard'){echo 'active';} ?>" href="dashboard.php"><i class="fas fa-user"></i> Dashborad</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'DalamPelayanan'){echo 'active';} ?>" href="service.php"><i class="fas fa-wrench"></i> Dalam Pelayanan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'PesananBaru'){echo 'active';} ?>" href="order.php"><i class="fas fa-concierge-bell"></i> Pesanan Baru</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'SukuCadang'){echo 'active';} ?>" href="sparepart.php"><i class="fas fa-shopping-cart"></i> Suku Cadang</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'DaftarTeknisi'){echo 'active';} ?>" href="teknisi.php"><i class="fas fa-user-cog"></i> Teknisi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'DaftarPelanggan'){echo 'active';} ?>" href="pelanggan.php"><i class="fas fa-user"></i> Pelanggan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'LaporanPenjualan'){echo 'active';} ?>" href="report.php"><i class="fas fa-th-list"></i> Laporan Penjualan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if(PAGE == 'RiwayatPesanan'){echo 'active';} ?>" href="history.php"><i class="fas fa-history"></i> Riwayat Pesanan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../Customer/Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
						</li>
					</ul>
				</div>
			</nav>