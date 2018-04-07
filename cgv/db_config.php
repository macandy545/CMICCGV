<?php  

$dbHost = "localhost";
$dbName = "pdo";
$dbUser = "root";
$dbPass = "";

try {

	$db_Conn = new PDO("mysql:host={dbHost};dbname{dbName}",$dbUser, $dbPass);
	$db_Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	exit("Error Connecting to database!");
}

?>