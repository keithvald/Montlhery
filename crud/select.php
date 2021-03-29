<?php
require_once('connect.php');

$sql = 'SELECT * FROM `news`';

//Requête prépareré
$query = $db->prepare($sql);

//Execution Requête
$query->execute();

//Recuperer les donnés dans un tableau assciatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

//Deconexxion BDD
require_once('close.php');
?>
