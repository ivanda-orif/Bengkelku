<?php
	define('TITLE', 'Profil Pengguna');
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
	// Nama dan Email
	$sql = "SELECT r_name, r_email FROM customerlogin_tb WHERE r_email = '$rEmail'";
	$result = $conn->query($sql);

	if($result->num_rows == 1){
		$row = $result->fetch_assoc();
		$rName = $row['r_name'];	
	}
	// Set Nama Baru
	if(isset($_REQUEST['nameupdate'])){
		if($_REQUEST['rName'] == ""){
			$passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Harap Isi Nama Anda</div>';
		} else{
			$rName = $_REQUEST['rName'];
			$sql = "UPDATE customerlogin_tb SET r_name = '$rName' WHERE r_email = '$rEmail'";
			if($conn->query($sql) == TRUE){
				$passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Nama Berhasil Dirubah</div>';
			} else{
				$passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Gagal Mengubah Nama!</div>';
			}
		}
	}
?>

<!-- Profil Customer -->
<div class="col-sm-6 mt-5">
	<form action="" method="POST" class="mx-5">
		<div class="form-group">
			<label for="rEmail">Email</label>
			<input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
		</div>
		<div class="form-group">
			<label for="rName">Nama</label>
			<input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName ?>">
		</div>
		<button type="submit" class="btn btn-danger" name="nameupdate">Simpan</button>
		<?php if(isset($passmsg)) {echo $passmsg;} ?>
	</form>
</div>

<?php
	include('includes/footer.php');
?>