<?php 
require 'function.php';

$id = $_GET['id'];
$b = query("SELECT * FROM film WHERE id = $id")[0];

if (isset($_POST["ubah"])) {
		if (ubah($_POST) > 0) {
		echo "<script>
		alert('Data Berhasil diubah!');
		document.location.href = 'index.php';
		</script>";
	}else {
		echo "<script>
			alert('Data gagal diubah!');
			document.location.href = 'index.php';
			</script>";
	};
}	
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ubah Data Film</title>
 </head>
 <style>
		 body {
		 	background-image: url(../../assets/img/wall.jpg);
		 	background-color: pink;
		 }
 		.container {
 			margin-top: 50px;
 			margin-left: 400px; 
 			padding-top: 20px;
 			width: 400px;
 			height: 450px;
 			background-color: lightskyblue;
 			text-align: center;
 		}
        h3{
            font-size : 60px;
            color: white;
            text-align: center;
        }
 </style>
 
 <body>
 	<h3>UBAH DATA FILM</h3>

 	<div class="container">
 	<form action="" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id" value="<?= $b['id']; ?>">
 		<input type="hidden" name="gambarLama" value="<?= $b['gambar']; ?>">
 	<ul>
 		<li>
 			<label>Gambar :</label><br>
 			<img src="../../assets/img/<?= $b['gambar']; ?>" width="100"><br>
 			<input type="file" name="gambar">
 		</li>
 		<li>
 			<label>Judul Film :</label><br>
 			<input type="text" name="judul" required value="<?= $b['judul']; ?>" >
 		</li>
 		<li>
 			<label>Tanggal Rilis Film :</label><br>
 			<input type="text" name="tanggal_rilis" required value="<?= $b['tanggal_rilis']; ?>">
 		</li>
 		<li>
 			<label>Sutradara Film :</label><br>
 			<input type="text" name="sutradara"  required value="<?= $b['sutradara']; ?>">
 		</li>
 		<li>
 			<label>Penulis Film :</label><br>
 			<input type="text" name="penulis" required value="<?= $b['penulis']; ?>">
 		</li>
 		<li>
 			<button type="submit" name="ubah">Ubah Data!</button>
 		</li>
 		<li>
 			 <button class="back"><a href="index.php">Kembali</a></button>
 		</li>
 	</ul>
 	</form>
 </div>
 </body>
 </html>