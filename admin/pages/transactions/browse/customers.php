<?php

$sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];
$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
/*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}*/


if($row) {

foreach ($row as $column => $value) {
    echo "<div><label>".$column."</label></div>\n";
    echo "<div><input type='text' value='".$value."'></div>";
}

} else {
    echo "Kayıt bulunamadı.";
}