<?php 
session_start();

if($_POST){
	if (isset($_POST['email']) && !empty($_POST['email'])){
		$email = $_POST['email'];
	}else{
		$_SESSION['erreur'] = "Le champ email est vide ou pas definie";
	};

	if (isset($_POST['secret']) && !empty($_POST['secret']) && strlen(($_POST['secret'])) == 10){
		$secret = $_POST['secret'];
	}else{
		$_SESSION['erreur'] = "Le champ clef secrete est invalide";
	};


	if(isset($email) && isset($secret)){
		require_once('../crud/connect.php');
		$sql = 'SELECT * FROM `adminUser` WHERE `email` = :adminEmail;';

		$query = $db->prepare($sql);
		$query->bindValue(':adminEmail', $email, PDO::PARAM_STR);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);

		$code = rand(9999999, 1111111);
		$secretHashed = password_hash($secret, PASSWORD_DEFAULT, ['cost' => 14]);
		$subject = 'Recuperation mot de passe';

		if($email == $result['email']){
			if(password_verify($secret, $result['secret'])){
			$sql = "UPDATE `adminUser` SET `code`=:code, `secret`=:adminSecret WHERE `email` = :email;";
			$query = $db->prepare($sql);
			$query->bindValue(':code', $code, PDO::PARAM_INT);
			$query->bindValue(':adminSecret', $secretHashed, PDO::PARAM_STR_CHAR);
			$query->bindValue(':email', $email, PDO::PARAM_STR_CHAR);
			$query->execute();
			
			require_once('../crud/close.php');
	
			require_once('mail.php');
			
			$_SESSION['email'] = $email;
			header('location:code.php');
			}else{
				$_SESSION['erreur'] = "Cette clef est invalide";
			};
		}else{
			$_SESSION['erreur'] = "Cette email na pas de compte administrateur";
		};
	};
};

require_once('../includes/header-page.php');
?>
<h1><strong>Recuperation mot de passe</strong></h1>
<?php
if(!empty($_SESSION['erreur'])){
?>
<div class="alert alert-danger" role="alert">
	<?= $_SESSION['erreur'];?>
</div>
<?php
$_SESSION['erreur'] ="";
};
if(!empty($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert">
	<?= $_SESSION['message'];?>
</div>
<?php
$_SESSION['message'] ="";
};
?>
<div class="row justify-content-center">
	<form action="" method="POST" class="col-10">
		<fieldset>
			<legend>Vérification Utilisateur</legend>

			<label for="email" class="form-label"><b>Email</b></label>
			<input type="text" class="form-control mb-3" placeholder="email" name="email" required>

			<label for="secret" class="form-label"><b>Clef Secrete</b></label>
			<input type="password" class="form-control mb-3" placeholder="clef secrete" name="secret" required>

			<div class="row justify-content-between">
				<div class="col">
					<label for="submit" class="small form-label mb-1">Envoyer email</label>
					<input class="btn  btn-success form-control m-1" type="submit" value='Envoyer email' name="submit">
				</div>
			</div>
		</fieldset>
	</form>

</div>
