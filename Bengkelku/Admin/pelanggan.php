<?php
define('TITLE', 'Daftar Pelanggan');
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

<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">Daftar Pelanggan</p>
	<?php
			$sql= "SELECT * FROM customerlogin_tb";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
						echo '
							<table class="table">
								<thead>
									<tr>
										<th scope="col">ID Pelanggan</th>
										<th scope="col">Nama</th>
										<th scope="col">Email</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>';
									while($row = $result->fetch_assoc()){
									echo '<tr>';
										echo '<td>'.$row["r_login_id"].'</td>';
										echo '<td>'.$row["r_name"].'</td>';
										echo '<td>'.$row["r_email"].'</td>';
										echo '<td>';
										echo '<form action="EditPelanggan.php" method="POST" class="d-inline">';
											echo '<input type="hidden" name="id" value='.$row['r_login_id'].'><button class="btn btn-info mr-3" name="edit" value="Edit" type="submit"><i class="fa fa-pen"></i></button>';
										echo '</form>';
										echo '<form action="" method="POST" class="d-inline">';
											echo '<input type="hidden" name="id" value='.$row['r_login_id'].'><button class="btn btn-secondary mr-3" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
										echo '</form>';
										echo '</td>';
									echo '</tr>';
									}
								echo '</tbody>';
							echo '</table>';
					} else{
						echo '0 Hasil';
					}
	?>
</div>
<?php
if(isset($_REQUEST['delete'])){
	$sql = "DELETE FROM customerlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
	if($conn->query($sql) == TRUE){
		echo '<meta http-equiv="refresh" content= "0;URL=?deleted">';
	} else{
		echo 'Gagal menghapus data';
	}
}
?>
<?php
include('includes/footer.php');
?>