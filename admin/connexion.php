<?php 
session_start();

if($_POST){
	if (isset($_POST['nom']) && !empty($_POST['nom'])){
		$nom = strip_tags($_POST['nom']);
	}else{
		$_SESSION['erreur'] = "Le champ nom est vide ou pas definie";
	};

	if (isset($_POST['email']) && !empty($_POST['email'])){
		$email = strip_tags($_POST['email']);
	}else{
		$_SESSION['erreur'] = "Le champ email est vide ou pas definie";
	};

	if (isset($_POST['password']) && !empty($_POST['password'])){
		$password = $_POST['password'];
	}else{
		$_SESSION['erreur'] = "Le champ password est vide ou pas definie";
	};

	if(isset($nom) && isset($email) && isset($password)){
		require_once('../crud/connect.php');
		$sql = 'SELECT * FROM `adminUser` WHERE `nom` = :adminNom AND `email` = :adminEmail;';

		$query = $db->prepare($sql);
		$query->bindValue(':adminNom', $nom, PDO::PARAM_STR);
		$query->bindValue(':adminEmail', $email, PDO::PARAM_STR);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);
		require_once('../crud/close.php');

		$hash = $result['password'];
	};

	if($result['nom'] == $nom && $result['email'] == $email && password_verify($password, $hash)){
		$_SESSION['nom'] = $nom;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		
		$_SESSION['message'] = "Connexion effectué";
		header('location: ../crud/main.php');
	}else{
		$_SESSION['erreur'] .= "Mauvais identifiant";
	}
};

require_once('../includes/header-page.php');
?>
<h1><strong>Formulaire Connexion</strong></h1>
<?php if(!empty($_SESSION['erreur'])){
?>
<div class="alert alert-danger" role="alert">
	<?= $_SESSION['erreur'];?>
</div>
<?php $_SESSION['erreur'] ="";
}
if(!empty($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert">
	<?= $_SESSION['message'];?>
</div>
<?php $_SESSION['message'] ="";
}
?>
<div class="row justify-content-center">
	<form action="" method="POST" class="col-10">
		<fieldset>
			<legend>Connexion</legend>

			<label for="nom" class="form-label"><b>Nom</b></label>
			<input type="text" class="form-control mb-3" placeholder="Nom" name="nom" required>

			<label for="email" class="form-label"><b>Email</b></label>
			<input type="mail" class="form-control mb-3" placeholder="email" name="email" required>

			<label for="password" class="form-label"><b>Mot De Passe</b></label>
			<input type="password" class="form-control mb-3" placeholder="PassWord" name="password" required>

			<div class="row justify-content-between">
				<div class="col">
					<label for="submit" class="small form-label mb-1">Connexion</label>
					<input class="btn  btn-success form-control m-1" type="submit" value='Connexion' name="submit">
				</div>

				<div class="col">
					<p class="small d-inline-block form-label mb-1">Mots de passe oublier? Ou Changer de mots de passe? </p>
					<a href="change.php" class="btn btn-outline-dark form-control m-1" target="" rel="noopener noreferrer">
						Changer de mots de passe
					</a>
				</div>
			</div>
		</fieldset>
	</form>

</div>
