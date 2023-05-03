<?php
	define('TITLE', 'Ubah Sandi');
	define('PAGE', 'ProfilPengguna');
	include('includes/header.php');
	include('../dbConnection.php');
	// Check Login Status
	session_start();	
	if ($_SESSION['is_login']) {
		$rEmail = $_SESSION['rEmail'];
	} else{
		echo "<script> location.href='CustomerLogin.php' </script>";
	}
	// Show Email
	$sql = "SELECT r_password, r_email FROM customerlogin_tb WHERE r_email = '$rEmail'";
	$result = $conn->query($sql);

	if($result->num_rows == 1){
		$row = $result->fetch_assoc();
		$rPassword = $row['r_password'];	
	}
	// Set Password Baru
	if(isset($_REQUEST['passupdate'])){
		if($_REQUEST['rPassword'] == ""){
			$passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Harap Isi Password Anda</div>';
		} else{
			$rPassword = $_REQUEST['rPassword'];
			$sql = "UPDATE customerlogin_tb SET r_password = '$rPassword' WHERE r_email = '$rEmail'";
			if($conn->query($sql) == TRUE){
				$passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Password Berhasil Dirubah</div>';
			} else{
				$passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Gagal Mengubah Password!</div>';
			}
		}
	}
?>

<!-- Ganti Password -->
<div class="col-sm-6 mt-5">
	<form action="" method="POST" class="mx-5">
		<div class="form-group">
			<label for="rEmail">Email</label>
			<input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
		</div>
		<div class="form-group">
			<label for="rPassword">Password</label>
			<input type="password" class="form-control" placeholder="Password Baru" name="rPassword" id="rPassword" >
		</div>
		<button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Simpan</button>
		<button type="reset" class="btn btn-secondary mt-4">Reset</button>
		<?php if(isset($passmsg)) {echo $passmsg;} ?>
	</form>
</div>

<?php
	include('includes/footer.php');
?>