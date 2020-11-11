<?php 
require 'php/backend/function.php';

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

<html>
    <head>
        <title>Tugas Besar</title>
    </head>
    <style>
        .container {
            border: 1px solid black;
            text-align: center;
            background-color: #E0FFFF;
            margin-left: 450px;
            margin-right: 450px;
        }
        body {
            background-image: url(assets/img/trans.jpg);
        }
        h3{
            font-size : 60px;
            color: red;
        }
        .gambar {width: 50px};
        
        
    </style>
    <body>
    
        <h3 text align="Center">FILM TERFAVORIT</h3>
        <form action="" method="get">
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search..." autocomplete="off">
        <button type="submit" name="cari" id="cari">Search</button>
        <?php if(empty($film)) {
            echo "data tidak ditemukan";}?>
        </form>
        <button><a href="php/login.php">LOGIN</a></button>

        <div class="container">
        <?php
           foreach ($film as $b) : ?>
            <p><a href="php/profil.php?id=<?=$b['id']; ?>"><?= $b['judul']; ?></a></p>
            <?php endforeach ?>
        </div>
        
    
    </body>
</html>
