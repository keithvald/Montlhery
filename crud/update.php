<?php
session_start();

if($_POST){
	if (isset($_POST['id']) && !empty($_POST['id'])){
		$id = strip_tags($_POST['id']);
	}else{
		$_SESSION['erreur'] = "Le champ id est vide ou pas definie";
	};

	if (isset($_POST['auteur']) && !empty($_POST['auteur'])){
		$auteur = strip_tags($_POST['auteur']);
	}else{
		$_SESSION['erreur'] = "Le champ auteur est vide ou pas definie";
	};

	if (isset($_POST['image']) && !empty($_POST['image'])){
		$image = strip_tags($_POST['image']);
	}else{
		$_SESSION['erreur'] = "Le champ image est vide ou pas definie";
	};
	
	if (isset($_POST['text']) && !empty($_POST['text'])){
		$text = strip_tags($_POST['text']);
	}else{
		$_SESSION['erreur'] = "Le champ text est vide ou pas definie";
	};

	if (isset($id) && isset($auteur) && isset($image) && isset($text)){
		require_once('connect.php');
		$sql = "UPDATE `news` SET `auteur`=:newsAuteur, `image`=:newsImage, `text`=:newsText WHERE `id`=:id;";

		$query = $db->prepare($sql);
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->bindValue(':newsAuteur', $auteur, PDO::PARAM_STR);
		$query->bindValue(':newsImage', $image, PDO::PARAM_STR);
		$query->bindValue(':newsText', $text, PDO::PARAM_STR);
		$query->execute();
		
		$_SESSION['message'] = "News modifié";
		require_once('close.php');
		header('location: main.php');
	}
};

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
?>
<!DOCTYPE html>

<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ajouter une news</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	</head>

	<body>
		<main class="container">
			<div class="row">
				<section class="col-12">
					<?php
					if(!empty($_SESSION['erreur'])){
					?>
					<div class="alert alert-danger" role="alert">
						<?= 
						$_SESSION['erreur'];
						?>
					</div>
					<?php
					$_SESSION['erreur'] ="";
					}
					?>
					<h1>Ajout news</h1>
					<form action="" method="post">
						<fieldset class="row g-3 fieldset">
							<legend>
								Modifier news
							</legend>

							<div class="col-md-6">
								<label for="auteur" class="form-label">Auteur</label>
								<input type="text" name="auteur" class="form-control" value="<?= $result['auteur'];?>">
							</div>


							<div class="col-md-6">
								<label for="image" class="form-label">Image</label>
								<input type="text" name="image" class="form-control" value="<?= $result['image'];?>">
							</div>

							<div class="col-12">
								<label for="text" class="form-label">Text</label>
								<textarea name="text" class="form-control" cols="30" rows="5"><?= $result['text'];?></textarea>
							</div>

							<div class="col-12">
								<input type="hidden" name="id" value="<?= $result['id'];?>">
							</div>

							<div class=" col-12">
								<input type="submit" class="btn btn-success" value="Modifier">
							</div>
						</fieldset>
					</form>

				</section>
			</div>
		</main>

	</body>

</html>
