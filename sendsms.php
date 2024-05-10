<?php
include "africastalking.php";

$mobile = $_REQUEST["mobile"];
$message =  $_REQUEST["message"];
$accesscode = $_REQUEST["accesscode"];

if (md5($accesscode)=="d93591bdf7860e1e4ee2fca799911215")
{
sendSMSAT($message , $mobile);
}
?>