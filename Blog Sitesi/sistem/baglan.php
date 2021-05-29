<?php 
session_start();
ob_start();
try {
	
	$db = new PDO ("mysql:host=localhost; dbname=blogsitesi; charset=utf8;","root","");

} catch (PDOException $error) {
	
	echo "<center> <b> Veritabanına Bağlanılamadı!</b> </center>";
	$error ->getMessage();
}




 ?>