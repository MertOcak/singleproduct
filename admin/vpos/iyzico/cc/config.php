<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-UD2TcxWh3T45R1aW2zy9r8gxbv1A2cnp");
        $options->setSecretKey("sandbox-KteAu8pJRPJs14mIKL6JOjznf7Bm7b8K");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}