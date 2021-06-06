<?php 
include('view/layout/header.php');
if(!empty($_GET['page'])){
    $halaman = $_GET['page'];
}else{
    $halaman = null;
}
switch ($halaman):
    case 'login':
        include('view/content/login.php');
        break;
    case 'dashboard':
        include('view/content/dashboard_produk.php');
        break;
    case 'form_produk':
        include('view/content/form_produk.php');
        break;
    case 'detail-produk':
        include('view/content/detail_produk.php');
        break;
    default:
        include('view/layout/kategori.php');
        include('view/content/produk.php');
endswitch;
include('view/layout/footer.php'); 