<?php
define('TITLE', 'Dashboard');
define('PAGE', 'Dashboard');
include('includes/header.php');
include('../dbConnection.php');
	// Check Login Status
	session_start();	
	if ($_SESSION['is_adminlogin']) {
		$aEmail = $_SESSION['aEmail'];
	} else{
		echo "<script> location.href='login.php' </script>";
	}
// Menghitung jumlah pesanan dalam antrean
$sql = "SELECT COUNT(request_id) FROM buatpesanan_tb";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$buatpesanan = $row[0];
// Menghitung jumlah pesanan dalam layanan
$sql = "SELECT COUNT(r_no) FROM pesananditerima_tb";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$pesananditerima = $row[0];
// Menghitung jumlah teknisi
$sql = "SELECT COUNT(tek_id) FROM daftarteknisi_tb";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$daftarteknisi = $row[0];
?>

			<!-- Coloumn 2(dashboard) -->
			<div class="col-sm-9 col-md-10 mt-5">
				<div class="row text-center mx-5 mt-5">
					<div class="col-sm-4 mt-5">
						<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
							<div class="card-header">Order Masuk</div>
							<div class="card-body">
								<h4 class="card-title"><?php echo $buatpesanan; ?></h4>
								<a class="btn text-white" href="#">Lihat</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 mt-5">
						<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
							<div class="card-header">Order Diterima</div>
							<div class="card-body">
								<h4 class="card-title"><?php echo $pesananditerima; ?></h4>
								<a class="btn text-white" href="#">Lihat</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 mt-5">
						<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
							<div class="card-header">Jumlah Teknisi</div>
							<div class="card-body">
								<h4 class="card-title"><?php echo $daftarteknisi; ?></h4>
								<a class="btn text-white" href="#">Lihat</a>
							</div>
						</div>
					</div>
				</div>
				<!--div class="mx-5 mt-5 text-center">
					<p class="bg-dark text-white p-2">Daftar Pelanggan</p>
					<?php
					/*$sql= "SELECT * FROM customerlogin_tb";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
						echo '
							<table class="table">
								<thead>
									<tr>
										<th scope="col">ID Pelanggan</th>
										<th scope="col">Nama</th>
										<th scope="col">Email</th>
									</tr>
								</thead>
								<tbody>';
									while($row = $result->fetch_assoc()){
									echo '<tr>';
										echo '<td>'.$row["r_login_id"].'</td>';
										echo '<td>'.$row["r_name"].'</td>';
										echo '<td>'.$row["r_email"].'</td>';
									echo '</tr>';
									}
								echo '</tbody>';
						echo '</table>';
					} else{
						echo '0 Hasil';
					}*/
					?>
				</div-->
			</div>

<?php
include('includes/footer.php');
?>