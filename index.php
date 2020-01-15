<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/config/config.php');


$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$banner = $pdo->query("SELECT * FROM banners WHERE id=1")->fetch();
$bannerImage = $pdo->query("SELECT Path FROM photos WHERE Family = 'banners'")->fetch();
$settings = $pdo->query("SELECT * FROM settings WHERE id = 1")->fetch();
$video = $pdo->query("SELECT * FROM videos WHERE id = 1")->fetch();
$fiyatlar = $pdo->query("SELECT * FROM pages WHERE id = 4")->fetch();
$fiyatmodul = $pdo->query("SELECT * FROM prices WHERE Active = 1 AND Status = 1 ORDER BY id ASC")->fetchAll();
$serit = $pdo->query("SELECT * FROM pages WHERE id = 1")->fetch();
$nedir = $pdo->query("SELECT * FROM pages WHERE id = 2")->fetch();
$neiseyarar = $pdo->query("SELECT * FROM pages WHERE id = 3")->fetch();
$products = $pdo->query("SELECT * FROM products WHERE Active = 1 AND Status = 1 ORDER BY id ASC")->fetchAll();
$paymentMethods = $pdo->query("SELECT * FROM paymentmethod WHERE Active = 1 AND Status = 1 ORDER BY id ASC")->fetchAll();
$pages = $pdo->query("SELECT * FROM pages WHERE Active = 1 AND Status = 1")->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Document</title>
    <script language="javascript" type="text/javascript" src="/admin/layouts/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-reboot.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="assets/css/tekurunplus.css?v=1.0.0">
    <style>
        .theme-color-bg {
            background: #<?=$settings['ThemeColor']; ?> !important;
            border-color: #<?=$settings['ThemeColor']; ?> !important;
        }

        .theme-color-only-border {
            border-color: #<?=$settings['ThemeColor']; ?> !important;
        }

        .theme-color-text {
            color: #<?=$settings['ThemeColor']; ?> !important;
            border-color: #<?=$settings['ThemeColor']; ?> !important;
        }

        .text-color {
            color: #<?=$settings['TextColor']; ?> !important;
        }

        body .container input:checked ~ .checkmark {
            background-color: #<?=$settings['ThemeColor']; ?> !important;
        }
    </style>
</head>
<body>

<?php if ($settings['Maintenance'] === 0) { ?>

    <div class="main-wrapper">

        <nav>
            <div class="row">
                <div class="col-7 col-md-4 logo-wrapper">
                    <div id="logo">
                        <div class="brand-name theme-color-text"><?= $banner['LogoText1']; ?></div>
                        <div class="description text-color"><?= $banner['LogoText2']; ?></div>
                    </div>
                </div>
                <div class="col-5 col-md-8">
                    <div id="menu">
                        <a class="theme-color-text" href="#">Anasayfa</a> <span class="theme-color-text"> / </span>
                   <?php
                   foreach ($pages as $pages_) {
                      if($pages_['id'] !== 1) {
                          echo '     <a class="theme-color-text main-menu" data-menu="'.$pages_['Title'].'" href="#">'.$pages_['Name'].'</a> <span class="theme-color-text"> / </span>';
                      }

                   }

                   ?>
                        <a class="theme-color-text" href="#">Fiyatlar</a>
                    </div>
                    <div id="hamburger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div id="buy-now" class="btn-tekurunplus float-right theme-color-bg">Satın Al</div>
                </div>
            </div>
        </nav>

        <section id="banner">
            <div id="banner-top" class="row">
                <div class="alt-banner d-block d-lg-none text-color"><?= $banner['SloganText3']; ?></div>

                <div class="bannerImageHolder col-12 d-md-block col-lg-6 text-right"><img class="img-fluid"
                                                                                          src="<?= $bannerImage['Path']; ?>"/>
                </div>
                <div class="col-12 col-lg-6 second-area">
                    <div class="brand-banner  d-none d-lg-block theme-color-text"><?= $banner['SloganText1']; ?></div>
                    <div class="desc-banner  d-none d-lg-block text-color"><?= $banner['SloganText2']; ?></div>
                    <div class="alt-banner d-none d-lg-block text-color"><?= $banner['SloganText3']; ?></div>
                    <div class="buttons">
                        <div class="btn-tekurunplus-outline theme-color-text">
                            İncele
                        </div>
                        <div class="btn-tekurunplus btn-big font-weight-bold theme-color-bg">
                            SATIN AL
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<!--    <section class="divider first text-center theme-color-bg">

        <h1><?/*= $serit['Title']; */?></h1>

        <h2><?/*= $serit['Subtitle']; */?></h2>

    </section>
    <div class="main-wrapper">
        <div id="content-1">
            <h1 class="theme-color-text"><?/*= $nedir['Title']; */?></h1>
            <h2 class="text-color"><?/*= $nedir['Subtitle']; */?></h2>
            <?/*= $nedir['Content']; */?>
        </div>
    </div>-->
<!--    <section class="divider regular text-center theme-color-bg">

        <h1><?/*= $serit['Title']; */?></h1>

        <h2><?/*= $serit['Subtitle']; */?></h2>

    </section>
    <div class="main-wrapper">
        <div id="content-2">
            <h1 class="theme-color-text"><?/*= $neiseyarar['Title']; */?></h1>
            <h2 class="text-color"><?/*= $neiseyarar['Subtitle']; */?></h2>

            <?/*= $neiseyarar['Content']; */?>

        </div>
    </div>-->

    <?php

    $i = 0;
    $class = "";
    foreach ($pages as $pages_) {

       if($pages_['id'] !== 1) {

           if($i === 0) {
               $class = "first";
           } else {
               $class="regular";
           }

           echo ' <section class="divider '.$class.' text-center theme-color-bg">

        <h1>'.$serit['Title'].'</h1>

        <h2>'.$serit['Subtitle'].'</h2>

    </section>';


           echo ' <div class="main-wrapper">
        <div id="content" data-name="$pages_[\'Title\']">
            <h1 class="theme-color-text">'.$pages_['Title'].'</h1>
            <h2 class="text-color">'.$pages_['Subtitle'].'</h2>

            '.$pages_['Content'].'

        </div>
    </div>';
           $i = $i + 1;
       }

    }

    ?>

    <section class="divider regular text-center theme-color-bg">

        <h1><?= $serit['Title']; ?></h1>

        <h2><?= $serit['Subtitle']; ?></h2>

    </section>
    <div class="main-wrapper">
        <div id="content-3">
            <h1 class="theme-color-text"><?= $fiyatlar['Title']; ?></h1>
            <h2 class="text-color"><?= $fiyatlar['Subtitle']; ?></h2>
            <!--       <div class="col-12 ml-auto mr-auto mt-4 product-image">
                       <img class="img-fluid m-auto" src="assets/img/tekurunAsset 9.png"/>
                   </div>-->
            <div class="row mt-4">


                <?php
                foreach ($fiyatmodul as $fiyatmodul_) {
                    echo"                <div class=\"text-center price col-md-4\">
                        <div class=\"col-12\">
                            <div>
                                <img class=\"down\" src=\"assets/img/urunAsset 12.png\" width=\"100\"/></div>
                            <div class=\"amount theme-color-text\">".$fiyatmodul_['Title']."</div>
                            <div class=\"col-12 pricePhoto text-center\">

                                <img class=\"img-fluid\" src=\"assets/img/urunAsset 8.png\"/></div>
                            <div class=\"priceTag theme-color-text\">".$fiyatmodul_['Price']."₺</div>
                        </div>
                        <div class=\"col-12\">
                            <div id=\"buy-now\" class=\"btn-tekurunplus m-auto priceBuy theme-color-bg\">Satın Al</div>
                        </div>
                    </div>
";
                }
                ?>



         <!--       <div class="text-center price">
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <img class="down" src="assets/img/urunAsset 12.png" width="100"/></div>
                            <div class="amount theme-color-text">2 ADET</div>
                            <div class="col-12 pricePhoto two text-center">

                                <img class="img-fluid" src="assets/img/urunAsset 10.png"/></div>
                            <div class="priceTag theme-color-text">109₺</div>
                        </div>
                        <div class="col-12">
                            <div id="buy-now" class="btn-tekurunplus m-auto priceBuy theme-color-bg">Satın Al</div>
                        </div>
                    </div>
                </div>
                <div class="text-center price">
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <img class="down" src="assets/img/urunAsset 12.png" width="100"/></div>
                            <div class="amount theme-color-text">3 ADET</div>
                            <div class="col-12 pricePhoto three text-center">

                                <img class="img-fluid" src="assets/img/urunAsset 11.png"/></div>
                            <div class="priceTag theme-color-text">159₺</div>
                        </div>
                        <div class="col-12">
                            <div id="buy-now" class="btn-tekurunplus m-auto priceBuy theme-color-bg">Satın Al</div>
                        </div>
                    </div>
                </div>-->

            </div>
        </div>
    </div>
    <section class="divider regular text-center theme-color-bg">

        <h1><?= $serit['Title']; ?></h1>

        <h2><?= $serit['Subtitle']; ?></h2>

    </section>
    <div class="main-wrapper">
        <div id="content-4" data-toggle="modal" data-src="https://www.youtube.com/embed/<?=$video['Url']; ?>" data-target="#myModal">
            <div class="col-12 ml-auto mr-auto video">
                <img class="img-fluid m-auto" src="assets/img/tekurun-Asset 3.png"/>
            </div>
        </div>
    </div>
    <section class="divider order_ text-center theme-color-bg">
        <div class="order">
            <div class="row">
                <div class="col-12">
                    <h1>Sipariş</h1>

                    <h2>Lütfen formu eksiksiz doldurunuz</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="arrow-wrapper">
        <div class="arrow">

            <div class="row">
                <div class="col-12">
                    <img class="img-fluid arrowImage" src="assets/img/tekurun-Asset 4.png"/>
                </div>
            </div>
        </div>

    </div>
    <div class="main-wrapper">
        <div id="content-5">
            <div class="row">
                <div class="col-12 col-lg-7 ml-auto mr-auto form">
                    <form id="orderForm" action="orderController.php" method="post">
                        <input name="token" type="hidden" value="<?=session_id()?>">
                        <input name="Amount" type="hidden" value="2">
                        <div class="col-12 text-center d-block d-md-none mt-5">
                            <img class="m-auto formProductImage" src="assets/img/urunAsset 8.png" width="90"/>
                        </div>
                        <div class="form-row mt-5">
                            <div class="col-12 d-md-none">
                                <span class="text-color">Kişisel Bilgiler</span>
                                <hr>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="theme-color-text" for="FirstName">Ad</label>
                                <input type="text" class="form-control theme-color-only-border" id="FirstName"
                                       name="FirstName" autocomplete="off">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="theme-color-text" for="Soyad">Soyad</label>
                                <input type="text" class="form-control theme-color-only-border" id="LastName" name="LastName"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 d-md-none mt-5">
                                <span class="text-colort">İletişim Bilgileri</span>
                                <hr>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="theme-color-text" for="Mail">E-Posta adresi</label>
                                <input type="text" class="form-control theme-color-only-border" id="Mail" name="Mail"
                                       autocomplete="off">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="theme-color-text" for="telefon-numaranız">Telefon Numarası</label>
                                <input type="text" class="form-control theme-color-only-border" id="Phone"
                                       name="Phone"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 d-md-none mt-5">
                                <span class="text-color">Sipariş Detayları</span>
                                <hr>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="theme-color-text" for="Name">Ürün Seçiniz</label>
                                <select class="form-control theme-color-only-border" id="Product" name="Product">
                                    <?php
                                    foreach($products as $products_) {
                                        echo '<option value="'.$products_['Id'].'">'.$products_['Name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="theme-color-text" for="PaymentId">Ödeme Şekli Seçiniz</label>
                                <select class="form-control theme-color-only-border" id="PaymentMethodId" name="PaymentMethodId">
                                    <?php
                                    foreach($paymentMethods as $paymentMethods_) {
                                        echo '<option value="'.$paymentMethods_['id'].'">'.$paymentMethods_['PaymentMethodName'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 d-md-none mt-5">
                                <span class="text-color">Teslimat Bilgileri</span>
                                <hr>
                            </div>
                            <label class="tal theme-color-text" for="teslimat-adresi">Teslimat Adresi</label>
                            <textarea class="form-control theme-color-only-border" id="teslimat-adresi" name="Address"
                                      autocomplete="nope"></textarea>
                        </div>
                        <div class="form-group" style="margin-bottom: 0px !important;">
                            <div class="row">
                                <div class="col-12 col-md-8 text-center pt-3">
                                    <!--  <input class="form-check-input" type="checkbox" value="" name="Agreement" id="Agreement">
                                      <label class="form-check-label" for="Agreement">
                                      </label> -->

                                    <label class="container form-check-label mb-3 theme-color-text"><span>Mesafeli satış sözleşmesi</span>'ni
                                        okudum, kabul ediyorum.

                                        <input name="agreement" value="checked" type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-12 col-md-4 text-right">
                                    <input class="btn-form theme-color-bg" type="submit" value="SİPARİŞİ TAMAMLA">
                                </div>
                            </div>
                        </div>
                        <div class="form-check text-right">
                            <div id="payment-image" class="col-12 mr-0 float-right pr-0 mb-5 mt-2">
                                <div class="col-12 col-md-3 float-right pr-0">
                                    <img class="img-fluid" src="assets/img/tekurun-Asset 6.png"/>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
                <div class="col-hidden col-lg-5 formImage" style="background-image: url(<?= $bannerImage['Path']; ?>)">
                </div>
            </div>

        </div>
    </div>
    <section class="divider regular text-center mt-0 theme-color-bg">

        <div id="footer">
            <div class="row footer-links text-left">
                <div class="col-12 col-md-3">
                    <ul>
                        <li><a href="#">Mesafeli Satış Sözleşmesi</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Gizlilik Sözleşmesi</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">İptal ve İade Koşulları</a></li>
                    </ul>
                </div>

                <div class="col-12 col-md-9 float-right">
                    <div class="row col-12 col-md-4 float-right security">
                        <div class="col-12 text-center">
                            <img class="img-fluid" src="assets/img/tekurun-Asset 7.png" style="max-width:126px"/>
                        </div>
                        <div class="col-12 text-center">
                            <div class="url">www.nutivacoconut.com.tr</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <div id="hamburger-menu">
        <div class="links">
            <a href="#">Anasayfa</a>
            <a href="#">Nedir?</a>
            <a href="#">Ne işe yarar?</a>
            <a href="#">Fiyatlar</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>


                </div>

            </div>
        </div>
    </div>
<?php } else {
    echo '<div class="col-12 text-center mt-5">Sitemiz güncelleniyor. Lütfen daha sonra tekrar deneyiniz.</div>';
} ?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="/admin/layouts/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="node_modules/jquery-validation/dist/jquery.validate.js"></script>
<script src="node_modules/jquery.scrollto/jquery.scrollTo.min.js"></script>
<script src="assets/js/tekurunplus.js?v=1.0.0"></script>
</body>
</html>