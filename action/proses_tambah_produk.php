<?php
// mengaktifkan session php
session_start();
// memanggil koneksi mysql
include('../koneksi.php');
if(!empty($_POST)){
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $tag = $_POST['tag'];
    $tag = implode(",",$tag);
    // gambar
    $filename = $_FILES["gambar"]["name"];
    $tempname = $_FILES["gambar"]["tmp_name"];   
    $folder = "../gambar/produk/".$filename;

    if($nama == null || $deskripsi == null || $harga == null || $kategori == null || $tag == null || $_FILES['gambar']['size'] == 0){
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
        }elseif ($_FILES['gambar']['size'] == 0) {
            $pesan = 'gambar wajib diisi!';
        }
        $_SESSION['pesan'] = $pesan;
        header("location:../index.php?page=form_produk");
    }else{
        
        $temp = explode(".", $filename);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $folder = "../gambar/produk/".$newfilename;
        $filename = $newfilename;
        
        // query input data
        $sql = "INSERT INTO produk (nama,deskripsi,harga,kategori,tag,gambar) 
        VALUES ('$nama','$deskripsi',$harga,'$kategori','$tag','$filename')";
    
        $result = mysqli_query($conn,$sql);

        if($result) {
            
            if (move_uploaded_file($tempname, $folder))  {
                $pesan = "Gambar berhasil ditambahkan";
            }else{
                $pesan = "Gambar gagal ditambahkan";
            }
            $pesan = "Produk berhasil ditambahkan dan " . $pesan;
            $_SESSION['pesan'] = $pesan;
            header("location:../index.php?page=dashboard");
        }else{
            $pesan = 'produk gagal ditambahkan!';
            $_SESSION['pesan'] = $pesan;
            header("location:../index.php?page=form_produk");
        }
    }
}
