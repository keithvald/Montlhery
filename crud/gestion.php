<?php
require_once('session.php');
require_once('../admin/adminGestion.php');
?>
<!DOCTYPE html>

<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Initialiser mail admin</title>

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
					<h1>Ajout compte admin</h1>
					<form action="" method="POST">
						<fieldset>
							<legend>Initialisation admin</legend>

							<label for="mail" class="form-label"><b>Email</b></label>
							<input type="text" class="form-control mb-3" placeholder="mail" name="mail" required>

							<label for="password" class="form-label"><b>Mots de passe de votre boite mail</b></label>
							<input type="password" class="form-control mb-3" placeholder="password" name="password" required>

							<div class="row justify-content-between">
								<div class="col">
									<label for="submit" class="small form-label mb-1">Initier mail conpte admin</label>
									<input class="btn  btn-success form-control m-1" type="submit" value='Initier mail'
										name="submit">
								</div>
							</div>
						</fieldset>
					</form>

				</section>
			</div>
		</main>

	</body>

</html>
