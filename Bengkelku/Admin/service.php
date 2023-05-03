<?php
define('TITLE', 'Dalam Pelayanan');
define('PAGE', 'DalamPelayanan');
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

<!-- Coloumn 2(Dalam Pelayanan) -->
<div class="col-sm-9 col-md-10 mt-5">
	<?php 
	$sql = "SELECT * FROM pesananditerima_tb";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		echo '<table class="table">';
				echo '<thead>';
					echo '<tr>';
						echo '<th scope="col">ID Pesanan</th>';
						echo '<th scope="col">Tipe Mobil</th>';
						echo '<th scope="col">Nama Pelanggan</th>';
						echo '<th scope="col">Kota/Kecamatan</th>';
						echo '<th scope="col">No HP</th>';
						echo '<th scope="col">Teknisi</th>';
						echo '<th scope="col">Lainnya</th>';
					echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
					while ($row = $result->fetch_assoc()){
					echo '<tr>';
						echo '<td>'.$row['request_id'].'</td>';
						echo '<td>'.$row['tipe_mobil'].'</td>';
						echo '<td>'.$row['nama_lengkap'].'</td>';
						echo '<td>'.$row['kota_kec'].'</td>';
						echo '<td>'.$row['nomor_hp'].'</td>';
						echo '<td>'.$row['teknisi_t'].'</td>';
						echo '<td>';
							echo '<form action="DetailLayanan.php" method="POST" class="d-inline">';
								echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-warning" name="lihat" value="Lihat" type="submit"><i class="far fa-eye"></i></button>';
							echo '</form>';
							echo '<form action="" method="POST" class="d-inline ml-2">';
								echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
							echo '</form>';
						echo '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
			echo '</table>';
	} else{
		echo'Tidak Ada Hasil';
	}
	if(isset($_REQUEST['delete'])){
		/*$sql = "DELETE FROM pesananditerima_tb WHERE request_id = {$_REQUEST['id']}";
		if($conn->query($sql) == TRUE){
			echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
		} else{
			echo 'Gagal Menghapus Data';
		}*/
		$sql = "INSERT INTO historipesanan_tb (request_id, tipe_mobil, d_masalah, nama_lengkap, nomor_hp, kota_kec, kode_pos, lok_alamat, teknisi_t) SELECT request_id, tipe_mobil, d_masalah, nama_lengkap, nomor_hp, kota_kec, kode_pos, lok_alamat, teknisi_t FROM pesananditerima_tb WHERE request_id = {$_REQUEST['id']}";
		if($conn->query($sql) == TRUE){
			$sql = "DELETE FROM pesananditerima_tb WHERE request_id = {$_REQUEST['id']}";
			if($conn->query($sql) == TRUE){
				echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
			} else{
				echo 'Gagal Menghapus Data';
			}
		} else{
			echo 'Gagal Menghapus Data';
		}
	}
	?>
</div>

<?php
include('includes/footer.php');
?>