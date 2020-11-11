<?php 
session_start();
require 'backend/function.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $id = $_SESSION['key'];
    }

// ambil username berdasarkan id
    // $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    // $row = mysqli_fetch_assoc($result);

// cek cookie dan username
    // if( $key === hash('sha256', $row['username'])) {
    //     $_SESSION['login'] = true;
    // }


// ini untuk mengecek apa kah user sudah login apa belum, jika sudah langsung diarahkan ke index
if(isset($_SESSION['login'])){
    header("Location:../index.php");
    exit;
}
// proses login
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
    // ini untuk pengecekan apakah username dan password cocok
    if(mysqli_num_rows($cek_user) > 0 ){
        $row = mysqli_fetch_assoc($cek_user);
        // cek password
        if($password == $row['password']){
            // jika berhasil login
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $row['id'];
            // jika kondisinya true, langsung pergi ke admin.php
            if($row['id'] == $_SESSION['hash']){

                // set session
                $_SESSION["login"] = true;

                // cek remember me
                if( isset($_POST['remember'])){
                    // buat cookie
                    setcookie('id', $row['id'], time()+ 60);
                    setcookie('key', hash('sha256', $row['username'], time()+60));
                }

                header("Location:../index.php");
                die;
            }
            header("Location:../index.php");
            die;
        }
    }
        $error = 'Usernama / Password Salah! ';
}


 ?>



<?php 
if(isset($_POST['submit'])){
    if($_POST['username'] == 'admin' && $_POST ['password'] == 'admin'){
        header("location: backend/index.php");
        exit;
    }else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<style>
    body {
        background-image: url(../assets/img/a.jpg);
        left: 500px;
    }
    .container {
            margin-top: 80px;
            margin-left: 440px; 
            padding-top: 40px;
            padding-right: 40px;
            width: 260px;
            height: 230px;
            background-color: lightskyblue;
            text-align: center;
    }
    label {
        display: block;
    }
    h1  {
        text-align: center;
        margin-left: 28px;
        color: white;
    }
    ul {
        text-align: center;
    }
    
    button {
        background-color: pink;
        margin: auto;}
</style>
<body>
    <h1>HALAMAN LOGIN</h1>
    <?php if(isset($error)): ?>
    <p style="color:red; font-style: italic;">Maaf, Username dan Password salah!</p>
    <?php endif ?>

        <div class="container">
        <form action="" method="post">


        <ul>
           
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" autocomplete="off"><br>
           
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" autocomplete="off"><br>
            
                <input type="checkbox" name="username" id="username">
                <label for="remember">Remember me :</label><br>

                <button><a href="../php/backend/index.php">Login</a></button>

                <button><a href="../php/backend/registrasi.php">Registrasi</a></button>
           
        </ul>

    </form>
</div>
</body>
</html>