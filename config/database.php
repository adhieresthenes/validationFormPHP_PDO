<?php

$DB_host = 'localhost'; 
$DB_user = 'root'; //ini hanya berlaku di Xampp
$DB_pass = ''; //ini hanya berlaku di Xampp
$DB_name = 'pdo_registertest';

try {
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user, $DB_pass);
	$DB_con -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e){
	echo $e->getMessage();
}

include_once 'user.php';
$user = new user ($DB_con);
?>