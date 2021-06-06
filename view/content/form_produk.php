<!-- memanggil file proses produk -->
<?php 
    $nama = '';
    $deskripsi = '';
    $harga = '';
    $kategori = '';
    $tag = [''];
    if(!empty($_GET['id'])){
        $title = 'EDIT';
        $action = '././action/proses_update_produk.php?id='. $_GET['id'];

        $result = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = ". $_GET['id']);

        $cek = mysqli_num_rows($result);
    
        if($cek > 0) {
            $data = mysqli_fetch_assoc($result);
            $nama =  $data['nama'];
            $deskripsi =  $data['deskripsi'];
            $harga =  $data['harga'];
            $kategori =  $data['kategori'];
            $tag =  explode(",",$data['tag']) ;
        } else {
            $pesan = 'user tidak ditemukan silahkan coba kembali!';
        }
    }else{
        $title = 'TAMBAH';
        $action = '././action/proses_tambah_produk.php';
    }
?>
<!-- ui login -->
<div class="col-12">
    <div class="card w-100 m-auto">
        <h4 class="text-center"><?= $title ?> PRODUK</h4>
        <a href="index.php?page=dashboard" class="btn-danger">KEMBALI</a>
        <?php if(isset($_SESSION['pesan'])) {  ?>
        <br>
        <br>
        <label style="color:red;"><?php echo $_SESSION['pesan']; ?></label>
        <?php } ?>
        
        <form action="<?= $action ?>" method="post" class="form-produk" enctype="multipart/form-data">
            <div class="grid">
                <div class="col-6">
                    <input type="nama" name="nama" class="form-control" value="<?= $nama ?>" placeholder="nama" >
                </div>
                <div class="col-6">
                <input type="deskripsi" name="deskripsi" class="form-control" value="<?= $deskripsi ?>" placeholder="deskripsi" >
                </div>
                <div class="col-6">
                    <input type="file" name="gambar" class="form-control" placeholder="gambar">
                </div>
                <div class="col-6">
                    <input type="number" name="harga" class="form-control" value="<?= $harga ?>" placeholder="harga" >
                </div>
                <div class="col-12">
                    <select name="kategori" id="kategori" class="form-control" >
                        <option value="T-SHIRT" <?= $kategori == 'T-SHIRT' ? 'selected' : '' ?>>T-SHIRT</option>
                        <option value="JAKET" <?= $kategori == 'JAKET' ? 'selected' : '' ?>>JAKET</option>
                        <option value="CELANA" <?= $kategori == 'CELANA' ? 'selected' : '' ?>>CELANA</option>
                        <option value="AKSESORIS" <?= $kategori == 'AKSESORIS' ? 'selected' : '' ?>>AKSESORIS</option>
                    </select>
                </div>
                <div class="col-12">
                    <hr>
                    <?php foreach($tag as $t){ ?>
                        <input type="text" name="tag[]" class="form-control" value="<?= $t ?>" placeholder="tag" >

                    <?php } ?>
                    <div id="multiple-tag"></div>
                    <button type="button" class="btn-primary" onclick="clickTag()">TAMBAH TAG</button>
                </div>
            </div>
            <button type="submit" class="btn-primary w-100">SIMPAN</button>
        </form>
    </div>
</div>
</div>

<script>
    function clickTag(){ 
        const bottomText = `
        <input type="text" name="tag[]" class="form-control" placeholder="tag" >
        `;
        document.getElementById("multiple-tag").insertAdjacentHTML("beforeend",bottomText)
    }
</script>