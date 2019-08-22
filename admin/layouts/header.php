<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/layouts/index.html">
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
                <i class="fas fa-fw fa-barcode"></i>
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
                <i class="fas fa-fw fa-folder"></i>
                <span>İçerik Yönetimi</span>
            </a>
            <div id="sayfalar" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <h6 class="collapse-header">Renk Ayarları:</h6>


                    <a class="collapse-item" href="/admin/pages/transactions/settings/edit/1">Tema Rengi</a>


                    <h6 class="collapse-header">Üst Kısım Alanları:</h6>

                    <a class="collapse-item" href="#">Banner</a>
                    <h6 class="collapse-header">Orta Kısım Alanları:</h6>

                    <a class="collapse-item" href="#">Özellikler</a>
                    <a class="collapse-item" href="#">Fotoğraflar</a>
                    <a class="collapse-item" href="#">Videolar</a>

                    <h6 class="collapse-header">Alt Kısım Alanları:</h6>

                    <a class="collapse-item" href="#">Yorumlar</a>
                    <a class="collapse-item" href="#">İletişim</a>
                    <a class="collapse-item" href="#">Sipariş Sorgulama Ekranı</a>

                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Sözleşmeler:</h6>
                    <a class="collapse-item" href="#">Mesafeli Satış Sözleşmesi</a>
                    <a class="collapse-item" href="#">Gizlilik Sözleşmesi</a>
                    <a class="collapse-item" href="#">İptal ve İade Koşulları</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Genel Ayarlar
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#generalSettings"
               aria-expanded="true" aria-controls="generalSettings">
                <i class="fas fa-fw fa-folder"></i>
                <span>Site Ayarları  </span>
            </a>
            <div id="generalSettings" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Gizlilik ve Güvenlik:</h6>

                    <a class="collapse-item" href="#">Yönetici Bilgileri</a>
                    <h6 class="collapse-header">Eklentiler:</h6>

                    <a class="collapse-item" href="#">Google Anlaytics Kodu</a>
                    <a class="collapse-item" href="#">Iyzico Modülü Ekle</a>
                    <a class="collapse-item" href="#">PayTR Modülü Ekle</a>
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
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                               placeholder="Hızlı Ara | Sipariş numarası"
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
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
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
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
                                Bildirimleriniz
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>

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
                                    <div class="small font-weight-bold"><b>' . $row['FirstName'] . ' </b>Yeni Bir Sipariş Verdi!</div>
                                    <!--$290.29 has been deposited into your account!-->
                                </div>
                            </a>';

                            }
                            ?>

                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Mesaj Merkezi
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <!--   <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                            alt="">-->
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.
                                    </div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <!--   <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
                                            alt="">-->
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how would
                                        you like them sent to you?
                                    </div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <!-- <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
                                          alt="">-->
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with the
                                        progress so far, keep up the good work!
                                    </div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <!--  <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                           alt="">-->
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told
                                        me that people say this to all dogs, even if they aren't good...
                                    </div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Mert Ocak</span>
                            <!--                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            -->                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Site Önizlemesi
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Şifre İşlemleri
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Son Girişler
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Güvenli Çıkış
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->