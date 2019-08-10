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

    <?php

    echo $_GET['module'];

    if (isset($_GET['module']) && isset($_GET['action']) && isset($_GET['id'])) {

        switch ($_GET['module']){
            case "orders":
               include("edit".ucfirst($_GET['module']).'.php');


        }


    }


    ?>

</div>
<!-- /.container-fluid -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/layouts/footer.php";
?>

