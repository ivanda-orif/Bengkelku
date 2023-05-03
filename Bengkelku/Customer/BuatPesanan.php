<?php
	define('TITLE', 'Pesanan Baru');
	define('PAGE', 'PesananBaru');
	include('includes/header.php');
	include('../dbConnection.php');
	// Check Login Status
	session_start();	
	if ($_SESSION['is_login']) {
		$rEmail = $_SESSION['rEmail'];
	} else{
		echo "<script> location.href='CustomerLogin.php' </script>";
	}

	if(isset($_REQUEST['submitrequest'])){
		// Check Pengisian Form Field
		if(($_REQUEST['tipemobil'] == "") || ($_REQUEST['desmasalah'] == "") || ($_REQUEST['namalengkap'] == "") || ($_REQUEST['nomorhp'] == "") || ($_REQUEST['kotakec'] == "") || ($_REQUEST['kodepos'] == "") || ($_REQUEST['lokalamat'] == "")){
			$msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Harap Isi Semua Data</div>";
		} //Kirim Ke Database
		else{
			$tmobil = $_REQUEST['tipemobil'];
			$dmasalah = $_REQUEST['desmasalah'];
			$nlengkap = $_REQUEST['namalengkap'];
			$nhp = $_REQUEST['nomorhp'];
			$kkec = $_REQUEST['kotakec'];
			$kpos = $_REQUEST['kodepos'];
			$lalamat = $_REQUEST['lokalamat'];
			$sql = "INSERT INTO buatpesanan_tb(tipe_mobil, d_masalah, nama_lengkap, nomor_hp, kota_kec, kode_pos, lok_alamat)VALUES('$tmobil', '$dmasalah', '$nlengkap', '$nhp', '$kkec', '$kpos', '$lalamat')";
			if($conn->query($sql) == TRUE){
				$genid = mysqli_insert_id($conn);
				$msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Pesanan Berhasil Dibuat</div>";
				$_SESSION['myid'] = $genid;
				echo "<script> location.href='SuksesMemesan.php' </script>";
			} else{
				"<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Gagal Membuat Pesanan</div>";
			}
		}
	}
?>

<!-- Coloumn 2 (Buat Pesanan) -->
<div class="col-sm-9 col-md-10 mt-5">
	<form class="mx-5" action="" method="POST">
		<div class="form-group">
			<label for="inputTipeMobil">Tipe Mobil</label>
			<input type="text" class="form-control" id="inputTipeMobil" placeholder="Masukkan Tipe dan Tahun Mobil" name="tipemobil">
		</div>
		<div class="form-group">
			<label for="inputDeskripsiMasalah">Deskripsi Permasalahan</label>
			<textarea class="form-control" id="inputDeskripsiMasalah" placeholder="Masukkan Deskripsi Permasalahan Anda Secara Detail" name="desmasalah"></textarea>
		</div>		
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputNama">Nama Anda</label>
				<input type="text" class="form-control" id="inputNama" placeholder="Masukkan Nama Lengkap Anda" name="namalengkap">
			</div>
			<div class="form-group col-md-6">
				<label for="inputNomor">Nomor HP</label>
				<input type="number" min="800000000" max="89999999999" class="form-control" id="inputNomor" placeholder="Misal: 085xxxxxxxxx" name="nomorhp">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-9">
				<label for="inputKota">Kota atau Kecamatan</label>
				<input type="text" class="form-control" id="inputKota" name="kotakec">
			</div>
			<div class="form-group col-md-3">
				<label for="inputKodePos">Kode Pos</label>
				<input type="number" min="10110" max="99976" class="form-control" id="inputKodePos" name="kodepos">
			</div>		
		</div>
		<div class="form-group">
			<label for="inputAlamat">Alamat</label>
			<textarea class="form-control"  style="height: 150px;" id="inputAlamat" placeholder="Masukkan Alamat Atau Lokasi Anda Secara Detail" name="lokalamat"></textarea>
		</div>
		<button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
		<button type="reset" class="btn btn-secondary">Reset</button>
	</form>
	<?php if(isset($msg)){echo $msg;} ?>
</div>



<?php
include('includes/footer.php');
?>