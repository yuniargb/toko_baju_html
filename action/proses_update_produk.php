<?php
// mengaktifkan session php
session_start();
// memanggil koneksi mysql
include('../koneksi.php');
if(!empty($_POST)){
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $tag = $_POST['tag'];
    $tag = implode(",",$tag);
    // gambar
    $filename = $_FILES["gambar"]["name"];
    $tempname = $_FILES["gambar"]["tmp_name"];   
    
    
    if($nama == null || $deskripsi == null || $harga == null || $kategori == null || $tag == null){
        if($nama == null){
            $pesan = 'nama wajib diisi!';
        }elseif ($deskripsi == null) {
            $pesan = 'deskripsi wajib diisi!';
        }elseif ($harga == null) {
            $pesan = 'harga wajib diisi!';
        }elseif ($kategori == null) {
            $pesan = 'kategori wajib diisi!';
        }elseif ($tag == null) {
            $pesan = 'tag wajib diisi!';
        }
        $_SESSION['pesan'] = $pesan;
        header("location:../index.php?page=form_produk&id=". $id);
    }else{
        $cek = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = ". $_GET['id']);
        $data = mysqli_fetch_assoc($cek);
        
        if($_FILES['gambar']['size'] == 0) {
            $pesan = "Gambar tidak ada yang ditambahkan";
            $filename = $data['gambar'];
        }else{
            $temp = explode(".", $filename);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $folder = "../gambar/produk/".$newfilename;
            $filename = $newfilename;
            if (move_uploaded_file($tempname, $folder))  {
                $pesan = "Gambar berhasil ditambahkan";
            }else{
                $pesan = "Gambar tidak ada yang ditambahkan";
            }
        }
        // query input data
        $sql = "UPDATE produk SET nama = '$nama' ,deskripsi = '$deskripsi' ,harga = $harga,kategori = '$kategori',tag = '$tag' ,gambar = '$filename'
        WHERE id_produk = $id";
    
        $result = mysqli_query($conn,$sql);

        if($result) {
            
            $pesan = "Produk berhasil diubah dan " . $pesan;
            $_SESSION['pesan'] = $pesan;
            header("location:../index.php?page=dashboard");
        }else{
            $pesan = 'produk gagal diubah!';
            $_SESSION['pesan'] = $pesan;
            header("location:../index.php?page=form_produk");
        }
    }
    
    
    
}
