<?php
$servername = "localhost";
$database = "toko_baju";
$username = "root";
$password = "";

// koneksi dari variable diatas 
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// mysqli_close($conn);
?>