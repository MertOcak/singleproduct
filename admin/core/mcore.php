<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db = 'singleproduct';
$user = 'root';
$pass = 'root';
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

if(isset($_POST['action'])){
    switch ($_POST['action']) {
        case "delete":
            $sql = "DELETE FROM " . $_POST['tableName'] . " WHERE Id in ";
            $sql .= "('" . implode("','", array_values($_POST['id'])) . "')";
            $pdo->query($sql);
            break;

    }
}

function statusCheck($x)
{
    switch ($x) {
        case 1:
            return 'Yeni';
            break;
        case 2:
            return 'İncelendi';
            break;
        case 3:
            return 'Hazırlanıyor';
            break;
        case 4:
            return 'Kargolandı';
            break;
        case 5:
            return 'İptal Edildi';
            break;
        case 6:
            return 'Tamamlandı';
            break;
        default:
    }
}

function statusColorCheck($x)
{
    switch ($x) {
        case 1:
            return 'success';
            break;
        case 2:
            return 'warning';
            break;
        case 3:
            return 'primary';
            break;
        case 4:
            return 'danger';
            break;
        case 5:
            return 'info';
            break;
        case 6:
            return 'default';
            break;
        default:
    }
}

/*$query = $db->prepare("INSERT INTO uyeler SET
uye_kadi = :kadi,
uye_sifre = :sifre,
uye_eposta = :eposta");
$insert = $query->execute(array(
    "sifre" => "123456",
    "eposta" => "tayfunerbilen@gmail.com",
    "kadi" => "Tayfun Erbilen",
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "insert işlemi başarılı!";
}*/

/*$query = $db->prepare("INSERT INTO uyeler SET
uye_kadi = ?,
uye_sifre = ?,
uye_eposta = ?");
$insert = $query->execute(array(
    "Tayfun Erbilen", "123456", "tayfunerbilen@gmail.com"
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "insert işlemi başarılı!";
}*/


/*$stmt = $pdo->query('SELECT id FROM orders');
while ($row = $stmt->fetch())
{
    echo $row['id'] . "\n";

}*/


/*$stmt = $pdo->prepare('SELECT * FROM orders WHERE email = ? AND status=?');
$stmt->execute([$email, $status]);
$user = $stmt->fetch();*/


// or
/*$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND status=:status');
$stmt->execute(['email' => $email, 'status' => $status]);
$user = $stmt->fetch();*/


/*$data = [
    "Mert" => "Ocak",
    "Bihter" =>  "Hepvidinli",
];
$stmt = $pdo->prepare('INSERT INTO customers (FirstName, LastName) VALUES( ? , ? ) ');
foreach ($data as $FirstName => $LastName)
{
    $stmt->execute([$FirstName, $LastName]);
}*/

// Updated

/*$sql = "UPDATE users SET name = ? WHERE id = ?";
$pdo->prepare($sql)->execute([$name, $id]);*/

// Delete

/*$stmt = $pdo->prepare("DELETE FROM goods WHERE category = ?");
$stmt->execute([$cat]);
$deleted = $stmt->rowCount();*/