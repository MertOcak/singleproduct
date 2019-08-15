<?php
$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'photos';   //2

if (!empty($_FILES)) {

    $result = explode('.',str_replace(' ', '', basename($_FILES['file']['name'])));
    $up = $result[0].date('dmY').'_'.time().'.'.end($result);
    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath. $up;  //5

    move_uploaded_file($tempFile,$targetFile); //6

}
?>