<?php
header("Access-Control-Allow-Origin: *");

require_once "wpphpmailer.php";

$phpmailer = new PHPMailer();
$email = $_REQUEST["email"];
$subject = $_REQUEST["subject"];
$message = $_REQUEST["message"];
$access_key = $_REQUEST["access_key"];
@$htmlmode = $_REQUEST["htmlmode"];
/*
       echo $email."<br />";
       echo $subject."<br />";
       echo $message.rand(1000,9999)."<br />";
       echo $access_key."<br />";
        */

if (md5($access_key) == "fdcc3520d002f67260e51d67fce5a03b") {
    $phpmailer->isSMTP(); //switch to smtp
    $phpmailer->Host = 'mail.stationcom.net';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587;
    $phpmailer->Username = 'drink@drinksasa.co.ke';
    $phpmailer->Password = 'X)=(+HOhEq%8';
    $phpmailer->SMTPSecure = '';
    $phpmailer->From = 'drink@drinksasa.co.ke';
    $phpmailer->FromName = 'drinksasa.co.ke';

    if ($htmlmode == "1") {
        $phpmailer->isHTML(true);
    }

    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $message;
    $phpmailer->addAddress($email, "drinksasa.co.ke");
    $phpmailer->isMail();

    try {
        echo $phpmailer->send();
    } catch (phpmailerException $e) {
        echo $e->getCode();
    }
}
