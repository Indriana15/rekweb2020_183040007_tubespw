<?php 
require 'function.php';
$conn = koneksi();

if( isset($_POST["register"])) {

	if(registrasi($_POST) > 0){
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		body {
			background-color: pink;
		}
		.container {
 			margin-top: 50px;
 			margin-left: 350px; 
 			padding-top: 50px;
 			padding-left: 10px;
 			padding-right: 40px;
 			width: 380px;
 			height: 250px;
 			background-color: lightskyblue;
 			text-align: center;
 		}
		label {
			display: block;
		}
		h1 {
			text-align: center;
			margin-right: 50px;
		}
		ul {
			text-align: center;
		}
		 button {
        background-color: pink;
        margin: auto;}
	</style>
</head>
<body>
	
<h1>Halaman Registrasi</h1>
<div class="container">
<form action="" method="post">
	
	<ul>
		
			<label for="username">Username :</label>
			<input type="text" name="username" id="username" autocomplete="off">
		
			<label for="password">Password :</label>
			<input type="password" name="password" id="password" autocomplete="off">
		
			<label for="password2">Konfirmasi Password :</label>
			<input type="password" name="password2" id="password2" autocomplete="off"><br>
		
			<button type="submit" name="register">Register!</button>
		
	</ul>

</form>
</div>
</body>
</html>