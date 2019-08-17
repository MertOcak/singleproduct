<?php ob_start(); ?>
<?php session_start();
include('yonetim/class/mysql_crud.php');
$db = new Database();
$db->connect();
$urun = $db->escapeString($_POST['urun']);
$db->select('products','urun_fiyat,urun_id',NULL,'urun_ad="'.$urun.'"'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$res = $db->getResult();


$dbk = new Database();
$dbk->connect();
$dbk->select('payment','kargo_tutar',NULL,'payment_id=1'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$resk = $dbk->getResult();
foreach($resk as $outputk){
  $_SESSION['kargo_tutar']=$outputk['kargo_tutar']; 
}
// print_r($res);
// print_r($db->getSql());
//$adet = $db->escapeString($_POST['adet']);
$ad = $db->escapeString($_POST['ad']);
//$soyad = $db->escapeString($_POST['soyad']);
$isim = "$ad $soyad"; 
$mail = $db->escapeString($_POST['mail']);
$telefon = $db->escapeString($_POST['telefon']);
$odemesekli = $db->escapeString($_POST['odemesekli']);
$sehir = $db->escapeString($_POST['sehir']);
$ilce = $db->escapeString($_POST['ilce']);
$adres = $db->escapeString($_POST['adres']);
$uruntutar = $db->escapeString($_POST['urunfiyat']);
$tutar = $db->escapeString($_POST['tutar']);
$tarih = date("Y-m-d H:i:s"); 

?>
<style type="text/css">

  html {
    width: 100wh;
    height: 90vh;
    color: #fff;
    background: linear-gradient(-45deg, #EE7752, #971715, #EE7752, #971715);
    background-size: 400% 400%;
    -webkit-animation: Gradient 15s ease infinite;
    -moz-animation: Gradient 15s ease infinite;
    animation: Gradient 15s ease infinite;
  }

  @-webkit-keyframes Gradient {
    0% {
      background-position: 0% 50%
    }
    50% {
      background-position: 100% 50%
    }
    100% {
      background-position: 0% 50%
    }
  }

  @-moz-keyframes Gradient {
    0% {
      background-position: 0% 50%
    }
    50% {
      background-position: 100% 50%
    }
    100% {
      background-position: 0% 50%
    }
  }

  @keyframes Gradient {
    0% {
      background-position: 0% 50%
    }
    50% {
      background-position: 100% 50%
    }
    100% {
      background-position: 0% 50%
    }
  }

  .sk-cube-grid {
    width: 100px;
    height: 100px;
    margin: 300px auto;
  }

  .sk-cube-grid .sk-cube {
    width: 33%;
    height: 33%;
    background-color: #FFF;
    float: left;
    -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
    animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out; 
  }
  .sk-cube-grid .sk-cube1 {
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s; }
    .sk-cube-grid .sk-cube2 {
      -webkit-animation-delay: 0.3s;
      animation-delay: 0.3s; }
      .sk-cube-grid .sk-cube3 {
        -webkit-animation-delay: 0.4s;
        animation-delay: 0.4s; }
        .sk-cube-grid .sk-cube4 {
          -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s; }
          .sk-cube-grid .sk-cube5 {
            -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s; }
            .sk-cube-grid .sk-cube6 {
              -webkit-animation-delay: 0.3s;
              animation-delay: 0.3s; }
              .sk-cube-grid .sk-cube7 {
                -webkit-animation-delay: 0s;
                animation-delay: 0s; }
                .sk-cube-grid .sk-cube8 {
                  -webkit-animation-delay: 0.1s;
                  animation-delay: 0.1s; }
                  .sk-cube-grid .sk-cube9 {
                    -webkit-animation-delay: 0.2s;
                    animation-delay: 0.2s; }

                    @-webkit-keyframes sk-cubeGridScaleDelay {
                      0%, 70%, 100% {
                        -webkit-transform: scale3D(1, 1, 1);
                        transform: scale3D(1, 1, 1);
                      } 35% {
                        -webkit-transform: scale3D(0, 0, 1);
                        transform: scale3D(0, 0, 1); 
                      }
                    }

                    @keyframes sk-cubeGridScaleDelay {
                      0%, 70%, 100% {
                        -webkit-transform: scale3D(1, 1, 1);
                        transform: scale3D(1, 1, 1);
                      } 35% {
                        -webkit-transform: scale3D(0, 0, 1);
                        transform: scale3D(0, 0, 1);
                      } 
                    }
                  </style>


                  <!DOCTYPE html>
                  <!-- Responsive Tek Ürün v1 Sipariş Özeti-->
                  <html lang="en">
                  <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="shortcut icon" href="img/fav_site.png" type="image/x-icon">
                    <link rel="icon" href="img/fav_site.png" type="image/x-icon">
                    <title>Siparişiniz İşleniyor</title>
                    <link href="css/bootstrap.min.css" rel="stylesheet">
                    <link href="css/ozet.css" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css?family=Hind&amp;subset=latin-ext" rel="stylesheet">
                    <link rel="stylesheet" type="text/css" href="css/hover-min.css">
                    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>


 <!--      <div class="container-fluid">



        <div id="anasayfa" class="row b0icerik">
          <div class="col-md-12 text-center sayfa banner">
            <h1 style="margin-top: 50px;color:#FFF;"><b>Sipariş Özetiniz</b> </h1>
            <p class="lead" style="color:#FFF;">Bilgileriniz doğru mu?</p> -->


            <?php
            foreach($res as $output){
              $adres=str_replace('"', " ", $output["adres"]);
              $urun_id=$output['urun_id'];
              $urun_net = (floatval($output['urun_fiyat']));
              $toplam = (floatval($output['urun_fiyat'])+floatval($_SESSION['kargo_tutar']));

              if(

                $_POST['ad']==""
                OR $_POST['email']==""
                OR $_POST['telefon']==""
                OR $_POST['urun']==""
                OR $_POST['odemesekli']==""
                OR $_POST['adres']==""

                ){

                header("Location: index.php#gecersizislem#");  


            }
            else {

              $_SESSION['ad'] = $db->escapeString($_POST['ad']);
              $_SESSION['urun'] = $db->escapeString($_POST['urun']);
              $_SESSION['urun_id'] = $urun_id;
              $_SESSION['urun_fiyat']=$output['urun_fiyat'];
              $_SESSION['mail'] = $db->escapeString($_POST['email']);
              $_SESSION['telefon'] = $db->escapeString($_POST['telefon']);
              $_SESSION['odemesekli'] = $db->escapeString($_POST['odemesekli']);
              $_SESSION['adres'] =  $db->escapeString($_POST['adres']);
              $_SESSION['urun_tutar'] = $urun_net;
              $_SESSION['tutar'] = $toplam;
              $db5 = new Database();
              $db5->connect();
              $tarih = date("Y-m-d H:i:s");


              if($_SESSION['urun_id']){
                $db5->insert('orders',array(
                  'urun'=>$_SESSION['urun'],
// 'adet'=>$_SESSION['adet'],
                  'isim'=>$_SESSION['ad'],
                  'mail'=>$_SESSION['mail'],
                  'telefon'=>$_SESSION['telefon'],
                  'odemesekli'=>$_SESSION['odemesekli'] ,
// 'sehir'=>$_SESSION['sehir'] ,
// 'ilce'=>$_SESSION['ilce'] ,
                  'adres'=>$_SESSION['adres'],
                  'tarih'=>$tarih,
                  'urun_id'=>$_SESSION['urun_id'],
                  'urun_tutar'=>$_SESSION['urun_tutar'],
                  'kargo_tutar'=>$_SESSION['kargo_tutar'],
                  'tutar'=>$_SESSION['tutar']
));  // Table name, column names and respective values
                $res = $db5->getResult();
                $location = $res[0];
                header("location: index.php?siparis=$location&basarili");
                unset($_POST);
              } else {
                header("location: index.php");
                unset($_POST);
              }


            }
            ?>



            <?php } ?> 


            <div class="sk-cube-grid">
              <div class="sk-cube sk-cube1"></div>
              <div class="sk-cube sk-cube2"></div>
              <div class="sk-cube sk-cube3"></div>
              <div class="sk-cube sk-cube4"></div>
              <div class="sk-cube sk-cube5"></div>
              <div class="sk-cube sk-cube6"></div>
              <div class="sk-cube sk-cube7"></div>
              <div class="sk-cube sk-cube8"></div>
              <div class="sk-cube sk-cube9"></div>
            </div>

            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
          </body>
          </html>
          <? 

          if(!$_SESSION['ad']){
            header("Location: index.php");  
          }
          ob_end_flush(); ?>