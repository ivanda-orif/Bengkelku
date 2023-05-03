<?php
define('TITLE', 'Laporan Penjualan');
define('PAGE', 'LaporanPenjualan');
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
	<p class="bg-dark text-white p-2">Histori Penjualan</p>
	<?php
			$sql= "SELECT * FROM penjualan_tb";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
						echo '
							<table class="table">
								<thead>
									<tr>
										<th scope="col">ID Penjualan</th>
										<th scope="col">Nama Produk</th>
										<th scope="col">Jumlah Pembelian</th>
										<th scope="col">Harga Satuan</th>
										<th scope="col">Harga Total</th>
										<th scope="col">Nama Pembeli</th>
										<th scope="col">Kota/Kecamatan</th>
									</tr>
								</thead>
								<tbody>';
									while($row = $result->fetch_assoc()){
									echo '<tr>';
										echo '<td>'.$row["id_pnjln"].'</td>';
										echo '<td>'.$row["p_nama"].'</td>';
										echo '<td>'.$row["p_jumlah"].'</td>';
										echo '<td>'.$row["p_hsatuan"].'</td>';
										echo '<td>'.$row["p_htotal"].'</td>';
										echo '<td>'.$row["nama_pbl"].'</td>';
										echo '<td>'.$row["kota_pbl"].'</td>';
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