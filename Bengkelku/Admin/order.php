<?php
define('TITLE', 'Pesanan Baru');
define('PAGE', 'PesananBaru');
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
<!-- coloumn 2(Card Pesanan) -->
<div class="col-sm-4 mb-5"  id="ref">
	<?php
	$sql = "SELECT request_id, tipe_mobil, d_masalah, kota_kec FROM buatpesanan_tb";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<div class="card mt-5 mx-5">';
				echo '<div class="card-header">';
					echo 'ID Pesanan: '.$row['request_id'];
				echo '</div>';
				echo '<div class="card-body">';
					echo '<h5 class="card-title">Tipe Mobil: '.$row['tipe_mobil'];
					echo '</h5>';
					echo '<p class="card-text">'.$row['d_masalah'];
					echo '</p>';
					echo '<p class="card-text">'.$row['kota_kec'];
					echo '</p>';
					echo '<div class="float-right">';
						echo '<form action="" method="POST">';
						echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
							echo '<input type="submit" class= "btn btn-danger mr-3" value="Lihat" name="lihat">';
							//echo '<input type="submit" class= "btn btn-secondary" value="Tutup" name="tutup">';
						echo '</form>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	}
	?>
</div>

<?php
if(isset($_REQUEST['lihat'])){
	$sql = "SELECT * FROM buatpesanan_tb WHERE request_id = {$_REQUEST['id']}"; 
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();	
}

// Input Data dari buatpesanan_tb ke form, kemudian dikirim ke pesananditerima_tb
if(isset($_REQUEST['terima'])){
	if(($_REQUEST['teknisitugas'] == "")){
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Harap Isi Semua Bagan</div>';
	} else{
		$rid = $_REQUEST['requestid'];
		$tmobil = $_REQUEST['tipemobil'];
		$dmasalah = $_REQUEST['desmasalah'];
		$nlengkap = $_REQUEST['namalengkap'];
		$nhp = $_REQUEST['nomorhp'];
		$kkec = $_REQUEST['kotakec'];
		$kpos = $_REQUEST['kodepos'];
		$lalamat = $_REQUEST['lokalamat'];
		$ttugas = $_REQUEST['teknisitugas'];
		$sql = "INSERT INTO pesananditerima_tb (request_id, tipe_mobil, d_masalah, nama_lengkap, nomor_hp, kota_kec, kode_pos, lok_alamat, teknisi_t) VALUES ('$rid', '$tmobil', '$dmasalah', '$nlengkap', '$nhp', '$kkec', '$kpos', '$lalamat', '$ttugas')";
		if($conn->query($sql) == TRUE){
			//Menghapus data dari buatpesanan_tb
			$sql = "DELETE FROM buatpesanan_tb WHERE request_id = {$_REQUEST['requestid']}";
			if($conn->query($sql) == TRUE){
				echo "<script>
							alert('Pesanan Diterima, Silahkan Menuju Ke Lokasi!');
							document.location='order.php';
					     </script>";
			} else{
				echo "Gagal Menghapus";
			}
		} else {
			$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Gagal Menerima Pesanan</div>';
		}
	}
}
?>

<!-- coloumn 3(Form Menerima Pesanan) -->
<div class="col-sm-5 mt-5">
	<form class="jumbotron" action="" method="POST">
		<h5 class="text-center">Penerimaan Pesanan Pelanggan</h5>
		<div class="form-group">
			<label for="request_id">ID Pesanan</label>
			<input type="text" class="form-control" id="request_id" name="requestid" value="<?php if(isset($row['request_id'])) echo $row['request_id']; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="inputTipeMobil">Tipe Mobil</label>
			<input type="text" class="form-control" id="inputTipeMobil" name="tipemobil" value="<?php if(isset($row['tipe_mobil'])) echo $row['tipe_mobil']; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="inputDeskripsiMasalah">Deskripsi Permasalahan</label>
			<textarea type="text" class="form-control" id="inputDeskripsiMasalah" name="desmasalah" readonly><?php if(isset($row['d_masalah'])) echo $row['d_masalah']; ?></textarea>
		</div>		
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputNama">Nama Pelanggan</label>
				<input type="text" class="form-control" id="inputNama" name="namalengkap" value="<?php if(isset($row['nama_lengkap'])) echo $row['nama_lengkap']; ?>" readonly>
			</div>
			<div class="form-group col-md-6">
				<label for="inputNomor">Nomor HP</label>
				<input type="text" class="form-control" id="inputNomor" name="nomorhp" value="<?php if(isset($row['nomor_hp'])) echo $row['nomor_hp']; ?>" readonly>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-9">
				<label for="inputKota">Kota atau Kecamatan</label>
				<input type="text" class="form-control" id="inputKota" name="kotakec" value="<?php if(isset($row['kota_kec'])) echo $row['kota_kec']; ?>" readonly>
			</div>
			<div class="form-group col-md-3">
				<label for="inputKodePos">Kode Pos</label>
				<input type="text" class="form-control" id="inputKodePos" name="kodepos" value="<?php if(isset($row['kode_pos'])) echo $row['kode_pos']; ?>" readonly>
			</div>		
		</div>
		<div class="form-group">
			<label for="inputAlamat">Alamat</label>
			<textarea type="text" class="form-control" id="inputAlamat" name="lokalamat" readonly><?php if(isset($row['lok_alamat'])) echo $row['lok_alamat']; ?></textarea>
		</div>
		<div class="form">
			<label for="inputTeknisi">Teknisi Bertugas</label>
			<input type="text" class="form-control" id="inputTeknisi" name="teknisitugas">
		</div>
		<div class="float-right mt-3">
			<button type="submit" class="btn btn-success" name="terima">Terima</button>			
			<button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
		</div>
	</form>
	<?php if(isset($msg)){echo $msg;} ?>
</div>
<?php
include('includes/footer.php');
?>
