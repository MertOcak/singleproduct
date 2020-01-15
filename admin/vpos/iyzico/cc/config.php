<?php

require_once('../IyzipayBootstrap.php');
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
    $ayarlar = $pdo->query("SELECT * FROM vposes WHERE id=1")->fetch();
    $apiKey = $ayarlar['ApiKey'];
    $secretKey = $ayarlar['SecretKey'];
    $baseUrl = $ayarlar['BaseUrl'];

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        global $apiKey;
        global $secretKey;
        global $baseUrl;
        $options = new \Iyzipay\Options();
        $options->setApiKey($apiKey);
        $options->setSecretKey($secretKey);
        $options->setBaseUrl($baseUrl);
        return $options;
    }
}
