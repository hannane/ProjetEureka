
	//script connexion
	
	if(isset($_POST["valider"])){//si on valide connection, on reccupere les infos(login et mot de passe)
		$e_login=$_POST["e_login"];
		$e_password=$_POST["e_password"];
		$query=mysql_query('SELECT id FROM users WHERE login="'.$e_login.'" and password="'.$e_password.'"');//on fait appel à BDDD
	if(mysql_num_rows($query)==0){//si nous avons rien trouvé donc:
		echo "1.Mot de passe ou login incorrect\n
		2.Vous etes pas enregistré";
	}
	else{//sinon page d'accueil
		echo "Page d'accueil";
	}
	}
	

	?>
<form method="post" action="registerV2.php">
  <input type="text" name="e_login" placeholder ="login" required / ><br>
  <input type="text" name="e_password" placeholder ="password" required / ><br>
  <input type="submit" name="valider"value="Connecter"  / >
 </form>
 
