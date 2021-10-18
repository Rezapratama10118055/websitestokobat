<?php 
$koneksi = mysqli_connect("localhost","root","","db_stokobat");
 




// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

function query($query){
 global $koneksi;
 $result = mysql_query($koneksi,$query);
 $row = [];
 while ($row = mysql_fetch_assoc($result)) {
 	
 	$row[] = $row;
 }
return $row; 

}
?>

