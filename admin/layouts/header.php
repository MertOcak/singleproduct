<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <?php

    $aylar = array(

        1 => "Ocak",

        2 => "Şubat",

        3 => "Mart",

        4 => "Nisan",

        5 => "Mayıs",

        6 => "Haziran",

        7 => "Temmuz",

        8 => "Ağustos",

        9 => "Eylül",

        10 => "Ekim",

        11 => "Kasım",

        12 => "Aralık"

    );
    $gunler = array(

        0 => "Pazar",

        1 => "Pazartesi",

        2 => "Salı",

        3 => "Çarşamba",

        4 => "Perşembe",

        5 => "Cuma",

        6 => "Cumartesi"

    );

    $today = date('d') . " " . $aylar[date("n")] . " " . date('Y');

    ?>
    <title>Tek Ürün 2 - Yönetim Paneli - Hoşgeldiniz - <?php echo $today; ?></title>
    <!-- Custom fonts for this template-->
    <link href="/admin/layouts/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <!--    <link href="/admin/layouts/css/sb-admin-2.min.css" rel="stylesheet">
    -->
    <link href="/admin/layouts/scss/sb-admin-2.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="/admin/layouts/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="/admin/layouts/vendor/jquery/jquery.min.js"></script>
    <script src="/admin/layouts/js/js.cookie.js"></script>
    <script src="/admin/layouts/js/dropzone.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"></link>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion <?php if (isset($_COOKIE['menu-state']) && $_COOKIE['menu-state'] === "close") {
        echo 'toggled';
    } ?>" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/pages/orders">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">TEK ÜRÜN <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Kontrol Paneli</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->

        <div class="sidebar-heading">
            E-Ticaret Yönetimi
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ordersManagement"
               aria-expanded="true" aria-controls="ordersManagement">
                <i class="fas fa-fw fa-shopping-basket"></i>
                <span>Siparişler</span>
            </a>
            <div id="ordersManagement" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!--                    <h6 class="collapse-header">Custom Components:</h6> --!>
                    <a class="collapse-item" href="/admin/pages/orders">Tüm Siparişler</a>
                    <a class="collapse-item" href="/admin/pages/orders/1">Yeni Siparişler</a>
                    <a class="collapse-item" href="/admin/pages/orders/2">İncelenmiş Siparişler</a>
                    <a class="collapse-item" href="/admin/pages/orders/3">Hazırlanan Siparişler</a>
                    <a class="collapse-item" href="/admin/pages/orders/4">Kargolanan Siparişler</a>
                    <a class="collapse-item" href="/admin/pages/orders/5">İptal Edilen Siparişler</a>
                    <a class="collapse-item" href="/admin/pages/orders/6">Tamamlanan Siparişler</a>
                </div>
            </div>
        </li>


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customers"
               aria-expanded="true" aria-controls="customers">
                <i class="fas fa-fw fa-user"></i>
                <span>Müşteriler</span>
            </a>
            <div id="customers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!--             <h6 class="collapse-header">Custom Components:</h6> -->
                    <a class="collapse-item" href="/admin/pages/customers">Müşterileri Listele</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
               aria-expanded="true" aria-controls="products">
                <i class="fas fa-fw fa-box"></i>
                <span>Ürünler</span>
            </a>
            <div id="products" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/pages/transactions/products/add">Yeni Ürün Ekle</a>
                    <a class="collapse-item" href="/admin/pages/products">Ürünleri Listele</a>
                </div>

            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#paymentMethods"
               aria-expanded="true" aria-controls="paymentMethods">
                <i class="fas fa-fw fa-credit-card"></i>
                <span>Ödeme Yöntemleri</span>
            </a>
            <div id="paymentMethods" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!--                    <h6 class="collapse-header">Custom Utilities:</h6>
                    -->
                    <a class="collapse-item" href="/admin/pages/transactions/paymentmethod/add">Ödeme Yöntemi Ekle</a>
                    <a class="collapse-item" href="/admin/pages/paymentmethod">Ödeme Yöntemleri Listele</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bankAccounts"
               aria-expanded="true" aria-controls="bankAccounts">
                <i class="fas fa-fw fa-cash-register"></i>
                <span>Banka Hesapları</span>
            </a>
            <div id="bankAccounts" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!--                    <h6 class="collapse-header">Custom Utilities:</h6>
                    -->
                    <a class="collapse-item" href="/admin/pages/transactions/bankaccounts/add">Banka Hesabı Ekle</a>
                    <a class="collapse-item" href="/admin/pages/bankaccounts">Banka Hesaplarını Listele</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingFees"
               aria-expanded="true" aria-controls="shippingFees">
                <i class="fas fa-fw fa-shipping-fast"></i>
                <span>Ekstra Ücretler</span>
            </a>
            <div id="shippingFees" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/pages/transactions/extras/add">Ekstra Ücretler Ekle</a>
                    <a class="collapse-item" href="/admin/pages/extras">Ekstra Ücretleri Listele</a>
                </div>
            </div>
        </li>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vposes"
               aria-expanded="true" aria-controls="vposes">
                <i class="fas fa-fw fa-vote-yea"></i>
                <span>Sanal Poslar</span>
            </a>
            <div id="vposes" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/pages/transactions/vposes/edit/1">Iyzico Modülü Ekle</a>
                    <a class="collapse-item" href="/admin/pages/transactions/vposes/edit/2">PayTR Modülü Ekle</a>
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Tasarım Ayarları
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sayfalar"
               aria-expanded="true" aria-controls="sayfalar">
                <i class="fas fa-fw fa-layer-group"></i>
                <span>İçerik Yönetimi</span>
            </a>
            <div id="sayfalar" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header">Üst Kısım Alanları:</h6>

                    <a class="collapse-item" href="/admin/pages/transactions/banners/edit/1">Banner</a>
                    <h6 class="collapse-header">İÇERİK ALANLARI:</h6>
                    <a class="collapse-item" href="/admin/pages/pages">Sayfalar</a>
                    <a class="collapse-item" href="/admin/pages/prices">Fiyatlar Modülü</a>
                    <a class="collapse-item" href="/admin/pages/transactions/pages/edit/1">Şerit Slogan</a>
                    <a class="collapse-item" href="/admin/pages/transactions/videos/edit/1">Video</a>

                    <!--<h6 class="collapse-header">Alt Kısım Alanları:</h6>

                    <a class="collapse-item" href="#">Yorumlar</a>
                    <a class="collapse-item" href="#">İletişim</a>
                    <a class="collapse-item" href="#">Sipariş Sorgulama Ekranı</a>-->

                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Sözleşmeler:</h6>
                    <a class="collapse-item" href="/admin/pages/transactions/agreements/edit/1">Mesafeli Satış
                        Sözleşmesi</a>
                    <a class="collapse-item" href="/admin/pages/transactions/agreements/edit/1/Gizlilik">Gizlilik
                        Sözleşmesi</a>
                    <a class="collapse-item" href="/admin/pages/transactions/agreements/edit/1/Iptal">İptal ve İade
                        Koşulları</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            SİTE AYARLARI
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#general"
               aria-expanded="true" aria-controls="general">
                <i class="fas fa-fw fa-ellipsis-h"></i>
                <span>Genel Ayarlar</span>
            </a>
            <div id="general" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header">Tema Ayarları:</h6>


                    <a class="collapse-item" href="/admin/pages/transactions/settings/edit/1">Tema Rengi</a>


                    <h6 class="collapse-header">Seo Ayarları:</h6>

                    <a class="collapse-item" href="/admin/pages/transactions/settings/edit/1/GoogleAnalytics">Google
                        Analytics</a>
                    <a class="collapse-item" href="/admin/pages/transactions/settings/edit/1/SeoSettings">Meta
                        Etiketleri</a>


                    <h6 class="collapse-header">Eklenti Ayarları:</h6>

                    <a class="collapse-item" href="/admin/pages/transactions/settings/edit/1/LiveChat">Canlı Destek</a>
                    <a class="collapse-item" href="/admin/pages/transactions/settings/edit/1/Whatsapp">Whatsapp</a>
                    <a class="collapse-item" href="/admin/pages/transactions/settings/edit/1/JsCode">JS Kodu</a>

                    <h6 class="collapse-header">Bakım Modu Ayarları:</h6>

                    <a class="collapse-item" href="/admin/pages/transactions/settings/edit/1/Maintenance">Bakım Modu</a>

                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            GİZLİLİK VE GÜVENLİK
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#generalSettings"
               aria-expanded="true" aria-controls="generalSettings">
                <i class="fas fa-fw fa-shield-alt"></i>
                <span>Güvenlik Ayarları</span>
            </a>
            <div id="generalSettings" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">PROFİL AYARLARI</h6>

                    <a class="collapse-item" href="/admin/pages/transactions/users/edit/1">Yönetici Profili Düzenle</a>

                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form id="search" action="/admin/pages/search/search.php" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="orderId" class="form-control bg-light border-0 small"
                               placeholder="Hızlı Ara | Sipariş numarası"
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form id="searchMobile" action="/admin/pages/search/search.php" method="post" class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input name="orderId" type="text" class="form-control bg-light border-0 small"
                                           placeholder="Hızlı Ara | Sipariş numarası" aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->

                            <?php $newOrders = $pdo->query('SELECT o.Id AS Id, o.CreatedAt AS date, c.FirstName AS FirstName, c.LastName AS LastName, p.Name AS pName FROM orders o INNER JOIN products p ON p.id = o.Product INNER JOIN customers c ON o.CustomerId = c.Id WHERE o.Active = 1 AND o.Status = 1');
                            ?>
                            <span class="badge badge-danger badge-counter"><?php echo $newOrders->rowCount(); ?></span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                BİLDİRİMLERİNİZ
                            </h6>

                            <?php while ($row = $newOrders->fetch()) {

                                $date = $row['date'];


                                echo ' <a class="dropdown-item d-flex align-items-center" href="/admin/pages/transactions/orders/browse/' . $row['Id'] . '">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">' . $date . '</div>
                                    <div class="small font-weight-bold"><b>' . ucfirst($row['FirstName']) . ' '.ucfirst($row['LastName']).' </b>Yeni Bir Sipariş Verdi!</div>
                                </div>
                            </a>';

                            }
                            ?>

     
                            <a class="dropdown-item text-center small text-gray-500" href="/admin/pages/orders">Tüm Siparişler</a>
                        </div>
                    </li>
                    

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small disableSelection">
                                <?php
                                echo $today;
                                ?>
                            </span>
                        </a>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php
                                $adminName = $pdo->query("SELECT FirstName, LastName FROM users WHERE id=1")->fetch();
                                echo $adminName['FirstName'] . " " . $adminName['LastName'];
                                ?>
                            </span>
                            <div class="img-profile d-lg-none" style="border-radius: 50%; background: #4e73df"></div>
                                                 </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" target="_blank"
                               href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Site Önizlemesi
                            </a>
                            <a class="dropdown-item" href="/admin/pages/transactions/users/edit/1/Password">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Şifre İşlemleri
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Son Girişler
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Güvenli Çıkış
                            </a>
                        </div>
                    </li>



                </ul>

            </nav>
            <!-- End of Topbar -->