<?php
session_start();
if (!isset($_SESSION['code']) || !isset($_SESSION['email'])){
header('location:../admin/connexion.php');
exit();
};

$regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/";

if($_POST){
	if (isset($_POST['mdp']) && !empty($_POST['mdp'])){
		if(preg_match($regexPassword, ($_POST['mdp'])) && strlen(($_POST['mdp'])) > 8 && strlen(($_POST['mdp'])) < 150)
			{
				$mdp = ($_POST['mdp']);
			}else{
				$_SESSION['erreur'] = "Mots de pass invalide. Minimum 8 caractère, maximum 150. <br /><br />Doit contenir au moin une majuscule(A-Z), une minuscule(a-z), un caractère special(@ # etc) et un chiffre(0-9)<br />";
			};
	}else{
		$_SESSION['erreur'] = "Le champ mot de passe est vide ou pas definie";
	};

	if (isset($_POST['reapeatmdp']) && !empty($_POST['reapeatmdp'])){
		$repeatMdp = $_POST['reapeatmdp'];
	}else{
		$_SESSION['erreur'] = "Le champ repeter le mot de passe est vide ou pas definie";
	};
	
	if(isset($mdp) && isset($repeatMdp)){
		if($mdp == $repeatMdp){
			$code = 0;
			$mdpHashed = password_hash($mdp, PASSWORD_DEFAULT, ['cost' => 14]);
			
			require_once('../crud/connect.php');
			$sql = "UPDATE `adminUser` SET `code`=:code, `password`=:adminPassword WHERE `email` = :email;";
			$query = $db->prepare($sql);
			$query->bindValue(':code', $code, PDO::PARAM_INT);
			$query->bindValue('adminPassword', $mdpHashed, PDO::PARAM_STR_CHAR);
			$query->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR_CHAR);
			$query->execute();
			
			require_once('../crud/close.php');
			$_SESSION['message'] = "Changement Effectuer";
			session_destroy();
			header('location:connexion.php');
		}else{
		$_SESSION['erreur'] = "Les mots de passes ne sont pas identique";
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
}
?>
<div class="row justify-content-center">
	<form action="" method="POST" class="col-10">
		<fieldset>
			<legend>Nouveaux mot de passe</legend>

			<label for="mdp" class="form-label"><b>Nouveaux mot de passe</b></label>
			<input type="password" class="form-control mb-3" placeholder="Mot de passe" name="mdp" required>

			<label for="reapeatmdp" class="form-label"><b>Repeter le mot de passe</b></label>
			<input type="password" class="form-control mb-3" placeholder="Mot de passe" name="reapeatmdp" required>

			<div class="row justify-content-between">
				<div class="col">
					<label for="submit" class="small form-label mb-1">Changer le mot de passe</label>
					<input class="btn  btn-success form-control m-1" type="submit" value='Changer le mot de passe' name="submit">
				</div>
			</div>
		</fieldset>
	</form>

</div>
