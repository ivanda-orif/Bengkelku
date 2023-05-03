<?php
define('TITLE', 'Edit Teknisi');
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
?>

<!-- Coloumn 2(Edit Teknisi) -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Edit Data Teknisi</h3>
	<?php
	if(isset($_REQUEST['edit'])){
		$sql = "SELECT * FROM daftarteknisi_tb WHERE tek_id = {$_REQUEST['id']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
			if(isset($_REQUEST['update'])){
			if(($_REQUEST['tek_id'] == "") || ($_REQUEST['tek_nama'] == "") || ($_REQUEST['tek_kota'] == "")){
				$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Isi Semua Bagan</div>';
			} else{
				$id = $_REQUEST['tek_id'];
				$name = $_REQUEST['tek_nama'];
				$kota = $_REQUEST['tek_kota'];
				$hp = $_REQUEST['tek_hp'];
				$email = $_REQUEST['tek_email'];
				$sql = "UPDATE daftarteknisi_tb SET tek_id = '$id', tek_nama = '$name', tek_kota = '$kota', tek_hp = '$hp', tek_email = '$email' WHERE tek_id = '$id'";
				if($conn->query($sql) == TRUE){
					$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Berhasil Memperbarui Data</div>';
				} else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Gagal Memperbarui Data</div>';
				}
			} 
		}

	?>
	<form action="" method="POST">
		<div class="form-group">
			<label for="tek_id">ID Teknisi</label>
			<input type="text" class="form-control" name="tek_id" id="tek_id" value="<?php if(isset($row['tek_id'])){echo $row['tek_id'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="tek_nama">Nama Lengkap</label>
			<input type="text" class="form-control" name="tek_nama" id="tek_nama" value="<?php if(isset($row['tek_nama'])){echo $row['tek_nama'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="tek_kota">Kota</label>
			<input type="text" class="form-control" name="tek_kota" id="tek_kota" value="<?php if(isset($row['tek_kota'])){echo $row['tek_kota'];} ?>">
		</div>
		<div class="form-group">
			<label for="tek_hp">No HP</label>
			<input type="text" class="form-control" name="tek_hp" id="tek_hp" value="<?php if(isset($row['tek_hp'])){echo $row['tek_hp'];} ?>">
		</div>
		<div class="form-group">
			<label for="tek_kota">Email</label>
			<input type="text" class="form-control" name="tek_email" id="tek_email" value="<?php if(isset($row['tek_email'])){echo $row['tek_email'];} ?>">
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
