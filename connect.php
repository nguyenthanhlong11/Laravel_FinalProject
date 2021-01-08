<?php 

error_reporting(1);
$link = mysqli_connect("localhost", "root", "", "banhang");
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_set_charset($link,'utf8');
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else
	
 
?>