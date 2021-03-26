<?php
require_once('session.php');
if($_POST){
	if (isset($_POST['auteur']) && !empty($_POST['auteur'])){
		$auteur = strip_tags($_POST['auteur']);
	}else{
		$_SESSION['erreur'] = "Le champ auteur est vide ou pas definie";
	};

	if (isset($_POST['titre']) && !empty($_POST['titre'])){
		$titre = strip_tags($_POST['titre']);
	}else{
		$_SESSION['erreur'] = "Le champ titre est vide ou pas definie";
	};

	if ($_FILES['file']['size'] != 0 && $_FILES['file']['size'] < 4194304 && !empty($_FILES['file']['tmp_name'])){
		$filename = $_FILES['file']['name'];
		$location = "../assets/img/crud/".$filename;

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$typeMime = mime_content_type($_FILES['file']['tmp_name']);
			if( $typeMime == "image/png" || $typeMime == "image/jpeg"){
				move_uploaded_file($_FILES['file']['tmp_name'], $location);
				$imageVerification = "Image corectement telecharger";
				$_SESSION['message'] = $imageVerification;
			}else{
				$_SESSION['erreur'] = "Le fichier n'est pas une image. Format .png et .jpg accepter seulement. Format actuel: " . $typeMime;
			};
		}else{
			$_SESSION['erreur'] .= "Erreur l'image ne c'est pas ajouté";
		};
	}else{
		$_SESSION['erreur'] = "Le fichier est vide ou trop grand. Taille maximum 4 mb";
	};

	if (isset($_POST['lien']) && !empty($_POST['lien'])){
		$lien = $_POST['lien'];
	}else{
		$lien = "";
	};

	if (isset($_POST['sommaire']) && !empty($_POST['sommaire'])){
		$sommaire = strip_tags($_POST['sommaire']);
	}else{
		$_SESSION['erreur'] = "Le champ sommaire est vide ou pas definie";
	};

	if (isset($_POST['text']) && !empty($_POST['text'])){
		$text = strip_tags($_POST['text']);
	}else{
		$_SESSION['erreur'] = "Le champ text est vide ou pas definie";
	};

	if (isset($auteur) && isset($titre) && isset($imageVerification) && isset($text)){
		require_once('connect.php');
		$sql = "INSERT INTO `news` (`auteur`, `titre`, `lien`, `image`,`sommaire`, `text`)
		VALUES (:newsAuteur, :newsTitre, `:newsLien` :newsImage, :newsSommaire, :newsText);";

		$query = $db->prepare($sql);
		$query->bindValue(':newsAuteur', $auteur, PDO::PARAM_STR);
		$query->bindValue(':newsTitre', $titre, PDO::PARAM_STR);
		$query->bindValue(':newsLien', $lien, PDO::PARAM_STR_CHAR);
		$query->bindValue(':newsImage', $filename, PDO::PARAM_STR);
		$query->bindValue(':newsText', $text, PDO::PARAM_STR);
		$query->bindValue(':newsSommaire', $text, PDO::PARAM_STR);
		$query->execute();
		
		$_SESSION['message'] = "News ajouté";
		require_once('close.php');
		header('location: main.php');
	};
}
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
					if(!empty($_SESSION['message'])){
						?>
					<div class="alert alert-success" role="alert">
						<?= 
							$_SESSION['message'];
							?>
					</div>
					<?php
						$_SESSION['message'] ="";
						}
					?>
					<h1>Ajout news</h1>
					<form action="" method="post" enctype="multipart/form-data">
						<fieldset class="row g-3 fieldset">
							<legend>
								Ajouter une news
							</legend>

							<div class="col-md-6">
								<label for="auteur" class="form-label">Auteur</label>
								<input type="text" name="auteur" class="form-control">
							</div>

							<div class="col-md-6">
								<label for="titre" class="form-label">Titre</label>
								<input type="text" name="titre" class="form-control">
							</div>

							<div class="col-md-6">
								<label for="lien" class="form-label">Lien article</label>
								<input type="text" name="lien" class="form-control" placeholder="Non obligatoir">
							</div>

							<div class="col-md-6">
								<input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
								<label for="file" class="form-label">Image</label>
								<input type="file" name="file" class="form-control" />
							</div>

							<div class="col-12">
								<label for="sommaire" class="form-label">Sommaire</label>
								<textarea name="sommaire" class="form-control" cols="30" rows="1"></textarea>
							</div>

							<div class="col-12">
								<label for="text" class="form-label">Text</label>
								<textarea name="text" class="form-control" cols="30" rows="5"></textarea>
							</div>



							<div class="col-12">
								<input type="submit" class="btn btn-success" value="Ajouter">
								<a href="main.php" class="btn btn-info" target="" rel="noopener noreferrer">Retour</a>
							</div>
						</fieldset>
					</form>

				</section>
			</div>
		</main>

	</body>

</html>
