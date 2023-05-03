<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
	if(isset($_REQUEST['rEmail'])){
		$rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
		$rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));
		$sql = "SELECT r_email, r_password FROM customerlogin_tb WHERE r_email = '".$rEmail."' AND r_password = '".$rPassword."' limit 1";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$_SESSION['is_login'] = true;
			$_SESSION['rEmail'] = $rEmail;
			echo "<script> location.href='CustomerProfile.php'; </script>";
			exit;
		} else{
			$msg = '<div class="alert alert-danger mt-2">Email atau Password salah!</div>';
		}
	}
} else{
	echo "<script> location.href='CustomerProfile.php'; </script>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">  

  <title>Login</title>
</head>

<body>
	<div class="mb-3 mt-5 text-center" style="font-size: 30px;">
		<i class="fas fa-id-card"></i>
		<span>Login Member Bengkelku</span>
	</div>
	<p class="text-center" style="font-size: 20px;">#TimAntiMogok</p>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-sm-6 col-md-4">
				<form action="" class="shadow-lg p-4" method="POST">
					<div class="form-group">
						<i class="fas fa-envelope"></i><label for="email" class="font-weight-bold pl-2">Email</label>
						<input type="email" class="form-control" placeholder="Email" name="rEmail">						
					</div>
					<div class="form-group">
						<i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
						<input type="password" class="form-control" placeholder="Password" name="rPassword">
					</div>					
					<button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm">Login</button>
					<?php if(isset($msg)){echo $msg;} ?>				
				</form>
				<div class="text-center">
					<a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Kembali ke Halaman Utama</a>
				</div>
			</div>
		</div>
	</div>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/all.min.js"></script>
</body>
</html>