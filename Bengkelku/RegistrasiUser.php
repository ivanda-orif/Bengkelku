<?php
include('dbConnection.php');
if(isset($_REQUEST['rSignup'])){
	// Checking Data Input
	if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail']) == "" || ($_REQUEST['rPassword']) == ""){
		$regmsg = '<div class="alert alert-warning mt-2" role="alert">Semua Data Harus Diisi</div>';
	} else{
		// Checking Email Pengguna
		$sql = "SELECT r_email FROM customerlogin_tb WHERE r_email = '".$_REQUEST['rEmail']."'";
		$result = $conn->query($sql);
		if ($result->num_rows==1) {
			$regmsg = '<div class="alert alert-danger mt-2" role="alert">Email Sudah Digunakan</div>';
		} else{
			// Mengirim Data Pengguna
			$rName = $_REQUEST['rName'];
			$rEmail = $_REQUEST['rEmail'];
			$rPassword = $_REQUEST['rPassword'];
			$sql = "INSERT INTO customerlogin_tb(r_name, r_email, r_password) VALUES('$rName', '$rEmail', '$rPassword')";
			if($conn->query($sql) == TRUE){
				$regmsg = '<div class="alert alert-success mt-2" role="alert">Akun Berhasil Dibuat</div>';
			} else{
				$regmsg = '<div class="alert alert-danger mt-2" role="alert">Gagal Mendaftarkan Akun</div';
			}
		}
	}	
}
?>

<div class="container pt-5">
	<h2 class="text-center">Buat Akun Baru</h2>
	<div class="row mt-4 mb-4">
		<div class="col-md-6 offset-md-3">
			<form action="" class="shadow-lg p-4" method="POST">
				<div class="form-group">
					<i class="fas fa-user"></i>
					<label for="name" class="font-weight-bold pl-2">Nama</label><input type="text" class="form-control" placeholder="Nama" name="rName">
				</div>
				<div class="form-group">
					<i class="fas fa-envelope"></i>
					<label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail">
					<small class="form-text">Kami tidak akan membagikan data pribadi Anda ke pihak manapun.</small>
				</div>
				<div class="form-group">
					<i class="fas fa-key"></i>
					<label for="pass" class="font-weight-bold pl-2">Password Baru</label><input type="password" class="form-control" placeholder="Password" name="rPassword">
				</div>
				<button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Daftar</button>
				<em style="font-size: 10px;">Dengan mengklik daftar, Anda menyetujui persyaratan, kebijakan data, dan kebijakan cookie kami</em>
				<?php if(isset($regmsg)) {echo $regmsg;} ?>
			</form>
		</div>
	</div>
</div>