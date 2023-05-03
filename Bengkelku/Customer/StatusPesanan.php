<?php
	define('TITLE', 'Status Pesanan');
	define('PAGE', 'StatusPesanan');
	include('includes/header.php');
	include('../dbConnection.php');
	// Check Login Status
	session_start();	
	if ($_SESSION['is_login']) {
		$rEmail = $_SESSION['rEmail'];
	} else{
		echo "<script> location.href='CustomerLogin.php' </script>";
	}
?>

<!-- Coloumn 2(Cek Pesanan) -->
<div class="col-sm-6 mt-5 mx-3">
	<form action="" method="POST" class="form-inline">
		<div class="form-group mr-3">
			<label for="checkid">Masukkan ID Pesanan </label>
			<input type="number" class="form-control ml-2" name="checkid" id="checkid">
		</div>
		<button type="submit" class="btn btn-danger">Cari</button>
	</form>
	<?php
	if(isset($_REQUEST['checkid']))	{
		if($_REQUEST['checkid'] == ""){
			echo'<div class="alert alert-warning mt-4">Isi Semua Kolom</div>';
		} else{
				$sql = "SELECT * FROM pesananditerima_tb WHERE request_id = {$_REQUEST['checkid']}";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				if(($row['request_id'] == $_REQUEST['checkid'])){	?>
					<h3 class="text-center mt-5">Detail Pesanan</h3>
					<table class="table table-bordered mb-5">
						<tbody>
								<tr>
									<td>ID Pesanan</td>
									<td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
								</tr>
								<tr>
									<td>Tipe Mobil</td>
									<td><?php if(isset($row['tipe_mobil'])){echo $row['tipe_mobil'];} ?></td>
								</tr>
								<tr>
									<td>Deskripsi Masalah</td>
									<td><?php if(isset($row['d_masalah'])){echo $row['d_masalah'];} ?></td>
								</tr>
								<tr>
									<td>Nama Lengkap</td>
									<td><?php if(isset($row['nama_lengkap'])){echo $row['nama_lengkap'];} ?></td>
								</tr>
								<tr>
									<td>Nomor HP</td>
									<td><?php if(isset($row['nomor_hp'])){echo $row['nomor_hp'];} ?></td>
								</tr>
								<tr>
									<td>Kota/Kecamatan</td>
									<td><?php if(isset($row['kota_kec'])){echo $row['kota_kec'];} ?></td>
								</tr>
								<tr>
									<td>Kode Pos</td>
									<td><?php if(isset($row['kode_pos'])){echo $row['kode_pos'];} ?></td>
								</tr>
								<tr>
									<td>Alamat/Lokasi Terkini</td>
									<td><?php if(isset($row['lok_alamat'])){echo $row['lok_alamat'];} ?></td>
								</tr>
								<tr>
									<td>Teknisi</td>
									<td><?php if(isset($row['teknisi_t'])){echo $row['teknisi_t'];} ?></td>
								</tr>
								<tr>
									<td>Tanda Tangan Teknisi</td>
									<td></td>
								</tr>
								<tr>
									<td>Tanda Tangan Pelanggan</td>
									<td></td>
								</tr>
						</tbody>
					</table>					
			<?php } else{				
				$sql = "SELECT * FROM buatpesanan_tb WHERE request_id = {$_REQUEST['checkid']}";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				if(($row['request_id'] == $_REQUEST['checkid'])){
					echo "<script>
							alert('Pesanan Anda Sedang Dalam Proses!');
							document.location='StatusPesanan.php';
					     </script>";
				} else{echo "<script>
							alert('Data Tidak Ditemukan!');
							document.location='StatusPesanan.php';
					     </script>";}
			}
		}
}?>
<?php if(isset($msg)){echo $msg;} ?>
</div>

<?php
include('includes/footer.php');
?>