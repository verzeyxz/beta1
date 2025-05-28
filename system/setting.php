<?php
    date_default_timezone_set("Asia/Bangkok");

    // require_once '../vendor/autoload.php';

    define('SITE_KEY', '0x4AAAAAAAHACgftlJ3tmLqx');
    define('SECRET_KEY', '0x4AAAAAAAHACr3lIc3guX90acCBgf78kd8');

    define('LOCAL_WEB', 'http://localhost/pp/');
    define('SECRET_WEB', 'GGEZ-T6QKKHWH8');
    define("ENCRYPTION_KEY", "GGEZ-T6QKKHWH8!@#$%^&*");

    // --------------- encryp id pass in shop --------------
    define("CODE_IV", "1234567891011121");
    define("CODE_KEY", "MtWojJTOaAakTUNGSHOP");
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = CODE_IV;
    $encryption_key = CODE_KEY;
    $decryption_iv = CODE_IV;
    $decryption_key = CODE_KEY;
    // --------------- encryp id pass in shop --------------

    // --------------- status --------------
    $admin_status = 9; //status admin db
    $user_agent = 7; //status agent db
    // --------------- status --------------

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'pp';

    $connect = new mysqli($host,$user,$pass,$name);
    $connect->query('SET names utf8'); 
    if($connect->connect_errno){
        exit($connect->connect_error);
    }
    session_start();
    
?>