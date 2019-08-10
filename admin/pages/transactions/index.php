<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/core/mcore.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/layouts/header.php");
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->

    <!--    .htaccess & php router   -->
    <?php

    if (isset($_GET['module']) && isset($_GET['action']) && isset($_GET['id']) && is_numeric($_GET['id'])) {

        include($_GET['action'] . "/" . $_GET['module'] . '.php');


    } else if (isset($_GET['module']) && isset($_GET['action']) && ($_GET['action'] == "add")) {

        include($_GET['action'] . "/" . $_GET['module'] . '.php');


    } else {
        include($_SERVER['DOCUMENT_ROOT'] . "/admin/pages/error/404.php");
    }

    ?>

</div>
<!-- /.container-fluid -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/layouts/footer.php";
?>

