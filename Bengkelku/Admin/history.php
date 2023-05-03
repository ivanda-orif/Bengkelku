<?php
define('TITLE', 'Riwayat Pesanan');
define('PAGE', 'RiwayatPesanan');
include('includes/header.php');
include('../dbConnection.php');
	// Check Login Status
	session_start();	
	if ($_SESSION['is_adminlogin']) {
		$aEmail = $_SESSION['aEmail'];
	} else{
		echo "<script> location.href='login.php' </script>";
	}
?>
<!-- Coloumn 2 (Table) -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">Histori Pesanan</p>
	<?php
			$sql= "SELECT * FROM historipesanan_tb";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
						echo '
							<table class="table">
								<thead>
									<tr>
										<th scope="col">ID Pesanan</th>
										<th scope="col">Tipe Mobil</th>
										<th scope="col">Deskripsi Masalah</th>
										<th scope="col">Nama Lengkap</th>
										<th scope="col">Nomor HP</th>
										<th scope="col">Kota/Kecamatan</th>
										<th scope="col">Kode Pos</th>
										<th scope="col">Lokasi</th>
										<th scope="col">Teknisi</th>
									</tr>
								</thead>
								<tbody>';
									while($row = $result->fetch_assoc()){
									echo '<tr>';
										echo '<td>'.$row["request_id"].'</td>';
										echo '<td>'.$row["tipe_mobil"].'</td>';
										echo '<td>'.$row["d_masalah"].'</td>';
										echo '<td>'.$row["nama_lengkap"].'</td>';
										echo '<td>'.$row["nomor_hp"].'</td>';
										echo '<td>'.$row["kota_kec"].'</td>';
										echo '<td>'.$row["kode_pos"].'</td>';
										echo '<td>'.$row["lok_alamat"].'</td>';
										echo '<td>'.$row["teknisi_t"].'</td>';
									echo '</tr>';
									}
								echo '</tbody>';
							echo '</table>';
					} else{
						echo '0 Hasil';
					}
	?>
</div>
<?php
include('includes/footer.php');
?>