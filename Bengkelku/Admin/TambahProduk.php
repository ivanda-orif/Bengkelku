<?php
define('TITLE', 'Tambah Produk');
define('PAGE', 'SukuCadang');
include('includes/header.php');
include('../dbConnection.php');
	// Check Login Status
	session_start();	
	if ($_SESSION['is_adminlogin']) {
		$aEmail = $_SESSION['aEmail'];
	} else{
		echo "<script> location.href='login.php' </script>";
	}
	if(isset($_REQUEST['prosubmit'])){
		if(($_REQUEST['p_nama'] == "") || ($_REQUEST['p_tersedia'] == "") || ($_REQUEST['p_total'] == "") || ($_REQUEST['p_hasli'] == "") || ($_REQUEST['p_hjual'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Isi Semua Bagan</div>';
		} else{
			$pnama = $_REQUEST['p_nama'];
			$ptersedia = $_REQUEST['p_tersedia'];
			$ptotal = $_REQUEST['p_total'];
			$phasli = $_REQUEST['p_hasli'];
			$phjual = $_REQUEST['p_hjual'];
			$sql = "INSERT INTO sparepart_tb (p_nama, p_tersedia, p_total, p_hasli, p_hjual) VALUES ('$pnama', '$ptersedia', '$ptotal', '$phasli', '$phjual')";
			if($conn->query($sql) == TRUE){
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Berhasil Menambahkan Data</div>';
			} else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Gagal Menambahkan</div>';
			}
		}
	}
?>

<!-- Coloumn 2(Tabel) -->
<div class="col-sm-6 mx-3 jumbotron">
	<h3 class="text-center">Tambah Produk</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="p_nama">Nama Produk</label>
			<input type="text" class="form-control" id="p_nama" name="p_nama">
		</div>
		<div class="form-group">
			<label for="p_tersedia">Tersedia</label>
			<input type="number" class="form-control" id="p_tersedia" name="p_tersedia">
		</div>
		<div class="form-group">
			<label for="p_total">Total</label>
			<input type="number" class="form-control" id="p_total" name="p_total">
		</div>
		<div class="form-group">
			<label for="p_hasli">Harga Asli</label>
			<input type="text" class="form-control" id="p_hasli" name="p_hasli">
		</div>
		<div class="form-group">
			<label for="p_hjual">Harga Jual</label>
			<input type="text" class="form-control" id="p_hjual" name="p_hjual">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-danger" id="prosubmit" name="prosubmit">Simpan</button>
			<a href="pelanggan.php"></a>
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
	</form>
</div>

<?php
include('includes/footer.php');
?>