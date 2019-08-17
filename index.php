<?php  ob_start("ob_gzhandler");
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['refUrl'] = $_SERVER['HTTP_REFERER'];
}
include_once ('admin/core/mcore.php');

$settings = $pdo->query("SELECT * FROM settings");
foreach ($settings as $setting) {
    $ThemeColor = $setting['ThemeColor'];
    $TextColor = $setting['TextColor'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="assets/img/fav-site.png" type="image/x-icon">
<meta name="description" content="Xiaomi Mi Band 4 - Satın Al">
<meta name="keywords" content="nutiva,kokonat yağı,satın al">
<meta name="author" content="nutiva">
<meta name="robots" content="index,follow">
<meta name="description" content="Xiaomi Mi Band 4 - Satın Al">
<meta property="og:locale" content="tr_TR">
<meta property="og:type" content="website">
<meta property="og:title" content="Xiaomi Mi Band 4 - Satın Al">
<meta property="og:description" content="Xiaomi Mi Band 4 - Satın Al">
<meta property="og:url" content="index.php">
<meta property="og:site_name" content="Xiaomi Mi Band 4 - Satın Al">
<title>Xiaomi Mi Band 4 - Satın Al</title>
<link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
<link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
<link rel="stylesheet" href="assets/tether/tether.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="assets/dropdown/css/style.css">
<link rel="stylesheet" href="assets/socicon/css/styles.css">
<link rel="stylesheet" href="assets/as-pie-progress/css/progress.min.css">
<!-- <link rel="stylesheet" href="assets/animate.css/animate.min.css">
 --><link rel="stylesheet" href="assets/theme/css/style.css">
<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
<link rel="stylesheet" href="assets/order/css/sweetalert.css" type="text/css">
<link rel="stylesheet" href="assets/order/css/guardian.css" type="text/css">
<link rel="stylesheet" href="assets/order/css/simply-toast.css" type="text/css">
    <style>

        <?php
function color_luminance( $hex, $percent ) {

	// validate hex string

	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
	$new_hex = '#';

	if ( strlen( $hex ) < 6 ) {
		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
	}

	// convert to decimal and change luminosity
	for ($i = 0; $i < 3; $i++) {
		$dec = hexdec( substr( $hex, $i*2, 2 ) );
		$dec = min( max( 0, $dec + $dec * $percent ), 255 );
		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
	}

	return $new_hex;
}
 ?>
        .ThemeColor, .navbar {
            background-color: #<?php echo $ThemeColor; ?> !important;
        }

        a.nav-link.link.text-black.active {
color: #<?php echo $ThemeColor; ?> !important;
            font-weight: semibold;
        }

        a.nav-link.link.text-black {
            font-weight: semibold;

        }

        .cid-qzrzV4rhXd .navbar {
            background: #f5f5f5;
            transition: none;
            min-height: 77px;
            border-bottom-left-radius: 26%;
            border-bottom-right-radius: 26%;
            padding: .5rem 0;
        }


        a.nav-link.link.text-black:hover {
            color: <?php echo color_luminance("#".$ThemeColor,-0.5); ?>!important;

        }



        .ThemeColorText {
            color: #<?php echo $ThemeColor; ?> ;
        }

        .nav-link.link.text-black {
            color: #<?php echo $TextColor; ?> !important;
            font-size:16px;
        }

        .TextColor {
            color: #<?php echo $TextColor; ?> !important;
        }

        .text-black, .first_ {
            color: #<?php echo $ThemeColor; ?> !important;
            letter-spacing: 0.7px;
            font-weight: semibold !important;
        }

        .cid-qzsEQa9h36 path {
            stroke: #<?php echo $ThemeColor; ?>;
        }
        .btn-black, .btn-black:focus, .btn-black:active {
            background-color: #<?php echo $ThemeColor; ?> !important;
            border-color: #<?php echo $ThemeColor; ?> !important;
            color: #ffffff;
            font-weight: semibold !important;
        }

        .btn-black-outline, .btn-black-outline:focus .btn-black-outline:active {
            border-color: #<?php echo $ThemeColor; ?> !important;
            color: #<?php echo $ThemeColor; ?> !important;
            background-color: transparent !important;
            font-weight: semibold;
        }

        body,html {
            color: <?php echo $TextColor;?> !important;
        }

        * .mbr-text, h1,h2,h3,h4,h5,h6, .mbr-author-desc, .mbr-author-name,
        .cid-qzsTCnMCy7 a:link,
        .cid-qzsTCnMCy7 a:hover,
        .cid-qzsTCnMCy7 a:active,
        .cid-qzsTCnMCy7 a:visited{
            color: #<?php echo $TextColor ?> !important;
        }

        .testimonial-photo {
            border: 2px solid #<?php echo $ThemeColor; ?> !important;
        }
    </style>
</head>

<body>
<div class="menu cid-qzrzV4rhXd" once="menu" id="menu2-i" data-rv-view="1509">
<nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<div class="hamburger">
<span></span>
<span></span>
<span></span>
<span></span>
</div>
</button>
<div class="menu-logo">
<div class="navbar-brand">
<span class="navbar-caption-wrap"><a class="navbar-caption display-5" href="#menu2-i" ><span class="first_ d-inline-block" >Xiaomi</span></a></span>
</div>
</div>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
<li class="nav-item">
<a class="nav-link link text-black display-4 active" href="#menu2-i" title="Anasayfa">
Anasayfa</a>
</li>
<li class="nav-item">
<a class="nav-link link text-black display-4" href="#progress-bars3-z" title="Kokonat Yağı Nedir?">Kokonat Yağı Nedir?</a>
</li>
<li class="nav-item"><a class="nav-link link text-black display-4" href="#header7-16" title="Nasıl Kullanılır?">
Nasıl Kullanılır?</a></li>
<li class="nav-item dropdown">
<a class="nav-link link text-black dropdown-toggle display-4 mbr" href="#testimonials1-10" data-toggle="dropdown-submenu" aria-expanded="false" title="Detaylar">Detaylar</a><div class="dropdown-menu"><a class="text-black dropdown-item display-4 " href="index.html#features3-s" title="Fiyat Listesi">Fiyat Listesi</a><br><a class="text-black dropdown-item display-4 " href="index.html#testimonials1-10" title="Kullanıcı Yorumları">Kullanıcı Yorumları</a><br><a class="text-black dropdown-item display-4 " href="index.html#form3-18" title="Sipariş Takibi">Sipariş Takibi</a><br><a class="text-black dropdown-item display-4 " href="index.html#st" title="Hakkımızda">Hakkımızda</a><br><a class="text-black dropdown-item display-4" href="index.html#tabs2-0" title="Müşterilerimiz">Banka Hesap Bilgileri</a><br><a class="text-black dropdown-item display-4" href="index.html#tabs2-0" title="Müşterilerimiz">Ödeme Bildirimi</a></div>
</li>
</ul>
<div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-black-outline display-4" href="#form1"><span class="mbrib-shopping-basket mbr-iconfont mbr-iconfont-btn"></span>

Sipariş Ver</a></div>
</div>
</nav>
</div>
<section class="header3 cid-qzrWho6H3a" id="header3-r" data-rv-view="1511">
<div class="container">
    <div class="media-container-row">
        <div class="mbr-figure" style="width: 110%;">
            <img src="https://i01.appmifile.com/webfile/globalimg/Cambridge/mi-band-4-black.png" alt="Xiaomi Mi Band 4" title="" media-simple="true">
        </div>
        <div class="media-content">
            <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1"><br><span class="ThemeColorText" style="font-size:3rem !important;">Xiaomi</span><br>Mi Band 4</h1>
            <div class="mbr-section-text mbr-white pb-3 ">
                <p class="mbr-text mbr-fonts-style display-5">
                    Tamamen Yeni !</p>
            </div>
            <div class="mbr-section-btn"><a class="btn btn-md btn-black-outline display-4" href="#form1">İNCELE</a>
                <a class="btn btn-md btn-black display-4" href="#testimonials1-10">SATIN AL</a></div>
        </div>
    </div>

</div>
</section>

<!--<section class="mbr-section content5 cid-qzsK7gaGcM ThemeColor" id="content5-15" data-rv-view="1514">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Türkiye'de İlk!</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
                    Amerika ve Avrupa'yı kasıp kavuran ürünü ayağınıza kadar getirdik</h3>
            </div>
        </div>
    </div>
</section>-->


<section class="progress-bars3 cid-qzsEQa9h36" id="progress-bars3-z" data-rv-view="1528">
    <div class="container">
<!--        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
           Özellikleri</h2>-->
        <div class="media-container-row pt-5 mt-2">
            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress1" role="progressbar" data-goal="100">
                        <p class="pie_progress__number mbr-fonts-style display-5">100%</p>
                    </div>
                </div>
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-5">
                        AMOLED EKRAN</h4>
                </div>
            </div>
            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress2" role="progressbar" data-goal="100">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div>
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-5">
                        UZUN ŞARJ SÜRESİ</h4>
                </div>
            </div>
            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress3" role="progressbar" data-goal="100">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div>
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-5">KALP HIZI ÖLÇER</h4>
                </div>
            </div>
            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress3" role="progressbar" data-goal="100">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div>
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-5">UYKU <br> TAKİBİ</h4>
                </div>
            </div>
            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress3" role="progressbar" data-goal="100">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div>
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-5">HAREKETSİZLİK TAKİBİ</h4>
                </div>



            </div>
            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress3" role="progressbar" data-goal="100">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div>
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-5">BİLDİRİM OKUMA</h4>
                </div>
            </div>
        </div>
</section>


<section class="features3 cid-qzsulU5J7U" id="features3-s" data-rv-view="1517">
    <div class="container">
        <div class="media-container-row">
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="https://i01.appmifile.com/webfile/globalimg/Cambridge/mi-band-4-black.png" alt="Xiaomi Mi Band 4" title="" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-2">150₺</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            1 Adet</p>
                    </div>
                    <div class="mbr-section-btn text-center"><a href="#form1" class="btn btn-black-outline display-4">
                            1 Adet Satın Al</a></div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="https://i01.appmifile.com/webfile/globalimg/Cambridge/mi-band-4-black.png" alt="Xiaomi Mi Band 4" title="" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-2">
                            250₺</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            2 Adet</p>
                    </div>
                    <div class="mbr-section-btn text-center"><a href="#form1" class="btn btn-black-outline display-4">
                            2 Adet Satın Al</a></div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="https://i01.appmifile.com/webfile/globalimg/Cambridge/mi-band-4-black.png" alt="Xiaomi Mi Band 4" title="" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-2">
                            350₺</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            3 Adet</p>
                    </div>
                    <div class="mbr-section-btn text-center"><a href="#form1" class="btn btn-black-outline display-4">
                            3 Adet Satın Al</a></div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="mbr-section content5 cid-qzsAQ0iZ3M ThemeColor" id="content5-u" data-rv-view="1525">
<div class="container">
<div class="media-container-row">
<div class="title col-12 col-md-8">
<h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Ücretsiz Kargo</h2>
<h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
Tüm siparişlerinizde geçerlidir</h3>
</div>
</div>
</div>
</section>
<section class="mbr-section content5 cid-qzsAQ0iZ3M ThemeColor" id="content5-u" data-rv-view="1525">
<div class="container">
<div class="media-container-row">
<div class="title col-12 col-md-8">
<h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Nasıl Kulanılır?</h2>
<h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">Tanıtım videosunu izleyin!</h3>
</div>
</div>
</div>
</section>
<section class="header7 cid-qzsLuJL8oO" id="header7-16" data-rv-view="1531">
<div class="container">
<div class="media-container-row">
<div class="media-content align-right">
<div class="mbr-section-text mbr-white pb-3">
<h4 class="mbr-text mbr-fonts-style display-6 mt-5"><br>Kokonat yağının nasıl kullanıldığını öğrenmek için videoyu izleyebilirsiniz</h4>
</div>
</div>
<div class="mbr-figure" style="width: 115%;">
<iframe class="mbr-embedded-video" src="https://www.youtube.com/embed/F7pmBaG7qfQ?rel=0&amp;amp;showinfo=0&amp;autoplay=0&amp;loop=0" width="1280" height="720" frameborder="0" allowfullscreen></iframe>
</div>
</div>
</div>
</section>
<section class="mbr-section content5 cid-qzsAQ0iZ3M ThemeColor" id="content5-u" data-rv-view="1525">
<div class="container">
<div class="media-container-row">
<div class="title col-12 col-md-8">
<h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Kullanıcı Yorumları</h2>
<h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
Kullananlar Ne Söylediler?</h3>
</div>
</div>
</div>
</section>
<section class="testimonials1 cid-qzsGOzY2NK" id="testimonials1-10" data-rv-view="1534">
<div class="container">
<div class="media-container-row">
<div class="title col-12 align-center">
</div>
</div>
</div>
<div class="container pt-3 mt-2">
<div class="media-container-row">
<div class="mbr-testimonial p-3 align-center col-12 col-md-6 col-lg-4">
<div class="panel-item p-3">
<div class="card-block">
<div class="testimonial-photo">
<img src="assets/images/mbr-5-1620x1080.jpg" alt="" title="" media-simple="true">
</div>
<p class="mbr-text mbr-fonts-style display-7">
Kesinlikle tavsiye ederim</p>
</div>
<div class="card-footer">
<div class="mbr-author-name mbr-bold mbr-fonts-style display-7">
Ceren Açıkgöz</div>
<small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style display-7">
Öğrenci</small>
</div>
</div>
</div>
<div class="mbr-testimonial p-3 align-center col-12 col-md-6 col-lg-4">
<div class="panel-item p-3">
<div class="card-block">
<div class="testimonial-photo">
<img src="assets/images/mbr-4-720x1080.jpg" alt="" title="" media-simple="true">
</div>
<p class="mbr-text mbr-fonts-style display-7">Çok güzel</p>
</div>
<div class="card-footer">
<div class="mbr-author-name mbr-bold mbr-fonts-style display-7">
Eda Bulaç</div>
<small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style display-7">Manken</small>
</div>
</div>
</div>
<div class="mbr-testimonial p-3 align-center col-12 col-md-6 col-lg-4">
<div class="panel-item p-3">
<div class="card-block">
<div class="testimonial-photo">
<img src="assets/images/mbr-7-1620x1080.jpg" alt="" title="" media-simple="true">
</div>
<p class="mbr-text mbr-fonts-style display-7">Faydalı bir ürün</p>
</div>
<div class="card-footer">
<div class="mbr-author-name mbr-bold mbr-fonts-style display-7">
Hande Sözer</div>
<small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style display-7">
Ev Hanımı</small>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="mbr-section content5 cid-qzsAQ0iZ3M ThemeColor" id="content5-u" data-rv-view="1525">
<div class="container">
<div class="media-container-row">
<div class="title col-12 col-md-8">
<h2 class="align-center mbr-white pb-3 mbr-fonts-style display-2">Sipariş Formu</h2>
</div>
</div>
</div>
</section>

<section class="mbr-section form1 cid-qztZT1vwLh " id="form1" name="form1" data-rv-view="251" style="position:relative;padding-top: 20px;padding-bottom: 100px;">
<div>
</div>
<div class="container">
<div class="media-container-row">
<div class="title col-12 col-md-8">
<h2 class="align-center mbr-white pb-3 mbr-fonts-style display-2 TextColor"><img style="margin-top: -77px;margin-left: -7px;margin-bottom: 46px;" width="200" src="https://i01.appmifile.com/webfile/globalimg/Cambridge/mi-band-4-black.png" class="img-responsive clients-img" media-simple="true" alt="Xiaomi Mi Band 4">
<br>Xiaomi Mi Band 4</h2>
<h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5" style="    margin-top: -12px;
    margin-bottom: 25px;">
Ücretsiz kargo fırsatı ile bugün kargoya verilecektir                                          </div>
</div>
</div>
<div class="row justify-content-center">
<div class="media-container-column col-lg-8" data-form-type="formoid">
<div id="uyari" data-form-alert="" hidden="">
</div>

<form name="form1" id="form1" class="mbr-form" action="take_order.php" method="post"><input type="hidden" data-form-email="true" value="HRTMmFKG/IsMxTbWhTGJdxu50qfEEhD6f+hHTG5qFBaDzORKFU0reefNZGXSUe4abNwJW+py3MBwle5JldXf/EdrA5kWWmg8elH4NY4/c+Ac8s3T8K9zHkzQ66NRJJ77">
<div class="row row-sm-offset">
<div class="col-md-4 multi-horizontal" data-for="name">
<div class="form-group">
<!--                                     <label class="form-control-label mbr-fonts-style display-7" for="name-form1">İsim</label>
-->                                    <input style="text-align: center;" type="text" placeholder="Ad Soyad" class="form-control" name="ad" data-form-field="ad" id="ad">
</div>
</div>
<div class="col-md-4 multi-horizontal" data-for="email">
<div class="form-group">
<!--                                     <label class="form-control-label mbr-fonts-style display-7" for="email-form1">E-Posta</label>
-->                                    <input style="text-align: center;" type="text" placeholder="E-Posta" class="form-control" name="email" data-form-field="email" id="email" >
</div>
</div>
<div class="col-md-4 multi-horizontal" data-for="phone">
<div class="form-group">
<!--                                     <label class="form-control-label mbr-fonts-style display-7" for="phone-form1">Telefon</label>
-->                                    <input style="text-align: center;" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Telefon" class="form-control" name="telefon" id="telefon" maxlength="11">
</div>
</div>
</div>





<div class="form-group" data-for="message">
<!--                             <label class="form-control-label mbr-fonts-style display-7" for="message-form1">Adres</label>
-->

<select class="form-control" style="text-align: center;-webkit-appearance:none;    background:#FFF url(data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0Ljk1IDEwIj48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2ZmZjt9LmNscy0ye2ZpbGw6IzQ0NDt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPmFycm93czwvdGl0bGU+PHJlY3QgY2xhc3M9ImNscy0xIiB3aWR0aD0iNC45NSIgaGVpZ2h0PSIxMCIvPjxwb2x5Z29uIGNsYXNzPSJjbHMtMiIgcG9pbnRzPSIxLjQxIDQuNjcgMi40OCAzLjE4IDMuNTQgNC42NyAxLjQxIDQuNjciLz48cG9seWdvbiBjbGFzcz0iY2xzLTIiIHBvaW50cz0iMy41NCA1LjMzIDIuNDggNi44MiAxLjQxIDUuMzMgMy41NCA1LjMzIi8+PC9zdmc+) no-repeat 100% 50%;
" name="urun" id="urun">


<?php
$products = $pdo->query("SELECT * FROM products");
foreach ($products as $product) {
    echo '<option  value="'.$product['Id'].'">'.$product['Name'].'</option> ';
} ?>

</select>
</div>

<div class="form-group" data-for="message">

<select class="form-control" style="text-align: center;-webkit-appearance:none;    background:#FFF url(data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0Ljk1IDEwIj48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2ZmZjt9LmNscy0ye2ZpbGw6IzQ0NDt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPmFycm93czwvdGl0bGU+PHJlY3QgY2xhc3M9ImNscy0xIiB3aWR0aD0iNC45NSIgaGVpZ2h0PSIxMCIvPjxwb2x5Z29uIGNsYXNzPSJjbHMtMiIgcG9pbnRzPSIxLjQxIDQuNjcgMi40OCAzLjE4IDMuNTQgNC42NyAxLjQxIDQuNjciLz48cG9seWdvbiBjbGFzcz0iY2xzLTIiIHBvaW50cz0iMy41NCA1LjMzIDIuNDggNi44MiAxLjQxIDUuMzMgMy41NCA1LjMzIi8+PC9zdmc+) no-repeat 100% 50%;" name="odemesekli" id="odemesekli">
<option value="Kapıda Ödeme">Kapıda Nakit Ödeme</option>
<option value="Kapıda Kredi Kartı">Kapıda Kredi Kartı ile Ödeme</option>
<option value="Banka Havalesi">Banka Havalesi / EFT</option>
</select>
</div>


<div class="form-group" data-for="message">
<!--                             <label class="form-control-label mbr-fonts-style display-7" for="message-form1">Adres</label>
-->                            <textarea style="text-align: center;" type="text" class="form-control" name="adres" id="adres" rows="7" data-form-field="adres" id="message-form1" placeholder="Adres"></textarea>
</div>

<input type="hidden" name="session" id="session" value="<?php echo session_id();;?>">


<div style="text-align: center;" class="form-group" data-for="message">
<label class="link TextColor display-4" style="font-size: 1.2em; font-weight:normal"><input type="checkbox" id="sozlesme" name="sozlesme" value=""> <a href="sozlesme.html" class="TextColor" target="_blank"><u>Mesafeli satış sözleşmesi</u></a>ni okudum, kabul ediyorum.</label>
</div>

<span class="input-group-btn justify-content-center"><button href="index.php" type="submit" onclick="return sonKontrol();" id="tamamla" name="tamamla" class="btn btn-lg btn-form btn-black-outline display-3"><i class="fa fa-shopping-cart"></i> Sipariş Ver</button></span>
</form>
</div>
</div>
</div>
</section>

<section class="mbr-section form3 cid-qzsP24B6vu mbr-parallax-background ThemeColor" id="form3-18" data-rv-view="1537">
<div class="container">
<div class="row justify-content-center">
<div class="title col-12 col-lg-8">
<h2 class="align-center pb-2 mbr-fonts-style display-2 text-white">
Sipariş Takibi</h2>
<h3 class="mbr-section-subtitle align-center pb-5 mbr-light mbr-fonts-style display-5 text-white">Sipariş numaranızı girerek sorgulama yapabilirsiniz.</h3>
</div>
</div>
<div class="row py-2 justify-content-center">
<div class="col-lg-12 col-md-8 " data-form-type="">
<div class="mbr-subscribe input-group">
<input value="11633" style="text-align: center;" class="form-control" type="text" name="siparisNo" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Sipariş No" data-form-field="Email" id="siparisNo"> <br>

<!--                             <input style="text-align: center;" class="form-control" type="text" name="siparisNo" placeholder="Sipariş No" data-form-field="siparisNo" id="siparisNo" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
-->                            <span class="input-group-btn"><button onclick="return siparisKontrol();" type="button" style="cursor: pointer;" class="btn  btn-black btn-white-outline rounded display-4">SİPARİŞİM NE DURUMDA?</button></span>
</div>
</div>
</div>
<div id="siparisSonucu" class="text-center mt-5"></div>

</div>
</section>
<span id="st"></span>
<section class="mbr-section content5 cid-qzsTMG0az9 ThemeColor" id="content5-1g" data-rv-view="1540">
<div class="container">
<div class="media-container-row">
<div class="title col-12 col-md-8">
<h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Hakkımızda</h2>
<h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">Astoria Plaza 29 Levent / İstanbul</h3>
</div>
</div>
</div>
</section>
<section class="map1 cid-qzsRpTubTr" id="map1-1a" data-rv-view="1543">
<div class="google-map">
<iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJi2ZnAte1yhQRSn9re-5uKx8" allowfullscreen=""></iframe>
</div>
</section>




<section class="tabs2 cid-qzUB9dsmda ThemeColor" id="tabs2-0" data-rv-view="77">



<div>
</div>
<div class="container">
    <h2 class="mbr-section-title align-center pb-5 mbr-fonts-style display-2">Banka Hesap Bilgileri</h2>
    <div class="media-container-row">
        <div class="col-12 col-md-8">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link mbr-fonts-style active display-7" role="tab" data-toggle="tab" href="#tabs2-0_tab0" aria-expanded="true">
                        Garanti Bankası</a></li>
                <li class="nav-item"><a class="nav-link mbr-fonts-style display-7" role="tab" data-toggle="tab" href="#tabs2-0_tab1" aria-expanded="false">
                        İş Bankası</a></li>
                <li class="nav-item"><a class="nav-link mbr-fonts-style display-7" role="tab" data-toggle="tab" href="#tabs2-0_tab2" aria-expanded="false">QNB Finansbank</a></li>



            </ul>
            <div class="tab-content">
                <div id="tab1" class="tab-pane in active" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mbr-text py-5 mbr-fonts-style display-4"><strong>Garanti Bankası<br></strong>Nutiva Türkiye San.Tic. ve Paz. Ltd.Şti.<br><br><strong>IBAN Bilgileri<br></strong>TR62 0006 2000 7190 0006 3999 93&nbsp;<strong>(TL)</strong><br>TR27 0006 2000 7190 0009 0874 12&nbsp;<strong>(USD)</strong><br>TR97 0006 2000 7190 0006 6436 84&nbsp;<strong>(EURO)</strong></p>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mbr-text py-5 mbr-fonts-style display-4"><strong>İş Bankası<br></strong> Nutiva Türkiye San.Tic. ve Paz. Ltd.Şti.<br><br><strong>IBAN Bilgileri</strong><strong><br></strong>TR62 0006 2000 7190 0006 5888 43 <strong>(TL)</strong><br>TR27 0006 2000 7190 0009 0874 32 <strong>(USD)</strong><br>TR97 0006 2000 7190 0006 7463 83 <strong>(EURO)</strong></p>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mbr-text py-5 mbr-fonts-style display-4"><strong>QNB Finansbank<br></strong> Nutiva Türkiye San.Tic. ve Paz. Ltd.Şti.<br><br><strong>IBAN Bilgileri</strong><br>TR62 0006 2000 7190 0006 9832 93 <strong>(TL)</strong><br>TR27 0006 2000 7190 0009 5372 92 <strong>(USD)</strong><strong><br></strong>TR97 0006 2000 7190 0006 6723 84 <strong>(EURO)</strong></p>
                        </div>
                    </div>
                </div>
            </div>
                <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center"><a class="btn btn-black-outline display-4" href="mailto:odeme.bildirimi@nutrivakokonat.com.tr?subject=Ödeme Bildirimi&body= ...... numaralı siparişim için ....... bankası hesabınıza ...... adıyla ..... TL ödeme gerçekleştirdim.">ÖDEME BİLDİRİMİ YAP</a></div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</section>

<section class="clients cid-qzsTCnMCy7" id="clients-1f" data-rv-view="1548">
<div class="container">
<p style="font-size:14px;" class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
<a class="link display-4" href="tel:08504443344">
(0850) 444 33 44 </a> / <a class=" link  display-4" href="mailto:musterihizmetleri@nutivakokonat.com.tr">
musteri.hizmetleri@nutivakokonat.com.tr </a> / <a class="link display-4" href="sozlesme.html" target="_blank">
Mesafeli Satış Sözleşmesi</a> <br><br>
<a class=" link text-white display-4" href="#menu2-i">
2019 ©</a>
</li></p>
</div>
</section>

<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/popper/popper.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
<script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
<script src="assets/as-pie-progress/jquery-as-pie-progress.min.js"></script>
<script src="assets/jarallax/jarallax.min.js"></script>
<script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/order/js/main.js"></script>
<script src="assets/order/js/simply-toast.js"></script>
<script src="assets/order/js/guardian.js"></script>
<script src="assets/order/js/sweetalert-dev.js"></script>
<input name="animation" type="hidden">


<?php if(isset($_SESSION['urun']) && isset($_SESSION['odemesekli']) ) { ?>
<?php } ?>

<?php

if(isset($_GET['basarili'])){
$a = $_GET['siparis'];

header("location: index.php?siparis=$a");

unset($_POST);
}


if( isset($_GET['siparis']) &&$_GET['siparis']){

echo '  
<script>
swal( {  title: "Teşekkür ederiz! <br> Siparişinizi aldık <br>",   text: "Sipariş numaranızı not almayı unutmayın",  
type: "success", html:true, showConfirmButton: true, confirmButtonColor: "#99150c",  
confirmButtonText: "Sipariş Numaranız '.$_GET['siparis'].'", showCancelButton: true,     cancelButtonText: "Siteye Dön"},


function(isConfirm){   if (isConfirm) {   
window.location = "index.php"; } 





});
</script>

';

$db9->disconnect();



}
?>

<script>
<?php echo $ga; ?>

</script>

<script>
    $('document').ready(function(){
        function pickTextColorBasedOnBgColorAdvanced(bgColor, lightColor, darkColor) {
            var color = (bgColor.charAt(0) === '#') ? bgColor.substring(1, 7) : bgColor;
            var r = parseInt(color.substring(0, 2), 16); // hexToR
            var g = parseInt(color.substring(2, 4), 16); // hexToG
            var b = parseInt(color.substring(4, 6), 16); // hexToB
            return (((r * 0.299) + (g * 0.587) + (b * 0.114)) > 186) ?
                darkColor : lightColor;
        }

        var TextColor = pickTextColorBasedOnBgColorAdvanced("#<?php echo $ThemeColor; ?>", "#ffffff", "#000000");
        $('.ThemeColor *, .btn-black, .btn-black:active, .navbar a, .first_').attr('style', 'color:'+ TextColor +' !important');
        $('.cid-qzrzV4rhXd button.navbar-toggler .hamburger span').attr('style', 'background-color:'+ TextColor +' !important');
        $('.cid-qzUB9dsmda .nav-tabs .nav-link,.cid-qzUB9dsmda .nav-tabs .nav-link:hover,.cid-qzUB9dsmda .nav-tabs .nav-link:active').attr('style', 'color: <?php echo $TextColor; ?> !important');

    })
</script>

</body>
</html>
<? ob_end_flush(); ?>
