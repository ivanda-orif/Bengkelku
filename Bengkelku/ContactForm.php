<?php
if(isset($_REQUEST['contact'])){
		// Check Pengisian Form Field
		if(($_REQUEST['conname'] == "") || ($_REQUEST['consubject'] == "") || ($_REQUEST['conemail'] == "") || ($_REQUEST['conmessage'] == "")){
			$msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Harap Isi Semua Data</div>";
		} //Kirim Ke Database
		else{
			$conname = $_REQUEST['conname'];
			$consubject = $_REQUEST['consubject'];
			$conemail = $_REQUEST['conemail'];
			$conmessage = $_REQUEST['conmessage'];			
			$sql = "INSERT INTO contact_tb(nama, subjek, email, pesan) VALUES ('$conname', '$consubject', '$conemail', '$conmessage')";
			if($conn->query($sql) == TRUE){
				echo "<script>
							alert('Pesan Terkirim!');
							document.location='index.php';
					     </script>";
			} else{
				"<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Gagal Mengirim Pesan</div>";
			}
		}
	}
?>
<div class="col-md-8">
	<form action="" method="POST">
		<input type="text" class="form-control" name="conname" placeholder="Nama"><br>
		<input type="text" class="form-control" name="consubject" placeholder="Subjek"><br>
		<input type="text" class="form-control" name="conemail" placeholder="Email"><br>
		<textarea class="form-control" name="conmessage" placeholder="Apa yang bisa kami bantu?" style="height: 150px;"></textarea><br>
		<input type="submit" class="btn btn-primary" value="Send" name="contact"><br><br>
	</form>
</div>