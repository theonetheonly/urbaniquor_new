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
    $phpmailer->Username = 'msoft@stationcom.net';
    $phpmailer->Password = 'wlv19AZA3gZ]';
    $phpmailer->SMTPSecure = '';
    $phpmailer->From = 'msoft@stationcom.net';
    $phpmailer->FromName = 'MSOFT PTUMS';

    if ($htmlmode == "1") {
        $phpmailer->isHTML(true);
    }

    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $message;
    $phpmailer->addAddress($email, "Msoft");
    $phpmailer->isMail();

    try {
        echo $phpmailer->send();
    } catch (phpmailerException $e) {
        echo $e->getCode();
    }
}
