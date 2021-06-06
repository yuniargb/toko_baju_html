<?php
// mengaktifkan session php
session_start();
// memanggil koneksi mysql
include('../koneksi.php');

$id = $_GET['id'];
$cek = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = ". $_GET['id']);
$data = mysqli_fetch_assoc($cek);
$folder = "../gambar/produk/".$data['gambar'];
$sql = "DELETE FROM produk WHERE id_produk = $id";

$result = mysqli_query($conn,$sql);

if($result) {
    if (file_exists($folder)) {
        unlink($folder);
    }
    $pesan = "Produk berhasil dihapus!";
}else{
    $pesan = 'produk gagal dihapus!';
}

$_SESSION['pesan'] = $pesan;
header("location:../index.php?page=dashboard");
    

