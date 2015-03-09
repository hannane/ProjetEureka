<?php
session_start();
require_once "functions.php";
$lien=connectDB();
	if(isset($_POST["submit"])){//si on valide connection, on reccupere les infos(login et mot de passe)
		$login=$_POST["login"];
		$password=$_POST["password"];
		$query=mysql_query('SELECT idUser FROM users WHERE login="'.$login.'" and password="'.$password.'"')
		or die("Connection ERROR \n".mysql_error());;//on fait appel à BDDD
	if(mysql_num_rows($query)==0){//si nous avons rien trouvé donc:
		require_once "connexion.html";
		header("Location:".$_SERVER['HTTP_REFERER']);
		echo "<span style ='color: red;'>1.Mot de passe ou login incorrect <br>
		2.Vous etes pas enregistre</span>";
	}
	else{//sinon page d'accueil
	$_SESSION["login"]=$login;
	$_SESSION["password"]=$password;
		echo "<p>Bienvenue, <b>". $_SESSION['login']."</b>!";
	   }
	}
	mysql_close();


?>