<?php 
require 'function.php';
if (isset($_POST['submit'])) {
	if (tambah($_POST) > 0) {
		echo "<script>
		alert('Data Berhasil ditambahkan!');
		document.location.href = 'index.php';
		</script>";
	}else {
		echo "<script>
			alert('Data gagal ditambahkan!');
			document.location.href = 'index.php';
			</script>";
	}
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tambah Data Film</title>
 	<style>
 	body {
 		background-image: url(../../assets/img/background.jpg);
 		background-color: pink;
 	}
 		.container {
 			margin-top: 90px;
 			margin-left: 400px; 
 			padding-top: 50px;
 			width: 400px;
 			height: 400px;
 			background-color: lightskyblue;
 			text-align: center;
 		}
 	</style>
 </head>
 <style>
 	
 </style>
 <body>
 
<div class="container">
	 	<form action="" method="post" enctype="multipart/form-data">

 		<label for="gambar">Gambar :</label><br>
 		<input type="file" name="gambar" id="gambar"><br><br>
 		<label for="judul">Judul Film :</label><br>
 		<input type="text" name="judul" id="judul" autofocus="on" autocomplete="off"><br><br>
 		<label for="tanggal_rilis">Tanggal Rilis FIlm :</label><br>
 		<input type="text" name="tanggal_rilis" id="tanggal_rilis" autocomplete="off"><br><br>
 		<label for="sutradara">Sutradara Film :</label><br>
 		<input type="text" name="sutradara" id="sutradara" autocomplete="off"><br><br>
 		<label for="penulis">Penulis Film :</label><br>
 		<input type="text" name="penulis" id="penulis" autocomplete="off"><br><br>
 	
 		<input type="submit" name="submit" id="submit">
 		<button class="back"><a href="index.php">Kembali</a></button>
 	</form>
</div>

 </body>
 </html>