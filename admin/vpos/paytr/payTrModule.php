<?php
//
// Tek Ürün Satış Yazılımı PayTR Online Ödeme Alma Modülü
//
session_start();
if(isset($_SESSION['SiparisNo'])){

    $merchant_id	='140193'; // Size Verilen Merchant Id
    $merchant_key	='RwrzLazcPs6844N6'; // Size Verilen Merchant Key
    $merchant_salt	='nC8aj3SpyKJrUnYr'; // Size Verilen Merchant Salt

    $user_ip		=	$_SERVER['REMOTE_ADDR'];
    $merchant_oid	=	$_SESSION['SiparisNo'];
    $email			=	$_SESSION['mail'];
    $payment_amount	=	$_SESSION['tutar']*100;

    $no_installment	=	0; // Taksit yapılmasını istemiyorsanız (Örn cep telefonu satışı) 1 yapın
    $max_installment=	9; // Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız (Örn altın vb kuyum satışı max 4 taksittir) uygun şekilde değiştirin.
    $user_name = $_SESSION['ad']." ".$_SESSION['soyad']; // Müşterinizin sitenizde kayıtlı ad soyad bilgisi
    $user_address = $_SESSION['adres']; // Müşterinizin sitenizde kayıtlı adres bilgisi
    $user_phone = $_SESSION['telefon']; // // Müşterinizin sitenizde kayıtlı telefon bilgisi

    // Bu kısım sitenize göre düzenlenecek


    $merchant_ok_url = "https://".$_SERVER['SERVER_NAME']."/index.php?siparis=".$_SESSION['SiparisNo']; // www.sitenizinadresi.com kısmını kendi siteniz ile değiştirin
    $merchant_fail_url = "https://".$_SERVER['SERVER_NAME']."/index.php?odemeHata=hata"; // www.sitenizinadresi.com kısmını kendi siteniz ile değiştirin

    $user_basket = base64_encode(json_encode(array(
        array($_SESSION['urun'], $payment_amount, 1)
    )));

    $debug_on	=	0;
    $hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment;
    $paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));

    $post_vals=array('merchant_id'=>$merchant_id,
        'user_ip'=>$user_ip,
        'merchant_oid'=>$merchant_oid,
        'email'=>$email,
        'payment_amount'=>$payment_amount,
        'paytr_token'=>$paytr_token,
        'user_basket'=>$user_basket,
        'debug_on'=>$debug_on,
        'no_installment'=>$no_installment,
        'max_installment'=>$max_installment,
        'user_name'=>$user_name,
        'user_address'=>$user_address,
        'user_phone'=>$user_phone,
        'merchant_ok_url'=>$merchant_ok_url,
        'merchant_fail_url'=>$merchant_fail_url
    );

    //echo "<pre>"; print_r($post_vals); exit();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token" );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($ch, CURLOPT_POST, 1 ) ;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0 );
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20 );
    $result = @curl_exec( $ch );
    //echo "<pre>"; print_r($result);echo "</pre>"; exit();

    curl_close($ch);

    $result=json_decode($result,1);


    ?>

     <?php if(!isset($_POST['notify_url'])) ?>
    <html>
    <title>Kredi Kartı Online Ödeme</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/fav_site.png" type="image/x-icon">
    <body>
    <center>
        <h2> Online Kredi / Banka Kartı İle Ödeme</h2>
        <h6> Siparişinizi tamamlamak için ödemenizi yapmalısınız. </h6>
    </center>

    <?php ?>
    <?php

    if($result["status"]=='success' && !isset($_POST['notify_url'])){
        $token=$result["token"];
        ?>
        <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
        <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
        <script>iFrameResize({},'#paytriframe');</script>
        <?php
    }else{
        echo "BIR HATA OLUSTU. LUTFEN DAHA SONRA TEKRAR DENEYIN.";
        echo "<br>";
        echo $result["reason"];
        exit();
    }
    ?>

 <?php if(!isset($_POST['notify_url'])) ?>

            <br />
    <center>
        <b><?php echo date("Y"); ?></b>
    </center>
    </html>
    </body>


        <?php


    ?>


    <?php

} else if(isset($_POST['notify_url'])) {
    echo "OK";
}
else{
    header("Location: index.php");
    exit();

}?>