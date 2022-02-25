 <?php error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<?php 
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$host ="localhost";
$user ="root";
$pass = "";
$db= "elarningdb";

$con = new mysqli($host,$user,$pass,$db) or die(mysqli_error($con));

date_default_timezone_set('Asia/Jakarta'); 
 ?>
