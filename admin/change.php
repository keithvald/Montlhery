<?php 
session_start();

if($_POST){
	if (isset($_POST['email']) && !empty($_POST['email'])){
		$email = $_POST['email'];
	}else{
		$_SESSION['erreur'] = "Le champ email est vide ou pas definie";
	};

	if(isset($email)){
		require_once('../crud/connect.php');
		$sql = 'SELECT * FROM `adminUser` WHERE `email` = :adminEmail;';

		$query = $db->prepare($sql);
		$query->bindValue(':adminEmail', $email, PDO::PARAM_STR);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);
		require_once('../crud/close.php');
	};

	$code = rand(9999999, 1111111);
	$subject = 'Recuperation mot de passe';
	if($email == $result['email']){
		$success = mail('mikailkalkanpro@gmail.com', 'My Subject', $code);
		if (!$success) {
			$_SESSION['erreur'] = error_get_last()['message'];
		};
		// header('location: ../crud/main.php');
	}else{
		$_SESSION['erreur'] = "Cette email na pas de compte administrateur";
	}
};

require_once('../includes/header-page.php');
?>
<h1><strong>Recuperation mots de passe</strong></h1>
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
<div class="row justify-content-center">
	<form action="" method="POST" class="col-10">
		<fieldset>
			<legend>Verification Utilisateur</legend>

			<label for="email" class="form-label"><b>Email</b></label>
			<input type="text" class="form-control mb-3" placeholder="email" name="email" required>


			<div class="row justify-content-between">
				<div class="col">
					<label for="submit" class="small form-label mb-1">Connexion</label>
					<input class="btn  btn-success form-control m-1" type="submit" value='Connexion' name="submit">
				</div>
			</div>
		</fieldset>
	</form>

</div>
