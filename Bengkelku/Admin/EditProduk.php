<?php
define('TITLE', 'Edit Produk');
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
	// Edit Data Produk
	if(isset($_REQUEST['edit'])){
		$sql = "SELECT * FROM sparepart_tb WHERE p_id = {$_REQUEST['id']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
			if(isset($_REQUEST['update'])){
			if(($_REQUEST['p_id'] == "") || ($_REQUEST['p_nama'] == "") || ($_REQUEST['p_tersedia'] == "")){
				$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Isi Semua Bagan</div>';
			} else{
				$id = $_REQUEST['p_id'];
				$name = $_REQUEST['p_nama'];
				$tersedia = $_REQUEST['p_tersedia'];
				$total = $_REQUEST['p_total'];
				$asli = $_REQUEST['p_hasli'];
				$jual = $_REQUEST['p_hjual'];
				$sql = "UPDATE sparepart_tb SET p_id = '$id', p_nama = '$name', p_tersedia = '$tersedia', p_total = '$total', p_hasli = '$asli' , p_hjual = '$jual' WHERE p_id = '$id'";
				if($conn->query($sql) == TRUE){
					$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Berhasil Memperbarui Data</div>';
				} else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Gagal Memperbarui Data</div>';
				}
			} 
		}
?>

<!-- Coloumn 2(Edit Teknisi) -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Edit Data Produk</h3>
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
			<label for="p_tersedia">Tersedia</label>
			<input type="text" class="form-control" name="p_tersedia" id="p_tersedia" value="<?php if(isset($row['p_tersedia'])){echo $row['p_tersedia'];} ?>">
		</div>
		<div class="form-group">
			<label for="p_total">Total</label>
			<input type="text" class="form-control" name="p_total" id="p_total" value="<?php if(isset($row['p_total'])){echo $row['p_total'];} ?>">
		</div>
		<div class="form-group">
			<label for="p_tersedia">Harga Asli</label>
			<input type="text" class="form-control" name="p_hasli" id="p_hasli" value="<?php if(isset($row['p_hasli'])){echo $row['p_hasli'];} ?>">
		</div>
		<div class="form-group">
			<label for="p_tersedia">Harga Jual</label>
			<input type="text" class="form-control" name="p_hjual" id="p_hjual" value="<?php if(isset($row['p_hjual'])){echo $row['p_hjual'];} ?>">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="update" name="update">Simpan</button>
			<a href="teknisi.php" class="btn btn-secondary">Tutup</a>
		</div>
	</form>
	<?php if(isset($msg)) {echo $msg;} ?>
</div>

<?php
include('includes/footer.php');
?>
