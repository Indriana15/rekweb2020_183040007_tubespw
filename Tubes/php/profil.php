<!DOCTYPE html>
<html>
<head>
    <title>Tugas Besar</title>
</head>
<style>
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
            background-color: aqua ;
        }
        h3{
            text-align : center;
            font-size : 30px;
        }
        th {
            background-color: blue;
        }
        button {margin-left: 650px}
    </style>
<body>
<?php 
    if (!isset($_GET['id'])) {
        header('location : ../latihan6c.php');
        exit;
    }
    require 'backend/function.php';
    $id=$_GET['id'];
    $b = query("SELECT * FROM film WHERE id = $id")[0];
 ?>
    <h3>INFORMASI FILM</h3>
    <table border="1px">
    <tr>
        <th>GAMBAR</th>
        <th>JUDUL FILM</th>
        <th>TANGGAL RILIS</th>
        <th>SUTRADARA</th>
        <th>PENULIS</th>
    </tr>
    <tr>
    <td><img width="250px" src="../assets/img/<?= $b['gambar']; ?>" alt ="gambar"></td>
   
    <td><?= $b['judul']; ?></td>
    
    <td><?= $b['tanggal_rilis']; ?></td>

    <td><?= $b['sutradara']; ?></td>

    <td><?= $b['penulis']; ?></td>
  
    </tr>
    </table>
    <form method="post">
    <button><a href="../index.php"> Kembali</a></button>
</form>
</body>
</html>