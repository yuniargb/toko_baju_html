<?php 
$result = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = ". $_GET['id']);
$data = mysqli_fetch_assoc($result);
?>
<div class="col-12">
<div class="container">
            <div class="grid">
                <div class="col-4">
                    <img src="././gambar/produk/<?= $data['gambar']?>" class="detail-gambar">
                </div>
                <div class="col-8">
                    <div class="detail-deskripsi">
                        <table border="0">
                            <tr>
                                <th width="100%"><?= $data['nama']; ?></th>
                                <th><a href="index.php">Kembali</a></th>
                            </tr>  
                            <tr>
                                <th><?= rupiah($data['harga']) ?></th>
                            </tr>  
                            <tr>
                                <td>Kategori : <?= $data['kategori']; ?></td>
                            </tr>  
                            <tr>
                                <td>Tags : <?= $data['tag']; ?></td>
                            </tr>  
                            <tr>
                                <td>Deskripsi :</td>
                            </tr>  
                            <tr>
                                <td>
                                <?= $data['deskripsi']; ?>
                                </td>
                            </tr>  
                        </table>
                    </div>
                </div>  
            </div>
        </div>
        </div>