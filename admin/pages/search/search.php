<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once ($_SERVER['DOCUMENT_ROOT'] . '/admin/config/config.php');

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

if(isset($_POST['orderId']) && !empty($_POST['orderId']) && is_numeric($_POST['orderId'])) {

    $check = $pdo->query("SELECT id FROM orders WHERE id=".$_POST['orderId'])->fetch();
    if($check > 0) {
        header("location: /admin/pages/transactions/orders/browse/".$_POST['orderId']);
    } else {
        header("location: /admin/pages/notfound/");
    }


} else {
    header("location: /admin/pages/notfound/");

}

?>