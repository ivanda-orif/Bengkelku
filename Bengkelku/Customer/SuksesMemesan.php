<?php
	define('TITLE', 'Cetak Invoice');
	include('includes/header.php');
	include('../dbConnection.php');
	// Check Login Status
	session_start();	
	if ($_SESSION['is_login']) {
		$rEmail = $_SESSION['rEmail'];
	} else{
		echo "<script> location.href='CustomerLogin.php' </script>";
	}
	$sql = "SELECT * FROM buatpesanan_tb WHERE request_id = {$_SESSION['myid']}";
	$result = $conn->query($sql);
	if($result->num_rows == 1){
		$row = $result->fetch_assoc();
		echo "<div class='ml-5 mt-5'>
				<table class='table'>
					<tbody>
						<tr>
							<th>ID Pesanan</th>
							<td>".$row['request_id']."</td>
						</tr>
						<tr>
							<th>Name</th>
							<td>".$row['nama_lengkap']."</td>
						</tr>
						<tr>
							<th>Nomor HP</th>
							<td>".$row['nomor_hp']."</td>
						</tr>
						<tr>
							<th>Tipe Mobil</th>
							<td>".$row['tipe_mobil']."</td>
						</tr>
						<tr>
							<th>Kendala</th>
							<td>".$row['d_masalah']."</td>
						</tr>
						<tr>
							<td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
						</tr>
					</tbody>
				</table>
			</div>";
		} else{
			echo "Gagal";
		}
?>
<?php
include('includes/footer.php');
?>