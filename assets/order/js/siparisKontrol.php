<?php 
include('../../../yonetim/class/mysql_crud.php');

if(isset($_POST['siparisNo']))
{
$db9 = new Database();
$db9->connect();
$sn =$db9->escapeString($_POST['siparisNo']);
$db9->select('orders','durum',NULL,'order_id='.$sn);
$res3 = $db9->getResult();
foreach($res3 as $output3){
switch ($output3["durum"]) {
case "1":
$durum="info";
$durumadi="İşlem Bekliyor";
break;
case "2":
$durum="warning";
$durumadi="İncelendi";
break;
case "3":
$durum="info";
$durumadi="Hazırlanıyor";
break;
case "4":
$durum="success";
$durumadi="Kargolandı";
break;
case "5":
$durum="success";
$durumadi="Teslim Edildi";
break;
default:
break;
}
}
}

if(isset($_POST['siparisNo']) && isset($durumadi) ){

echo '  
<div class="alert alert-light display-4 col-lg-12" style="font-size:2em">Siparişiniz <b> \''.$durumadi.'\'</b> !</div> ';
 
}

else if(isset($_POST['siparisNo']) && !isset($durumadi) ){

echo '  


<div class="alert alert-danger display-4 col-lg-12" style="font-size:2em"><b>Sipariş Bulunamadı</b></div> 
';

}


 ?>