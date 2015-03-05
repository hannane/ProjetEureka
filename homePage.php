<?php
include_once("bd_utils.php");
$bd=getBdLink();
?>

<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
 
<!-- Barre de menu -->
<body>
	<h1>EUREKA</h1>
	<h2>Questionnaire en ligne</h2>
  
    <!-- Formulaire de connexion -->
	<form action = "homePage.php" method = "post">
		<label for="login">Identifiant</label>
        <input type="text" id="login" name="login">
		
        <label for="mdp">Mot de passe</label>
        <input type="password" id="mdp" name="password">
		
		<input type="submit" value="Connexion"> 
	</form>

	<!-- Présentation du site, à n'afficher que si l'utilisateur n'est pas connecté -->
	<p>Eureka, c'est un site de questionnaire en ligne, bla, bla bla</p>
	
	<!-- Lien vers les questionnaires -->
	<a href = " "> Questionnaires </a> // Rajouter le lien vers la page de choix des QCM
	
	<!-- Qui sommes-nous ? -->
	<p>Eureka à été développé par des étudiants de l'UFR Blois, bla bla bla bla</p>

</body>
</html>