<?php
define('TITLE', 'Edit Pelanggan');
define('PAGE', 'DaftarPelanggan');
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

<!-- Coloumn 2(Edit Pelanggan) -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Edit Data Pelanggan</h3>
	<?php
	if(isset($_REQUEST['edit'])){
		$sql = "SELECT * FROM customerlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
			if(isset($_REQUEST['update'])){
			if(($_REQUEST['r_login_id'] == "") || ($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "")){
				$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Isi Semua Bagan</div>';
			} else{
				$id = $_REQUEST['r_login_id'];
				$name = $_REQUEST['r_name'];
				$email = $_REQUEST['r_email'];
				$sql = "UPDATE customerlogin_tb SET r_login_id = '$id', r_name = '$name', r_email = '$email' WHERE r_login_id = '$id'";
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
			<label for="r_login_id">ID Pelanggan</label>
			<input type="text" class="form-control" name="r_login_id" id="r_login_id" value="<?php if(isset($row['r_login_id'])){echo $row['r_login_id'];} ?>" readonly>
		</div>
		<div class="form-group">
			<label for="r_name">Nama Lengkap</label>
			<input type="text" class="form-control" name="r_name" id="r_name" value="<?php if(isset($row['r_name'])){echo $row['r_name'];} ?>">
		</div>
		<div class="form-group">
			<label for="r_email">Email</label>
			<input type="text" class="form-control" name="r_email" id="r_email" value="<?php if(isset($row['r_email'])){echo $row['r_email'];} ?>">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="update" name="update">Simpan</button>
			<a href="pelanggan.php" class="btn btn-secondary">Tutup</a>
		</div>
	</form>
	<?php if(isset($msg)) {echo $msg;} ?>
</div>

<?php
include('includes/footer.php');
?>
