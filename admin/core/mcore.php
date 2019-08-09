<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db   = 'singleproduct';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

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