<?php ob_start(); ?>
<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// anti flood protection
/*if ($_SESSION['last_session_request'] > time() - 60) {
    header("location: flood/flood.php");
    exit;
}*/

$_SESSION['last_session_request'] = time();

include_once('admin/config/config.php');

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

/*$db = new Database();
$db->connect();
$tarih = date("Y-m-d H:i:s");*/

/*$urun = $db->escapeString($_POST['urun']);
$db->select('products','urun_fiyat,urun_id',NULL,'urun_ad="'.$urun.'"'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$res = $db->getResult();

$dbk = new Database();
$dbk->connect();
$dbk->select('payment','kargo_tutar',NULL,'payment_id=1'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions*/
/*$resk = $dbk->getResult();
foreach($resk as $outputk){
  $_SESSION['kargo_tutar']=$outputk['kargo_tutar']; 
}*/

/*$dbk->disconnect();*/

$token = session_id();


if ($_POST && ($token === $_POST['token']) && !empty($_POST['FirstName']) && !empty($_POST['LastName']) && !empty($_POST['Mail']) && !empty($_POST['Phone']) && !empty($_POST['Address']) && !empty($_POST['Product']) && !empty($_POST['PaymentMethodId']) && !empty($_POST['agreement']) && $_POST['agreement'] === "checked") {

    $_SESSION['Name'] = $_POST['FirstName'] . " " . $_POST['LastName'];
    $_SESSION['Mail'] = $_POST['Mail'];
    $_SESSION['Phone'] = $_POST['Phone'];
    $_SESSION['Address'] = str_replace('"', " ", $_POST['Address']);
    $_SESSION['Product'] = $_POST['Product'];
    $_SESSION['PaymentMethodId'] = $_POST['PaymentMethodId'];

    if (isset($_SESSION['referenceUrl'])) {
        $referenceUrl = $_SESSION['referenceUrl'];
    } else {
        $referenceUrl = "Direkt Erişim";
    }

    $sql = "INSERT INTO customers SET FirstName= ?, LastName = ?, Mail = ?, Phone = ?, Address = ?, Active = ?";
    $pdo->prepare($sql)->execute([$_POST['FirstName'], $_POST['LastName'], $_POST['Mail'], $_POST['Phone'], $_POST['Address'], 1]);
    $customerId = $pdo->lastInsertId();
    echo $customerId;
    $extrasTotal = 0;
    $extras = $pdo->query("SELECT * FROM extras WHERE Active = 1 AND Status = 1")->fetchAll();
    if($extras) {
        foreach ($extras as $shippingFee_) {
            $extrasTotal += floatval($shippingFee_['Price']);
        }
    } else {
        $extrasTotal = 0;
    }

    $productPrice = $pdo->query("SELECT Price FROM products WHERE Id =".$_POST['Product'])->fetch();
    $productPrice = $productPrice['Price'];

    $totalPrice = ( floatval($_POST['Amount']) * floatval($productPrice) ) + floatval($extrasTotal);

    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO orders SET Product = ?, Amount = ?, CustomerId = ?, PaymentId = ?, CreatedAt = ?, ProductPrice = ?, TotalPrice = ?, ShippingFee = ?, ReferenceUrl= ?, Active = ?";
    $pdo->prepare($sql)->execute([$_POST['Product'], $_POST['Amount'], $customerId, $_POST['PaymentMethodId'], $date, $productPrice, $totalPrice, $extrasTotal, $referenceUrl, 1]);
    $orderId = $pdo->lastInsertId();

    $sql = "INSERT INTO notes SET Id= ?";
    $pdo->prepare($sql)->execute([$orderId]);
    $_SESSION['orderId'] = $orderId;
/*    header("location: /success/");*/

} else {
/*    header("location: /failed/");*/
    echo "failed";
}

/*foreach ($res as $output) {
    $adres = str_replace('"', " ", $output["adres"]);
    $urun_id = $output['urun_id'];
    $urun_net = (floatval($output['urun_fiyat']));
    $toplam = (floatval($output['urun_fiyat']) + floatval($_SESSION['kargo_tutar']));
}

$kontrol = session_id();

if ($urun_id && ($kontrol == $_POST['session'])) {

    $_SESSION['ad'] = $db->escapeString($_POST['ad']);
    $_SESSION['urun'] = $db->escapeString($_POST['urun']);
    $_SESSION['urun_id'] = $urun_id;
    $_SESSION['urun_fiyat'] = $output['urun_fiyat'];
    $_SESSION['mail'] = $db->escapeString($_POST['email']);
    $_SESSION['telefon'] = $db->escapeString($_POST['telefon']);
    $_SESSION['odemesekli'] = $db->escapeString($_POST['odemesekli']);
    $_SESSION['adres'] = $db->escapeString($_POST['adres']);
    $_SESSION['urun_tutar'] = $urun_net;
    $_SESSION['tutar'] = $toplam;
    if ($_SESSION['refUrl']) {
        $refURL = $_SESSION['refUrl'];
    } else {
        $refURL = "Direkt Erişim";
    }


    $db->insert('orders', array(
        'urun' => $_SESSION['urun'],
// 'adet'=>$_SESSION['adet'],
        'isim' => $_SESSION['ad'],
        'mail' => $_SESSION['mail'],
        'telefon' => $_SESSION['telefon'],
        'odemesekli' => $_SESSION['odemesekli'],
// 'sehir'=>$_SESSION['sehir'] ,
// 'ilce'=>$_SESSION['ilce'] ,
        'adres' => $_SESSION['adres'],
        'tarih' => $tarih,
        'urun_id' => $_SESSION['urun_id'],
        'urun_tutar' => $_SESSION['urun_tutar'],
        'kargo_tutar' => $_SESSION['kargo_tutar'],
        'tutar' => $_SESSION['tutar'],
        'ref' => $refURL
    ));  // Table name, column names and respective values
    $res = $db->getResult();
    $location = $res[0];
    $db->disconnect();

    header("location: index.php?siparis=$location");

} else {
    header("location: index.php#");

}*/

ob_end_flush(); ?>