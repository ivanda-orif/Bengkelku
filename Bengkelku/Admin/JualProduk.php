<?php
define('TITLE', 'Jual Produk');
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
	// Jual Produk
	if(isset($_REQUEST['jual'])){
		$sql = "SELECT * FROM sparepart_tb WHERE p_id = {$_REQUEST['id']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}

	if(isset($_REQUEST['simpan'])){
		if(($_REQUEST['p_nama'] == "") || ($_REQUEST['n_pmbli'] == "") || ($_REQUEST['a_pmbli'] == "") || ($_REQUEST['j_pmbln'] == "") || ($_REQUEST['h_pbiji'] == "") || ($_REQUEST['h_total'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Isi Semua Bagan</div>';
		} else{
			$pid = $_REQUEST['p_id'];
			$tersedia = $_REQUEST['p_tersedia'] - $_REQUEST['j_pmbln'];

			$nproduk = $_REQUEST['p_nama'];
			$npembeli = $_REQUEST['n_pmbli'];
			$apembeli = $_REQUEST['a_pmbli'];
			$jpembelian = $_REQUEST['j_pmbln'];
			$hperbiji = $_REQUEST['h_pbiji'];
			$htotal = $_REQUEST['h_total'];
			$sql = "INSERT INTO penjualan_tb(nama_pbl, kota_pbl, p_nama, p_jumlah, p_hsatuan, p_htotal) VALUES ('$npembeli', '$apembeli','$nproduk', '$jpembelian', '$hperbiji', '$htotal')";
			if($conn->query($sql) == TRUE){
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Sukses Menjual Produk</div>';
			}

			$sqlup = "UPDATE sparepart_tb SET p_tersedia = '$tersedia' WHERE p_id = '$pid'";
			$conn->query($sqlup);
		}
	}
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Penjualan Produk</h3>
	<?php
	
	?>
	<form action="" method="POST">
		<div class="form-group">
			<label for="p_id">ID Produk</label>
			<input type="text" class="form-control" name="p_id" id="p_id" value="<?php if(isset($row['p_id'])){echo $row['p_id'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="p_nama">Nama Produk</label>
			<input type="text" class="form-control" name="p_nama" id="p_nama" value="<?php if(isset($row['p_nama'])){echo $row['p_nama'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="n_pmbli">Nama Pembeli</label>
			<input type="text" class="form-control" name="n_pmbli" id="n_pmbli" value="">
		</div>
		<div class="form-group">
			<label for="a_pmbli">Alamat Pembeli</label>
			<input type="text" class="form-control" name="a_pmbli" id="a_pmbli" value="">
		</div>
		<div class="form-group">
			<label for="p_tersedia">Produk Tersedia</label>
			<input type="text" class="form-control" name="p_tersedia" id="p_tersedia" value="<?php if(isset($row['p_tersedia'])){echo $row['p_tersedia'];} ?>">
		</div>
		<div class="form-group">
			<label for="j_pmbln">Jumlah Pembelian</label>
			<input type="text" class="form-control" name="j_pmbln" id="j_pmbln" value="">
		</div>
		<div class="form-group">
			<label for="h_pbiji">Harga Per Item</label>
			<input type="text" class="form-control" name="h_pbiji" id="h_pbiji" value="<?php if(isset($row['p_hjual'])){echo $row['p_hjual'];} ?>">
		</div>
		<div class="form-group">
			<label for="h_total">Harga Total</label>
			<input type="text" class="form-control" name="h_total" id="h_total" value="">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="simpan" name="simpan">Simpan</button>
			<a href="teknisi.php" class="btn btn-secondary">Tutup</a>
		</div>
	</form>
	<?php if(isset($msg)) {echo $msg;} ?>
</div>
<?php
include('includes/footer.php');
?>