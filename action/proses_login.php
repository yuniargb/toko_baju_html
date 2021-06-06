<?php
// mengaktifkan session php
session_start();
// memanggil koneksi mysql
include('../koneksi.php');
if(!empty($_POST)){
    // $_POST['username'] dan $_POST['username'] diambil dari tag form input name yang berada di login ui php 
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == null || $password == null ){
        if($username == null){
            $pesan = 'username wajib diisi!';
        }elseif ($password == null) {
            $pesan = 'password wajib diisi!';
        }
        $_SESSION['pesan'] = $pesan;
        header("location:../index.php?page=login");
    }else{
        // menyeleksi data user dengan username dan password yang sesuai
        $result = mysqli_query($conn,"SELECT * FROM user where username='$username' and password='$password'");

        $cek = mysqli_num_rows($result);

        if($cek > 0) {
            $data = mysqli_fetch_assoc($result);
            //menyimpan session user, nama, status dan id login
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $data['nama'];
            header("location:../index.php?page=dashboard");
        } else {
            $pesan = 'user tidak ditemukan silahkan coba kembali!';
            $_SESSION['pesan'] = $pesan;
            header("location:../index.php?page=login");
        }
    }
}
