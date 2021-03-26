<?php
if($_POST){
	if (isset($_POST['mail']) && !empty($_POST['mail'])){
		$mailAdmin = $_POST['mail'];
	}else{
		$_SESSION['erreur'] = "Le champ mail est vide ou pas definie";
	};

	if (isset($_POST['password']) && !empty($_POST['password'])){
		$passwordAdmin = $_POST['password'];
	}else{
		$_SESSION['erreur'] = "Le champ password est vide ou pas definie";
	};
};
?>
