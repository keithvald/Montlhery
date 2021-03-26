<?php
$db_host = 'localhost';
$db_name = 'Montlhery';
$db_username = 'root';
$db_password = 'Mike12klkn34';

try {
	//Connexion a la Base de données
	$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);;
	$db->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
	echo 'Erreur : ' . $e->getMessage();
	die(); 
}
