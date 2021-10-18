<!DOCTYPE html>
<html>
<head>
	<title>STOK OBAT</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>
<style>
	body {

  background-image: url('gambar/bglogin.jpg');
  background-size: cover;
  background-position: center;
	}
.kotak_login {
width: 300px;
height: 350px;
  background: #EDEDED;
  border-color: rgb(126, 122, 122);
  margin: 80px auto;
  padding: 30px 20px;
  box-shadow: 0px 0px 100px 4px #85d8ce;
   opacity: 0.9;
   border-radius: 20px;
}
.alert {
  background: #e44e4e;
  color: white;
  padding: 10px;
  text-align: center;
  border: 1px solid #b32929;
  opacity: 0.9;
}

h1 {
  text-align: center;
  font-family: 'Anton', sans-serif;
}

p {
  text-align: center;
  text-transform: uppercase;
  

}
.link{
	  font-family: 'Anton', sans-serif;
}
label {
	font-family: 'Anton', sans-serif;
}
.tombol_login{
	font-family: 'Anton', sans-serif;
	
}
.form_login{
	
	box-sizing : border-box;
	width: 100%;
	padding: 10px;
	font-size: 11pt;
	margin-bottom: 20px;
}
 
.tombol_login{
	background: #2aa7e2;
	color: white;
	font-size: 11pt;
	width: 100%;
	border: none;
	border-radius: 3px;
	padding: 10px 20px;
}

	</style>
<body>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login " >
           
		<p class="tulisan_login"><h1>Login</h1></p>
 
		<form action="cek_Login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="Masuk">
 
			<br/>
			<br/>
			<center>
				<a class="link" href="login.php">Kembali</a>
			</center>
		</form>
        
     


	</div>

 <?php
 if($_SERVER['REMOTE_ADDR']=="140.213.147.27") {
 ?> 
 <div> Username : [jelihin]
 <br> Password : [12345] 
 </div> 
 <?php
}
  ?>
 

</body>
</html>