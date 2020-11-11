<?php 
session_start(); 

if( isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'function.php';
if (isset($_GET['cari'])) {
	$keyword = $_GET['keyword'];
	$film = query("SELECT * FROM film WHERE 
		judul LIKE '%$keyword%' OR 
		tanggal_rilis LIKE '%$keyword%' OR 
		sutradara LIKE '%$keyword%' OR 
		penulis LIKE '%$keyword%' ");
}else{
$film = query("SELECT * FROM film") ;}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
 <style>
 		.ubah {
 			background-color: cyan;
 		}
 		.hapus {
 			background-color: red;
 		}
        body{
            background-color: pink;
        }
        table {
            border : 1px solid black;
            text-align: center;
            font-size: 20px;
        }
        td{
            padding : 15px;
            background-color: lightblue;
        }
        h1 {
        	text-align: center;    
        }
        h3{
            text-align : center;
            font-size : 30px;
        }
        th {
            background-color: blue;
            color : white;
        }
        
    </style>

<body>
	<form action="" method="get">
		<input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search..." autocomplete="off">
		<button type="submit" name="cari" id="cari">Search</button>
	<button><a href="tambah.php">Tambah Data</a></button>
	
	</form>


	
	<br><br>
	<h1>FILM TERFAVORIT</h1>
	<table border="1px" cellpadding="2px">
		<thead>
			<tr>	
				<th>#</th>
				<th>OPSI</th>
				<th>GAMBAR</th>
				<th>JUDUL FILM</th>
				<th>TANGGAL RILIS</th>
				<th>SUTRADARA</th>
				<th>PENULIS</th>
			</tr>
		</thead>
			<tbody>
				<?php if(empty($film)) : ?>
					<tr>
						<td colspan="7">
							<h1 align="center">Data tidak ditemukan</h1>
						</td>
					</tr>
				<?php else : ?>
				<?php $no=1; ?>
				<?php foreach ($film as $b):?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td>
							<button class="hapus"><a href="hapus.php?id=<?=$b['id'];?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?');">Hapus</a></button>
							<button class="ubah"><a href="ubah.php?id= <?= $b['id'];?>">Ubah</a>  </button>
						</td>
						<td> <img width="200px" src="../../assets/img/<?php echo $b['gambar'] ?>">
						</td>
						<td align="center">
							<?php echo $b['judul']; ?>
						</td>
						<td align="center">
							<?php echo $b['tanggal_rilis']; ?>
						</td>
						<td align="center">
							<?php echo $b['sutradara']; ?>
						</td>
						<td align="center">
							<?php echo $b['penulis']; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
	</table>

</body>

		<button ><a href="../logout.php">Logout<Logout></button>

</html>