<?php

include('koneksi.php');
 


if(isset($_GET['nobatch'])){
	
	$nobatch = $_GET['nobatch'];
	
	

	$cek = mysqli_query($koneksi, "SELECT * FROM tblsaldoawal WHERE nobatch='$nobatch'") or die(mysqli_error($koneksi));
	
	
	if(mysqli_num_rows($cek) > 0){
		

		$del = mysqli_query($koneksi, "DELETE  FROM tblsaldoawal WHERE nobatch='$nobatch'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="DaftarPersediaan.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="login.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="login.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="login.php";</script>';
}
 
?>