<?php ob_start(); ?>
<?php session_start(); 

// anti flood protection
if($_SESSION['last_session_request'] > time() - 60){
    // users will be redirected to this page if it makes requests faster than 2 seconds
header("location: flood/flood.php");
exit;
}

$_SESSION['last_session_request'] = time();
include('yonetim/class/mysql_crud.php');
$db = new Database();
$db->connect();
$tarih = date("Y-m-d H:i:s");

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

$dbk->disconnect();

 foreach($res as $output){
              $adres=str_replace('"', " ", $output["adres"]);
              $urun_id=$output['urun_id'];
              $urun_net = (floatval($output['urun_fiyat']));
              $toplam = (floatval($output['urun_fiyat'])+floatval($_SESSION['kargo_tutar']));
}

$kontrol =session_id();

if($urun_id && ($kontrol == $_POST['session']) ){

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
if($_SESSION['refUrl']){
$refURL = $_SESSION['refUrl'];
}else{
$refURL = "Direkt Erişim";
}


$db->insert('orders',array(
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
'tutar'=>$_SESSION['tutar'],
'ref'=>$refURL
));  // Table name, column names and respective values
$res = $db->getResult();
$location = $res[0];
$db->disconnect();

header("location: index.php?siparis=$location");
   
} else {
header("location: index.php#");
   
}

ob_end_flush();