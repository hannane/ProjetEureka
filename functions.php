<?php
function connectDB(){
 $mysql=mysql_connect('localhost','root','root')or die(mysql_error());//coonection à la base de donnees
	$db_selected = mysql_select_db('utilisateurs', $mysql);//choisir la BDD
	if (!$db_selected) {
		die ('NOT SELECTED DATABASE: ' . mysql_error());//erreur
	}
	return $mysql;
}
function disconectDB($mysql){
mysqli_close();
}
function delUser($login){
	$lien=connectDB();
		$query='DELETE  FROM users WHERE login ="'.$login.'"' ;//verifier si user deja exist
		$call=mysql_query($query)or die(mysql_error());
	mysql_close();//fermer la BDD
	return true;
}
function addUser($surname,$name,$country,$mail,$login,$password,$campFr,$isProf,$isResp,$birthday){
	$lien=connectDB();
		$query='SELECT idUser FROM users WHERE login ="'.$login.'"' ;//verifier si user deja existe
		$call=mysql_query($query)or die(mysql_error());
		if(mysql_num_rows($call)>0){
		 return false;
		}
		else{

			$res='INSERT INTO users VALUES(NULL,"'.$surname.'","'.$name.'" ,"'.$country.'","'.$mail.'","'.$login.'","'.$password.'","'.$campFr.'","'.$isProf.'","'.$isResp.'","'.$birthday.'")'or die(mysql_error());
			$analyse=mysql_query($res)or die("Connection ERROR".mysql_error());//sinon erreur;
			if(!$analyse){
			$message  = 'Error call: ' . mysql_error() . "\n";
            $message .= 'All call: ' . $res;
              die($message);
			}
	}
	mysql_close();//fermer la BDD
	return true;
}
function isResp($link,$idUser){
$query='SELECT isResp FROM users WHERE idUser ="'.$idUser.'"';
$res=mysql_query($query)or die("Connection ERROR".mysql_error());
mysql_close();
if($res==1){
return true;
}
return false;
}

function isProf($link,$idUser){
$query='SELECT isProf FROM users WHERE idUser ="'.$idUser.'"';
$res=mysql_query($query)or die("Connection ERROR".mysql_error());
mysql_close();
if($res==1){
return true;
}
return false;
}
function getPwd ($idUser){
$lien=connectDB();
$query='SELECT `password` FROM `users` WHERE `idUser` ="'.$idUser.'"';
$res=mysql_query($query)or die("Connection ERROR".mysql_error());
mysql_close();
return $res;
}




?>
