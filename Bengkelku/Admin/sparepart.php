<?php
define('TITLE', 'Suku Cadang');
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
?>
<!-- Coloumn 2(Tabel) -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">Daftar Produk/Suku Cadang</p>
	<?php
			$sql= "SELECT * FROM sparepart_tb";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
						echo '
							<table class="table">
								<thead>
									<tr>
										<th scope="col">ID Produk</th>
										<th scope="col">Nama</th>
										<th scope="col">Tersedia</th>
										<th scope="col">Total</th>
										<th scope="col">Harga Asli</th>
										<th scope="col">Harga Jual</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>';
									while($row = $result->fetch_assoc()){
									echo '<tr>';
										echo '<td>'.$row["p_id"].'</td>';
										echo '<td>'.$row["p_nama"].'</td>';
										echo '<td>'.$row["p_tersedia"].'</td>';
										echo '<td>'.$row["p_total"].'</td>';
										echo '<td>'.$row["p_hasli"].'</td>';
										echo '<td>'.$row["p_hjual"].'</td>';
										echo '<td>';
										echo '<form action="EditProduk.php" method="POST" class="d-inline">';
											echo '<input type="hidden" name="id" value='.$row['p_id'].'><button class="btn btn-info mr-3" name="edit" value="Edit" type="submit"><i class="fa fa-pen"></i></button>';
										echo '</form>';
										echo '<form action="" method="POST" class="d-inline">';
											echo '<input type="hidden" name="id" value='.$row['p_id'].'><button class="btn btn-secondary mr-3" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
										echo '</form>';
										echo '<form action="JualProduk.php" method="POST" class="d-inline">';
											echo '<input type="hidden" name="id" value='.$row['p_id'].'><button class="btn btn-success mr-3" name="jual" value="Jual" type="submit"><i class="fas fa-handshake"></i></button>';
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
	$sql = "DELETE FROM sparepart_tb WHERE p_id = {$_REQUEST['id']}";
	if($conn->query($sql) == TRUE){
		echo '<meta http-equiv="refresh" content= "0;URL=?deleted">';
	} else{
		echo 'Gagal menghapus data';
	}
}
?>

		</div><!-- End Row -->
		<div class="float-right"><a href="TambahProduk.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
	</div>	<!-- End Container -->

	<!-- Javascript -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/all.min.js"></script>

</body>
</html>