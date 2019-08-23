<?php
require_once('config.php');
ob_start();
session_start();


# create request class
$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($_SESSION['SiparisNo']);
$request->setPrice($_SESSION['tutar']);
$request->setPaidPrice($_SESSION['tutar']);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setBasketId($_SESSION['SiparisNo']);
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
$backUrl = "http://".$_SERVER['SERVER_NAME']."/index.php?siparis=".$_SESSION['SiparisNo'];
$request->setCallbackUrl($backUrl);
$request->setEnabledInstallments(array(2, 3, 6, 9));

function IpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))  
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$tarih = new DateTime();


$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId($_SESSION['SiparisNo']);
$buyer->setName($_SESSION['ad']);
$buyer->setSurname($_SESSION['soyad']);
$buyer->setGsmNumber($_SESSION['telefon']);
$buyer->setEmail($_SESSION['mail']);
$buyer->setIdentityNumber("00000000000");
$buyer->setLastLoginDate($tarih->format('Y-m-d H:i:s'));
$buyer->setRegistrationDate($tarih->format('Y-m-d H:i:s'));
$buyer->setRegistrationAddress($_SESSION['adres']);
$buyer->setIp("1");
$buyer->setCity($_SESSION['sehir']);
$buyer->setCountry("Türkiye");
$buyer->setZipCode("00000");
$request->setBuyer($buyer);

$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName($_SESSION['isim']);
$shippingAddress->setCity($_SESSION['sehir']);
$shippingAddress->setCountry("Türkiye");
$shippingAddress->setAddress($_SESSION['adres']);
$shippingAddress->setZipCode("00000");
$request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName($_SESSION['isim']);
$billingAddress->setCity($_SESSION['sehir']);
$billingAddress->setCountry("Türkiye");
$billingAddress->setAddress($_SESSION['adres']);
$billingAddress->setZipCode("00000");
$request->setBillingAddress($billingAddress);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId($_SESSION['SiparisNo']);
$firstBasketItem->setName($_SESSION['urun']);
$firstBasketItem->setCategory1("Tek Ürün");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice($_SESSION['tutar']);
$basketItems[0] = $firstBasketItem;


$request->setBasketItems($basketItems);

# make request
$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

# print result
// print_r($checkoutFormInitialize->getStatus());
// print_r($checkoutFormInitialize);
// print_r($checkoutFormInitialize->getStatus());
print_r($checkoutFormInitialize->getCheckoutFormContent());
ob_end_flush();

?>
<!-- Iyzico  -->
<html>
<title>Kredi / Banka Kartı Online Ödeme</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../../img/fav_site.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin-ext" rel="stylesheet">
<style>
html, body {margin: 0; height: 100%; overflow: hidden}

body{
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f5f6f6+0,dbdce2+21,b8bac6+49,dddfe3+80,f5f6f6+100;Grey+Pipe */
background: #f5f6f6; /* Old browsers */
background: -moz-linear-gradient(top, #f5f6f6 0%, #dbdce2 21%, #b8bac6 49%, #dddfe3 80%, #f5f6f6 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f6f6', endColorstr='#f5f6f6',GradientType=0 ); /* IE6-9 */
margin-bottom:-90px;  font-family: 'Open Sans', sans-serif;
  color:#000;
}
.outer {
    display: table;
    position: absolute;
    height: 100%;
    width: 100%;
}

.middle {
    display: table-cell;
    vertical-align: middle;
}

.inner {
    margin-left: auto;
    margin-right: auto; 
    width: 90%;
}

</style>
<body>
<div class="outer">
  <div class="middle">
    <div class="inner">
<center>
<h1 class="form-control"> Online Kredi / Banka Kartı İle Ödeme</h1>
<h3 style="color: #666;"> Siparişinizi tamamlamak için ödemenizi yapmalısınız. </h3>
</center>
<div id="iyzipay-checkout-form" class="responsive"></div>
<br />
<center><b><?php echo date("Y"); ?></b></center>
</div></div>
</div>
</html>
</body>