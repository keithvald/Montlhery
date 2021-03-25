<?php
require_once('session.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
	require_once('connect.php');
	// on clean la valeur d'id
	$id = strip_tags($_GET['id']);

	$sql = 'SELECT * FROM `news` WHERE `id` = :id;';

	// on prépare la requête
	$query = $db->prepare($sql);

	// on "accroche" les paramètres (id) et 
	$query->bindValue(':id', $id, PDO::PARAM_INT);
	$query->execute();
	// on fetch un resultat fetch suffit
	$result = $query->fetch();

	if(!$result){
		$_SESSION['erreur'] = "Cette id n'existe pas";
		header('location:main.php');
	}

	$sql = 'DELETE FROM `news` WHERE `id` = :id;';

	// on prépare la requête
	$query = $db->prepare($sql);

	// on "accroche" les paramètres (id) et 
	$query->bindValue(':id', $id, PDO::PARAM_INT);
	$query->execute();
	require_once('close.php');
	
	$_SESSION['message'] = "News Supprimer";

	unlink("../assets/img/crud/".$result['image']);
	
	header('location:main.php');
}else{
	$_SESSION['erreur'] = "Url invalid";
	header('location:main.php');
}
?>
