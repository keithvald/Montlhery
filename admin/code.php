<?php
session_start();
if (!isset($_SESSION['email'])){
header('location:../admin/connexion.php');
exit();
};
?>
<?php
if($_POST){
	
		if (isset($_POST['code']) && !empty($_POST['code'])){
			if(ctype_digit($_POST['code'])){
			$emailCode = $_POST['code'];
			}else{
				$_SESSION['erreur'] = "Ce code doit contenir des nombres";
			};
		}else{
			$_SESSION['erreur'] = "Le champ code est vide ou pas definie";
		};

	if(isset($emailCode)){
		require_once('../crud/connect.php');
		$sql = 'SELECT * FROM `adminUser` WHERE `code` = :emailCode;';

		$query = $db->prepare($sql);
		$query->bindValue(':emailCode', $emailCode, PDO::PARAM_INT);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);
		require_once('../crud/close.php');
		
		if($emailCode == $result['code']){
			$_SESSION['code'] = $emailCode;
			header('location:mdp.php');
		}else{
			$_SESSION['erreur'] = "Ce code est invalide";
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
			<legend>Code Vérification</legend>

			<label for="code" class="form-label"><b>Code</b></label>
			<input type="number" class="form-control mb-3" placeholder="code" name="code" required>

			<div class="row justify-content-between">
				<div class="col">
					<label for="submit" class="small form-label mb-1">Vérifier</label>
					<input class="btn  btn-success form-control m-1" type="submit" value='Vérifier' name="submit">
				</div>
			</div>
		</fieldset>
	</form>

</div>
