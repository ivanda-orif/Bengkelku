<?php
define('TITLE', 'Tambah Teknisi');
define('PAGE', 'DaftarTeknisi');
include('includes/header.php');
include('../dbConnection.php');
	// Check Login Status
	session_start();	
	if ($_SESSION['is_adminlogin']) {
		$aEmail = $_SESSION['aEmail'];
	} else{
		echo "<script> location.href='login.php' </script>";
	}
	if(isset($_REQUEST['teksubmit'])){
		if(($_REQUEST['tek_nama'] == "") || ($_REQUEST['tek_kota'] == "") || ($_REQUEST['tek_hp'] == "") || ($_REQUEST['tek_email'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Isi Semua Bagan</div>';
		} else{
			$teknama = $_REQUEST['tek_nama'];
			$tekkota = $_REQUEST['tek_kota'];
			$tekhp = $_REQUEST['tek_hp'];
			$tekemail = $_REQUEST['tek_email'];
			$sql = "INSERT INTO daftarteknisi_tb (tek_nama, tek_kota, tek_hp, tek_email) VALUES ('$teknama', '$tekkota', '$tekhp', '$tekemail')";
			if($conn->query($sql) == TRUE){
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Berhasil Menambahkan Data</div>';
			} else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Gagal Menambahkan</div>';
			}
		}
	}
?>

<div class="col-sm-6 mx-3 jumbotron">
	<h3 class="text-center">Tambah Teknsi</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="tek_nama">Nama</label>
			<input type="text" class="form-control" id="tek_nama" name="tek_nama">
		</div>
		<div class="form-group">
			<label for="tek_kota">Kota</label>
			<input type="text" class="form-control" id="tek_kota" name="tek_kota">
		</div>
		<div class="form-group">
			<label for="tek_hp">Nomor HP</label>
			<input type="number" min="0800000000" max="089999999999" class="form-control" id="tek_hp" name="tek_hp">
		</div>
		<div class="form-group">
			<label for="tek_email">Email</label>
			<input type="text" class="form-control" id="tek_email" name="tek_email">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-danger" id="teksubmit" name="teksubmit">Simpan</button>
			<a href="pelanggan.php"></a>
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
	</form>
</div>

<?php
include('includes/footer.php');
?>