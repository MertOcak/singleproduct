<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/core/mcore.php");


$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'photos';   //2


/*Product Images*/

/*if( isset($_POST['productPhotoId']) && isset($_POST['Account']) && isset($_POST['Status'])) {
    $sql = "UPDATE bankaccounts SET Name = ?, Account = ?, Status = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$_POST['Name'], $_POST['Account'], $_POST['Status'], $_GET['id'] ]);
}

if( isset($_POST['action']) && $_POST['action'] == "add" && isset($_POST['Name']) && isset($_POST['Account'])  && isset($_POST['Status']) ) {
    $sql = "INSERT INTO bankaccounts SET Name = ?, Account = ?, Status = ?";
    $pdo->prepare($sql)->execute([$_POST['Name'], $_POST['Account'], $_POST['Status']]);
}*/

if (!empty($_FILES) && isset($_POST['productPhotoId']) ) {

    $result = explode('.',str_replace(' ', '', basename($_FILES['file']['name'])));
    $up = $result[0].date('dmY').'_'.time().'.'.end($result);
    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath. $up;  //5

    $path ='/admin/pages/upload/photos/'. $up;


    move_uploaded_file($tempFile,$targetFile); //6

    echo $_POST['productPhotoId'];

    $statement = $pdo->prepare('INSERT INTO photos (id, Family, Path, Active)
    VALUES (:id, :family, :path, :active)');

    $statement->execute([
        'id' => $_POST['productPhotoId'],
        'family' => 'products',
        'path' => $path,
        'active' => 1,
    ]);

}