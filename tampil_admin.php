<?php

include 'koneksi.php';
$result = mysqli_query($koneksi,"SELECT * FROM tblsaldoawal");
$result1 = mysqli_query($koneksi,"SELECT * FROM tblpuskesmastgpandan");
$result2 = mysqli_query($koneksi,"SELECT * FROM tblpuskesmassijuk");
// $result3 = mysqli_query($koneksi,"SELECT * FROM t_guru INNER JOIN t_kelas ON t_guru.id_guru = t_kelas.id_kelas");

$nobatch = mysqli_num_rows($result);
$nobattanjungpandan = mysqli_num_rows($result1);
$nobatsj = mysqli_num_rows($result2);
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
     <!-- mycss -->
    <link rel="stylesheet" href="csssaya.css" />
   


    <title>StokObat</title>
  </head>
  <body id="home">

  <?php 
  session_start();
 

  if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }
 
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #14279B">
  <div class="container">
    <a class="navbar-brand" href="#">StokObat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
       <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="#home"><i class="fas fa-home me-1"></i>Home</a>
            <a class="nav-link" href="#about"><i class="fas fa-address-card me-1"></i>About</a>
            <a class="nav-link" href="#project"><i class="fas fa-book me-1"></i>Project</a>
            <a class="nav-link" href="#galery"><i class="fas fa-image me-1"></i>Gallery</a>
            <a class="nav-link" href="#contact"><i class="fas fa-id-badge me-1"></i>Contect</a>
          </div>
    </div>
  </div>
</nav>



<div class="tag_name ml-2">
    <h1>Hello, Admin</h1>

    <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
<br>
</div>



<div class="row text-white ml-2 "> 
  <div class="card bg-info " style="width: 18rem; height: 15rem;">
   <div class="card-body">
    <div class="card-body-icon">
      <i class="fas fa-users mr-2"></i>
    </div>
    <h5 class="card-title">JUMLAH DATA PERSEDIAAN</h5>
    <div class="display-4"><b><?php echo $nobatch; ?></b></p></div>
  <a href="DaftarPersediaan.php"><p class="card-text text-white">Lihat Detail
    <i class="fas fa-angle-double-right ml-2"></i></p></a>
  </div>
  </div>


 <div class="card bg-success ml-2" style="width: 18rem;">
   <div class="card-body">
    <div class="card-body-icon">
   <i class="fas fa-book-open"></i>
    </div>
    <h5 class="card-title">Puskesmas Tanjung Pandan</h5>
    <div class="display-4"><b><?php echo $nobattanjungpandan; ?></b></div>
  <a href="matpel.php"><p class="card-text text-white">Lihat Detail
    <i class="fas fa-angle-double-right ml-2"></i></p></a>
  
  </div>
</div>


<div class="card bg-warning ml-2" style="width: 18rem;">
   <div class="card-body">
    <div class="card-body-icon">
   <i class="fas fa-user-tie"></i>
    </div>
    <h5 class="card-title">Puskesmas Sijuk</h5>
    <div class="display-4"><b><?php echo $nobatsj; ?></b></div>
  <a href="daftarguru.php"><p class="card-text text-white">Lihat Detail
    <i class="fas fa-angle-double-right ml-2"></i></p></a>
  
  </div>
</div>

<div class="card bg-warning ml-2" style="width: 18rem;">
   <div class="card-body">
    <div class="card-body-icon">
   <i class="fas fa-user-tie"></i>
    </div>
    <h5 class="card-title">Puskesmas Air Saga</h5>
    <div class="display-4"><b><?php echo $nobatsj; ?></b></div>
  <a href="daftarguru.php"><p class="card-text text-white">Lihat Detail
    <i class="fas fa-angle-double-right ml-2"></i></p></a>
  
  </div>
</div>




</div>

 <br>
   <h1 class="mt-3 ml-2">DAFTAR BARANG</h1><hr>
    </br>

<div class= tb_saldoakhir>
  <table  class="table table-bordered mt-2 " id ="tabledata">
  <thead class="thead-dark ">

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
       <td><?php
$row['unitpersediaan'] = ($row['jumlahunit'] + $row['unitpenerimaan']);
echo "".$row['unitpersediaan'];
?></td>
           <td><?php
$row['jumlahpersediaan'] = ($row['jumlahharga'] + $row['jumlahpenerimaan']);
echo "Rp.".$row['jumlahpersediaan'];
?></td>
      <td><?php echo $row['unitpengeluaran']; ?></td>
       <td><?php echo $row['jumlahpengeluaran']; ?></td>
         <td><?php
$row['unitsaldoakhir'] = ($row['unitpersediaan'] - $row['unitpengeluaran']);
echo "".$row['unitsaldoakhir'];
?></td>
    <td><?php
$row['jumlahsaldoakhir'] = ($row['jumlahpersediaan'] - $row['jumlahpengeluaran']);
echo "Rp.".$row['jumlahsaldoakhir'];
?></td>
       <td><?php echo $row['exp']; ?></td>
       
          
        </tr>
   <?php endwhile; ?>
  

  </tbody>
</table>


    </div> 





</div>
</div>

  



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>   
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#tabledata').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

        });
    });
</script>


<script type="text/javascript"> 
    $(document).ready(function () {
        $('#tabledataguru').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

        });
    });
</script>




    
  </body>
</html>
