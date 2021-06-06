<!-- memanggil file proses produk -->
<?php
$result = mysqli_query($conn,"SELECT * FROM produk");

$cek = mysqli_num_rows($result);

?>
<!-- ui login -->
<div class="col-12">
    <div class="card w-100 m-auto">
        <h4 class="text-center">LIST PRODUK</h4>
        	
        <a href="index.php?page=form_produk" class="btn-primary">TAMBAH DATA</a>
        <?php if(isset($_SESSION['pesan'])) {  ?>
        <br>
        <br>
        <label style="color:green;"><?php echo $_SESSION['pesan']; ?></label>
        <?php } ?>
        <table class="table">
            <thead>
                <th>ID PRODUK</th>
                <th>NAMA</th>
                <th>DESKRIPSI</th>
                <th>GAMBAR</th>
                <th>HARGA</th>
                <th>KATEGORI</th>
                <th>TAG</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id_produk'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td><img src="././gambar/produk/<?= $row['gambar'] ?>" width="50" height="50"/></td>
                    <td><?= rupiah($row['harga'])  ?></td>
                    <td><?= $row['kategori'] ?></td>
                    <td><?= $row['tag'] ?></td>
                    <td>
                        <a href="index.php?page=form_produk&id=<?= $row['id_produk'] ?>" class="btn-primary">Edit</a>
                        <a onclick="return confirm('kamu yakin ingin menghapus data ini?')" href="././action/proses_hapus_produk.php?id=<?= $row['id_produk'] ?>" class="btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
