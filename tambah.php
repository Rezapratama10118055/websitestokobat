<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Obat</title>
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
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Obat</h2>
		
		<hr>

		<?php
			 if(isset($_POST['hitung'])){
             $cek = mysqli_query($koneksi, "SELECT * FROM tblsaldoawal WHERE nobatch ='$nobatch'") or die(mysqli_error($koneksi));
     
             $jumlahunit = 0;
             $unitpenerimaan= 0;
             $no = 1;

     while ($r = $cek->fetch_assoc()) {
      // total adalah hasil dari harga x qty
      $unitpersediaan = $r['jumlahunit'] * $r['unitpenerimaan'];
      // total bayar adalah penjumlahan dari keseluruhan total
      $tot_bayar += $unitpersediaan;
			 }
			}
	
     ?>

		
		<?php
		if(isset($_POST['submit'])){
			$nobatch		= $_POST['nobatch'];
			$namaobat		= $_POST['namaobat'];
			$satuanunit		= $_POST['satuanunit'];
			$jumlahunit		= $_POST['jumlahunit'];
			$jumlahharga    = $_POST['jumlahharga'];
			$unitpenerimaan  	    = $_POST['unitpenerimaan'];
			$jumlahpenerimaan     	= $_POST['jumlahpenerimaan'];
			$unitpersediaan     	= $_POST['unitpersediaan'];
			$jumlahpersediaan     	= $_POST['jumlahpersediaan'];
            $unitpengeluaran  	    = $_POST['unitpengeluaran'];
			$jumlahpengeluaran     	= $_POST['jumlahpengeluaran'];
			$unitsaldoakhir     	= $_POST['unitsaldoakhir'];
			$jumlahsaldoakhir     	= $_POST['jumlahsaldoakhir'];
            $exp                    =$_POST['exp'];


			
			$cek = mysqli_query($koneksi, "SELECT * FROM tblsaldoawal WHERE nobatch ='$nobatch'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO tblsaldoawal(nobatch, namaobat, satuanunit, jumlahunit,jumlahharga,unitpenerimaan, jumlahpenerimaan,unitpersediaan,jumlahpersediaan,unitpengeluaran,jumlahpengeluaran,unitsaldoakhir,jumlahsaldoakhir,exp) VALUES('$nobatch','$namaobat', '$satuanunit','$jumlahunit' ,'$jumlahharga','$unitpenerimaan','$jumlahpenerimaan','$unitpersediaan','$jumlahpersediaan','$unitpengeluaran','$jumlahpengeluaran','$unitsaldoakhir','$jumlahsaldoakhir','$exp')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, no_induk sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nobatch</label>
				<div class="col-sm-10">
					<input type="text" name="nobatch" class="form-control" size="10" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Obat</label>
				<div class="col-sm-10">
					<input type="text" name="namaobat" class="form-control" size="10" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan Unit</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="satuanunit" value="Botol" required>
						<label class="form-check-label">Botol</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="satuanunit" value="Tablet" required>
						<label class="form-check-label">Tablet</label>
					</div>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Unit</label>
				<div class="col-sm-10">
					<input type="text" name="jumlahunit" class="form-control" required>
				</div>
			</div>



			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Harga</label>
				<div class="col-sm-10">
					<input type="text" name="jumlahharga" class="form-control" required>
				</div>
			</div>
		
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Penerimaan</label>
				<div class="col-sm-10">
					<input type="text" name="unitpenerimaan" class="form-control" value="<?= $unitpenerimaan ?>" required >
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Penerimaan</label>
				<div class="col-sm-10">
					<input type="text" name="jumlahpenerimaan" class="form-control" required>
				</div>
			</div>
		
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Persediaan</label>
				<div class="col-sm-10">
					<input type="text" name="unitpersediaan" class="form-control"  required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Persediaan</label>
				<div class="col-sm-10">
					<input type="text" name="jumlahpersediaan" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Pengeluaran</label>
				<div class="col-sm-10">
					<input type="text" name="unitpengeluaran" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Pengeluaran</label>
				<div class="col-sm-10">
					<input type="text" name="jumlahpengeluaran" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Unit Saldo Akhir</label>
				<div class="col-sm-10">
					<input type="text" name="unitsaldoakhir" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Saldo akhir</label>
				<div class="col-sm-10">
					<input type="text" name="jumlahsaldoakhir" class="form-control" required>
				</div>
			</div>

						
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Expaied Barang</label>
				<div class="col-sm-10">
					<input type="date" name="exp" class="form-control" required>
				</div>
			</div>
	





			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="hitung" class="btn btn-primary" value="HITUNG">

				</div>
			</div>

		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>