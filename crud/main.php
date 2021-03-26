<?php
require_once('session.php');
require_once('select.php');
?>
<!doctype html>

<html lang="fr">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

		<title>Hello, world!</title>

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
					<h1>Listes des news</h1>
					<table class="table">
						<thead>
							<th>ID</th>
							<th>Auteur</th>
							<th>Titre</th>
							<th>Lien Article</th>
							<th>Image</th>
							<th>Sommaire</th>
							<th>Date Creation</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							setlocale(LC_TIME, 'fr_FR.UTF-8');
							foreach($result as $news){
							$date = ucfirst(strftime("%A %e %B %Y %T", strtotime($news['dateCreation'])));
							?>
							<tr>
								<td><?= $news['id'] ?></td>
								<td><?= $news['auteur'] ?></td>
								<td><?= $news['titre'] ?></td>
								<td><?= $news['lien'] ?></td>
								<td> <img src="../assets/img/crud/<?= $news['image']; ?>" height="50" width="50"
										alt="logo securiter routierre"></td>
								<td><?= $news['sommaire'] ?></td>
								<td><?= $date ?></td>
								<td>
									<a href="detail.php?id=<?= $news['id'] ?>" class="btn btn-info" target=""
										rel="noopener noreferrer">
										Detail
									</a>
									<a href="update.php?id=<?= $news['id'] ?>" class="btn btn-warning" target=""
										rel="noopener noreferrer">
										Modification
									</a>
									<a href="delete.php?id=<?= $news['id'] ?>" class="btn btn-danger" target=""
										rel="noopener noreferrer">
										Supprimer
									</a>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a href="add.php" class="btn btn-primary" target="" rel="noopener noreferrer">Ajouter News</a>
					<a href="destroy.php" class="btn btn-outline-dark" target="" rel="noopener noreferrer">Deconnexion</a>

				</section>
			</div>
		</main>


		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
		</script>

	</body>

</html>
