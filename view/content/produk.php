<?php
$sql = "SELECT * FROM produk ";
if(!empty($_GET['search'])){
    $s = $_GET['search'];
    $sql .= "WHERE nama LIKE '%$s%' OR tag LIKE '%$s%' OR kategori LIKE '%$s%'" ;
}
$result = mysqli_query($conn,$sql);

$cek = mysqli_num_rows($result);

?>
<div class="col-10">
    <h2 class="title">Produk</h2>
    <div class="grid">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-4">
            <div class="produk-card">
                <div class="badge">Hot</div>
                <div class="produk-tumb">
                    <img src="././gambar/produk/<?= $row['gambar']?>" alt="<?= $row['nama'] ?>">
                </div>
                <div class="produk-details">
                    <!-- <span class="produk-catagory">Women,bag</span> -->
                    <h4><a href="index.php?page=detail-produk&id=<?= $row['id_produk'] ?>"><?= $row['nama'] ?></a></h4>
                    <p><?= $row['deskripsi'] ?></p>
                    <div class="produk-bottom-details">
                        <div class="produk-price"><?= rupiah($row['harga']) ?></div>
                        <div class="produk-links">
                            <a href="index.php?page=detail-produk&id=<?= $row['id_produk'] ?>">DETAIL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
</div>
