<?php
include("bdUtils.php");

if (isset($_POST["login"]) && !empty($_POST["login"])) { // Si l'utilisateur veut se connecter
	
	$id = userExist($_POST["login"], $_POST["pwd"]) //On récupère son id si elle existe
	
	if ($id !== false) { // si l'id existe, on lance la session et on récupère le login le pwd et l'id
		session_start; 
		$_SESSION["uid"]=$id;
		$_SESSION["login"]=$_POST["login"];
		$_SESSION["pwd"]=$_POST["pwd"];
	}
	
{
?>

<html>
	<head>
		<meta charset="UTF-8"/>
</head>
<body>
<h2>EUREKA</h2>
<h2>Menu</h2>
<ul>
  <li><a href="homePage.php">Acceuil</a></li>
  <li>Choisir une matière</li>
  <li><a href="">Bilan personnel</a></li>
</ul>
<h2>Connexion</h2>
<form name="connexion" method="post" action="">
  <label for="login">Login</label>
  <input type="text" name="login2" id="login">  
  <label for="pwd">Mot de passe</label>
  <input type="password" name="pwd" id="pwd">
  <input type="submit" name="submit" id="submit" value="Connexion">
</form>
<h2>Niveaux d'étude</h2>
<ul>
  <li>L1
    <ul>
      <li>Analyse</li>
      <li>blabla</li>
      <li>blabla</li>
    </ul>
  </li>
  <li>L2
    <ul>
      <li>blabla</li>
      <li>blabla</li>
      <li>blabla</li>
    </ul>
  </li>
  <li>L3
    <ul>
      <li>blabla</li>
      <li>blabla</li>
      <li>blabla</li>
    </ul>
  </li>
  <li>M1
    <ul>
      <li>blabla</li>
      <li>blabla</li>
      <li>blabla</li>
    </ul>
  </li>
  <li>M2
    <ul>
      <li>blabla</li>
      <li>blabla</li>
      <li>blabla</li>
    </ul>
  </li>
</ul>
</body>
</html>