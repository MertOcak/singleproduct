<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/core/mcore.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/layouts/header.php");
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="mx-auto display-2 d-none d-lg-block" style="margin-top:16%" data-text="404">Üzgünüz :(</div>
        <p class="lead text-gray-800 mb-5">Sipariş Bulunamadı</p>
        <p class="text-gray-500 mb-0">Kendiniz gözatmak ister misiniz?</p>
        <a href="/admin/pages/orders/">← Tüm Siparişlere Gözat</a>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/layouts/footer.php";
?>

