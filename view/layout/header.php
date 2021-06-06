<?php
// mengaktifkan session php
session_start();
// memanggil koneksi mysql
include('./koneksi.php');

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.') . ',-';
	return $hasil_rupiah;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Baju</title>
    <link rel="stylesheet" href="css/style.css?v=1.2">
</head>
<body>
    <!-- menu -->
    <header>
        <div class="grid">
            <div class="col-6">
                <div class="menu-brand">
                    <img src="gambar/logo.jpg" alt="">
                </div>
            </div>
            <div class="col-6">
                <form action="index.php" method="get">
                <div class="form-cari">
                    <div class="col-10"><input type="text" name="search" placeholder="Cari Produk"></div>
                        <div class="col-2"><button type="submit">Cari</button></div>
                </div>
                </form>
                
            </div>
        </div>
        <?php
        if(!empty($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = null;
        }
        $active = 'class="active"';
        ?>
        <nav class="menu">
            <div class="container">
                <ul id="list-menu">
                    <?php if(empty($_SESSION['nama'])) { ?>
                    <li><a href="#">Home</a></li>
                    <li><a href="index.php" <?= $page == null || $page == 'detail-produk'  ? $active : '' ?> >Produk</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Kontak</a></li>
                    <li><a href="index.php?page=login" <?= $page == 'login'  ? $active : '' ?>>Login</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?page=dashboard" <?= $page == null || $page == 'dashboard' || $page == 'form_produk'  ? $active : '' ?> >Dashboard Produk</a></li>
                        <li><a onclick="return confirm('kamu yakin ingin keluar?')" href="././action/proses_logout.php">Logout</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
<main>
        <div class="grid">