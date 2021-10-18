<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT DATA Siswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">SEKOLAH KITE</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="tampil_admin.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Persediaan</h2>
		
		<hr>
		
		<?php
		
		if(isset($_GET['nobatch'])){
			
			$nobatch = $_GET['nobatch'];
			
			
			$select = mysqli_query($koneksi, "SELECT * FROM tblsaldoawal WHERE nobatch='$nobatch'") or die(mysqli_error($koneksi));
			
			
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			
			}else{
				
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		
		if(isset($_POST['submit'])){
			$nobatch = $_POST['nobatch'];
			$namaobat		= $_POST['namaobat'];
			$satuanunit		= $_POST['satuanunit'];
			$jumlahunit		= $_POST['jumlahunit'];
			$jumlahharga    = $_POST['jumlahharga'];
			$unitpenerimaan = $_POST['unitpenerimaan'];
			
			
			$sql = mysqli_query($koneksi, "UPDATE tblsaldoawal SET namaobat ='$namaobat',jumlahunit='$jumlahunit', jumlahharga='$jumlahharga',unitpenerimaan ='$unitpenerimaan' WHERE nobatch='$nobatch'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="DaftarPersediaan.php?nobatch ='.$nobatch.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?nobatch=<?php echo $nobatch; ?>" method="post">
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nobatch</label>
				<div class="col-sm-10">
					<input type="text" name="nobatch" class="form-control" size="10" value="<?php echo $data["nobatch"]; ?>" readonly required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Obat</label>
				<div class="col-sm-10">
					<input type="text" name="namaobat" class="form-control" size="10" value="<?php echo $data["namaobat"]; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Unit</label>
				<div class="col-sm-10">
					<input type="text" name="jumlahunit" class="form-control" value="<?php echo $data["jumlahunit"]; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Harga</label>
				<div class="col-sm-10">
					<input type="text" name="jumlahharga" class="form-control" value="<?php echo $data["jumlahharga"]; ?>" required>
				</div>
			</div>

				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Penerima</label>
				<div class="col-sm-10">
					<input type="text" name="unitpenerimaan" class="form-control" value="<?php echo $data["unitpenerimaan"]; ?>" required>
				</div>
			</div>



		
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="DaftarPersediaan.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>