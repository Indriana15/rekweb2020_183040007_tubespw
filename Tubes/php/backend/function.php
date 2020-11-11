<?php
// function untuk koneksi ke DB


function koneksi (){
    $conn = mysqli_connect("localhost", "root", "") or die ("Koneksi ke DB gagal");
    mysqli_select_db($conn, "pw_183040007") or die ("Database salah!");

    return $conn;
}
// end of function

//function untuk query

function query($sql) {
    $conn = koneksi();
    $results = mysqli_query($conn, "$sql");

    $rows = [];
    while ($row = mysqli_fetch_assoc($results)){
        $rows[]= $row;
    };

    return $rows;
}
// end of function
function tambah($data)
{
    $conn = koneksi();

    $gambar = upload();
    if( !$gambar){
        return false;
    }

    $judul = htmlspecialchars($data['judul']);
    $tanggal_rilis = htmlspecialchars($data['tanggal_rilis']);
    $sutradara = htmlspecialchars($data['sutradara']);
    $penulis = htmlspecialchars($data['penulis']);

    $query_tambah = "INSERT INTO film Values('','$gambar','$judul','$tanggal_rilis','$sutradara','$penulis')";

mysqli_query($conn, $query_tambah);

return mysqli_affected_rows($conn);
}


function upload (){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
         echo "<script>
                alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 5000000) {
         echo "<script>
                alert('ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, '../../assets/img/' . $namaFileBaru);

    return $namaFileBaru;

}


function hapus($ID) {
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM film WHERE ID = $ID");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi(0);

    $id = $data['id']; 
    $gambarLama = htmlspecialchars($data['gambarLama']);
    if ($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
         $gambar = upload();
    }

   
    $judul = htmlspecialchars($data['judul']);
    $tanggal_rilis = htmlspecialchars($data['tanggal_rilis']);
    $sutradara = htmlspecialchars($data['sutradara']);
    $penulis = htmlspecialchars($data['penulis']);

    $queryubah = "UPDATE film SET 
                    gambar = '$gambar',
                    judul = '$judul',
                    tanggal_rilis = '$tanggal_rilis',
                    sutradara = '$sutradara',
                    penulis = '$penulis'
                    WHERE id = '$id'";

mysqli_query($conn, $queryubah);

return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username yang dipilih sudah terdaftar!');
             </script>";
        return false;

    }

    // cek konfirmasi password
    if( $password != $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
             </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}


?>