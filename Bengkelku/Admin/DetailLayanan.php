<?php
define('TITLE', 'Detail Layanan');
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
<div class="col-sm-6 mt-5 mx-3">
	<h3 class="text-center">Detail Pesanan</h3>
	<?php
	if(isset($_REQUEST['lihat'])){
		$sql = "SELECT * FROM pesananditerima_tb WHERE request_id = {$_REQUEST['id']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); ?>
		<table class="table table-bordered">
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
									<td>TTD Teknisi</td>
									<td></td>
								</tr>
								<tr>
									<td>TTD Pelanggan</td>
									<td></td>
								</tr>
						</tbody>
					</table>
					<div class="text-center">
						<form action="" class="mb-3 d-print-none d-inline">
							<input class="btn btn-danger" type="submit" value="Print" onClick='window.print()'></form>
							<form action="service.php" class="mb-3 d-print-none d-inline"><input class="btn btn-secondary" type="submit" value="Tutup">
						</form>
					</div>
<?php } ?>
</div>
<?php
include('includes/footer.php');
?>