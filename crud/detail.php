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
}else{
	$_SESSION['erreur'] = "Url invalid";
	header('location:main.php');
};

setlocale(LC_TIME, 'fr_FR.UTF-8');
$date = ucfirst(strftime("%A %e %B %Y %T", strtotime($result['dateCreation'])));
?>
<!DOCTYPE html>

<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Detail Produit</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	</head>

	<body>
		<main class="container">
			<div class="row">
				<section class="col-12">
					<h1>Detail du produit <?= $result['id']; ?> </h1>
					<p>Id: <?= $result['id']; ?></p>
					<p>Image:
						<img src="../assets/img/crud/<?= $result['image']; ?>" height="100" width="100"
							alt="<?= $result['image']; ?>">
					</p>
					<p>Lien: <?= $result['lien']; ?></p>
					<p>Sommaire: <?= $result['sommaire']; ?></p>
					<p>Text: <?= $result['text']; ?></p>
					<p>Auteur: <?= $result['auteur']; ?></p>
					<p>Date de creation: <?= $date; ?></p>
					<a href="main.php" class="btn btn-info" target="" rel="noopener noreferrer">Retour</a>
					<a href="update.php?id=<?= $result['id']; ?>" class="btn btn-warning" target=""
						rel="noopener noreferrer">Modification</a>
					<a href="delete.php?id=<?= $result['id'] ?>" class="btn btn-danger" target="" rel="noopener noreferrer">
						Supprimer
					</a>

				</section>
			</div>
		</main>

	</body>

</html>
