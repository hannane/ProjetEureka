<?php
/* BdUtil
   Liste de toutes les méthodes */
// Initialisation des constantes -----------------------------------------------------------------------



// Méthodes --------------------------------------------------------------------------------------------

/* connectBD - Renvoie le lien vers la BD
(void) -> (String) */
function connectDB(){
 $mysql=mysql_connect('localhost','root','root')or die(mysql_error()); // connection à la base de donnees
	$db_selected = mysql_select_db('utilisateurs', $mysql); // choisir la BDD
	if (!$db_selected) {
		die ('NOT SELECTED DATABASE: ' . mysql_error()); // erreur
	}
	return $mysql;
}

/* disconnectBD - Deconnecte de la BD
(void) -> (void) */
function disconectDB($mysql){
mysqli_close();
}

/* addUser - Créer un nouvel utilisateur dans la BD
(idUser, login, pwd, name, surname, email, country, campFr, isProf, isResp) -> (void) */
function addUser($idUser, $login, $pwd, $name, $surname, $email, $country, $campFr, $isProf, $isResp){
	$lien=connectDB();
		$query='SELECT idUser FROM users WHERE login ="'.$login.'"' ; // verifier si user deja existe
		$call=mysql_query($query)or die(mysql_error());
		if(mysql_num_rows($call)>0){
		 return false;
		}
		else{

			$res='INSERT INTO users VALUES(NULL,"'.$login.'","'.$pwd.'" ,"'.$name.'","'.$surname.'","'.$email.'","'.$country.'","'.$campFr.'","'.$isProf.'","'.$isResp.'")'or die(mysql_error());
			$analyse=mysql_query($res)or die("Connection ERROR".mysql_error());//sinon erreur;
			if(!$analyse){
			$message  = 'Error call: ' . mysql_error() . "\n";
            $message .= 'All call: ' . $res;
              die($message);
			}
	}
	mysql_close();//fermer la BDD
	return true;

/* delUser - Supprime un utilisateur de la BD
(login) -> (void) */
function delUser($login){ // A changer  !!!!!!! il faudrait donner idUser plutot que le login
	$lien=connectDB();
		$query='DELETE  FROM users WHERE login ="'.$login.'"' ;//verifier si user deja exist
		$call=mysql_query($query)or die(mysql_error());
	mysql_close();//fermer la BDD
	return true;
}

/* isProf - Renvoie true si l’utilisateur est un professeur
(idUser) -> (boolean) */
function isProf($idUser){
	$lien=connectDB();
	$query='SELECT isProf FROM users WHERE idUser ="'.$idUser.'"';
	$res=mysql_query($query)or die("Connection ERROR".mysql_error());
	mysql_close();
	if($res==1){
	return true;
	}
	return false;
}

/* isResp - Renvoie true si l’utilisateur est un responsable
(idUser) -> (boolean) */
function isResp($idUser){
	$lien=connectDB();
	$query='SELECT isResp FROM users WHERE idUser ="'.$idUser.'"';
	$res=mysql_query($query)or die("Connection ERROR".mysql_error());
	mysql_close();
	if($res==1){
	return true;
	}
	return false;
}

/* getPwd - Renvoie le mot de passe de l'utilisateur
(idUser) -> (pwd) */
function getPwd ($idUser){
	$lien=connectDB();
	$query='SELECT `password` FROM `users` WHERE `idUser` ="'.$idUser.'"';
	$res=mysql_query($query)or die("Connection ERROR".mysql_error());
	mysql_close();
	return $res;
}

/* getId - Renvoie l’id de l’utilisateur
(login) -> (int) */
	function getId ($login){
	$lien=connectDB();
	$query='SELECT `idUser` FROM `users` WHERE `login` ="'.$login.'"';
	$res=mysql_query($query)or die("Connection ERROR".mysql_error());
	mysql_close();
	return $res;
}

/* userExist - Renvoie l'id de l'utilisateur si le login et le mot de passe sont corecte, sinon false
(login, pwd) -> (int ou boolean) */
	function userExist ($login, $pwd){

/* getNbQuest - Renvoie le nombre de question dans la BD
(void) -> (int) */
function getNbQuest () =

/* getLvlMat - Renvoie un tableau de boolean avec pour index [L1][L2][L3][M1][M2]
(idMat) -> ([boolean]) */
function getLvlMat ($idMatiere) =

/* getUserInfo - Renvoie un tableau de String avec pour index  [name][surmane][email][country][campFr]
(idUser) -> (String) */
function getUserInfo ($idUser) =

/* getIdMat - Renvoie l’id de la matière
(nameMat) -> (int) */
function getIdMat ($nameMat) =

/* chgUserInfo - Change les données d'un utilisateur
(idUser, pwd, surname, name, email, country, campFr) -> (void) */
function chgUserInfo ($idUser, $pwd, $surname, $name, $email, $country, $campFr) =

/* chgMatInfo - Change les données d'une matière
(idMat, title, desc, lvlL1, lvlL2, lvlL3, lvlM1, lvlM2) -> (void) */
function chgMatInfo ($idMat, $title, $desc, $lvlL1, $lvlL2, $lvlL3, $lvlM1, $lvlM2) =

/* addQuest - Créer une nouvelle question dans la BD
(idQuest, idMat, idUser, lvlQuest, quest, answ, goodAnsw, correction, coef) -> (void) */
function addQuest ($idQuest, $idMat, $idUser, $lvlQuest, $quest, $answ, $goodAnsw, $correction, $coef) =

/* delQuest - Supprimme une question dans la BD
(idQuestion) -> void Doit appeler delStatQuest */
function delQuest ($idQuestion) =

/* questInfo - Obtiends les informations d'une question
(idQuestion) -> String[] [idMat][idUser][lvlQuest][quest][goodAnsw][answ][correction][coef]*/
function questInfo ($idQuestion) =

/* statLength - Renvoie la longueur de la table Stat
(void) -> (int) */
function statLength () =

/* addStat - Créer une nouvelle stat dans la BD
(idQuest, idUser, goodRep, repUser) -> (void) */
function addStat ($idQuest, $idUser, $goodRep, $repUser) =

/* occQuest - Renvoie le nombre d'occurence de la question dans la table Stat
(idQuest) -> int */
function occQuest ($idQuest) =

/* nbGoodAnsw - Renvoie le nombre de bonnes réponses envoyées pour une question
(idQuest) -> int */
function nbGoodAnsw ($idQuest) =

/* delStatQuest - Supprime les stats associées à une question dans la table Stat
(idQuest) -> void */
function delStatQuest ($idQuest) =

/* getStatUserMat - Renvoie... 
(idUser, nameMat) -> (nbGoodAnsw, NbQuest) */
function getStatUserMa ($idUser, $nameMat) =

/* getStatUser - Renvoie le nombre de bonnes réponses  et le nombre total de formulaire envoyé pour un utilisateur 
(idUser) -> (nbBonneRep, NbQuestion) */
function getStatUser ($idUser) =

/* listQuestProf - Renvoie un tableau contenant la liste des idQuest écris par le professeur
(idUser) -> [idQuest] */
function listQuestProf ($idUser) =

/* listEtu - Renvoie la liste des id de tous les utilisateurs de type étudiant
(void) -> ([idUser]) */
function listEtu () =

?>
