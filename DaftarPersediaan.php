<?php

include 'koneksi.php';

$result = mysqli_query($koneksi,"SELECT * FROM tblsaldoawal");

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
   
   
        



  <title>Daftar siswa</title>
  </head>
  <body>



<?php 
	session_start();
 

	if($_SESSION['level']==""){
		header("location:login.php?pesan=gagal");
	}
 
	?>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#"><i class="fas fa-home mr-2 "></i>Daftar Persediaan Obat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
     <div class="navbar-nav ml-auto">
       
      

       
    </div>
  </div>
</nav>







<div class="df_saldo ml-3">

  <br>
   <h1 class="judul mt-5">DAFTAR OBAT</h1><hr>
    </br>

 <a href="tambah.php" class="btn btn-primary mr-3 mt-4"><i class= "fas fa-plus mr-2"></i></i>Tambah Data</a>

 <table  class="table table-bordered mt-2" id ="tabledata">
  <thead class="thead-dark">

    <tr>
     <th scope="col">No</th>
      <th scope="col">Nobatch</th>
      <th scope="col">Nama Obat</th>
       <th scope="col">Satuan Unit</th>
       <th scope="col">Jumlah Unit</th>
        <th scope="col">Jumlah Harga</th>
       <th scope="col">Unit Penerimaan</th>
       <th scope="col">Jumlah Penerimaan</th>
       <th scope="col">Unit Persediaan</th>
       <th scope="col">Jumlah Persediaan</th>
       <th scope="col">Unit Pengeluaran</th>
       <th scope="col">Jumlah Pengeluaran</th>
       <th scope="col">Unit Saldo Akhir</th>
       <th scope="col">Jumlah Saldo Akhir</th>
       <th scope="col">Exp</th>
        <th colspan="2" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    $no=1;

    while ($row = mysqli_fetch_assoc($result)): ?>


      <tr>
      <th scope="row"><?php echo $no++; ?></th>
  <td><?php echo $row['nobatch']; ?></td>
      <td><?php echo $row['namaobat']; ?></td>
      <td><?php echo $row['satuanunit']; ?></td>
      <td><?php echo $row['jumlahunit']; ?></td>
       <td>Rp.<?php echo $row['jumlahharga']; ?></td>
         <td><?php echo $row['unitpenerimaan']; ?></td>
      <td><?php echo $row['jumlahpenerimaan']; ?></td>
       <td><?php echo $row['unitpersediaan']; ?></td>
         <td><?php echo $row['jumlahpersediaan']; ?></td>
      <td><?php echo $row['unitpengeluaran']; ?></td>
       <td><?php echo $row['jumlahpengeluaran']; ?></td>
         <td><?php echo $row['unitsaldoakhir']; ?></td>
      <td>Rp.<?php echo $row['jumlahsaldoakhir']; ?></td>
       <td><?php echo $row['exp']; ?></td>
       
          <td><a href="edit.php?nobatch=<?= $row["nobatch"]; ?>"><i class="fas fa-edit bg-warning p-2 text-white rounded "></i></a></td>
         <td><a href="delete.php?nobatch=<?= $row["nobatch"]; ?>"><i class="fas fa-trash bg-danger p-2 text-white rounded" ></i></a></td>
        </tr>
   <?php endwhile; ?>
  

  </tbody>
</table>

</div>


</div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

   


  </body>
</html>
