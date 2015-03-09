<?php
session_start();
require_once('functions.php');
$errors = array();
$errors['error_global']=$errors['error_log']=$errors['error_pwd']=$errors['error_existe']=$errors['pwd_dup']='';

if(isset($_POST['submit'])){//si nous avons soumis la registration,on recupere les infos
		
		$surname=htmlspecialchars($_POST["surname"]);
		$pattern = '/^[a-zA-Z]+$/i';//les signes autoriseés
        $result = preg_match($pattern, $surname);
        if(!$result){
		$error='Surname incorrect';
		echo $error;
		$errors['error_global']=1;
		}
		$name=htmlspecialchars($_POST["name"]);
		$pattern = '/^[a-zA-Z]$/i';//les signes autoriseés
        $result = preg_match($pattern, $name);
        if(!$result){
		$errors['error_global']=1;
		}
		$country=htmlspecialchars($_POST["country"]);
		$pattern = '/^[a-zA-Z]$/i';//les signes autoriseés
        $result = preg_match($pattern, $country);
        if(!$result){
		$errors['error_global']=1;
		}
		$mail=htmlspecialchars($_POST["mail"]);
		$pattern = "/^[a-z0-9_-]{1,20}@(([a-z0-9-]+\.)+".
"(com|net|org|mil|edu|gov|fr|info|biz|inc|name|ru|".
"[a-z]{2})|[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]".
"{1,3})$/is";
        $result = preg_match($pattern, $mail);
        if(!$result){
		$errors['error_global']=1;
		}
		$birthday=htmlspecialchars($_POST["birthday"]);
		$pattern = '/^[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/';//les signes autoriseés
        $result = preg_match($pattern, $birthday);
        if(!$result){
		$errors['error_global']=1;
		}
		$campFr=htmlspecialchars($_POST["campFr"]);
		$pattern = '/^[0-1]$/i';//les signes autoriseés
        $result = preg_match($pattern, $campFr);
        if(!$result){
		$errors['error_global']=1;
		}
		$login=htmlentities($_POST["login"]);
		$pattern = '/^[-_.a-z\d]{6,16}$/i';//les signes autoriseés
        $result = preg_match($pattern, $login);
        if(!$result){
		$errors['error_log']=1;
		}
		$password=htmlspecialchars($_POST["password"]);
		$pattern = '/^[-_.a-z\d]{6,16}$/i';//les signes autoriseés
		 $result = preg_match($pattern, $password);
        if(!$result){
		 $errors['error_pwd']=1; 
		}
		$c_password=htmlspecialchars($_POST["c_password"]);//confirmer mot de passe
		$pattern = '/^[-_.a-z\d]{6,16}$/i';//les signes autoriseés
		$result = preg_match($pattern, $password);
        if(!$result){
		 $errors['error_pwd']=1; 
		}
		$isProf=0;
		$isResp=0;
unset($_SESSION['reg_success']);
if($password==$c_password){
if($errors['error_global']!=1&&$errors['error_log']!=1&&$errors['error_pwd']!=1){
$password=md5($password);
$res=addUser($surname,$name,$country,$mail,$login,$password,$campFr,$isProf,$isResp,$birthday);
if($res==true){
$_SESSION["reg_success"]=1;
header("Location:index.php");
echo "Vous etes enregistré";
   }
   else{
    $errors["error_existe"]=1;
   }
}

}
else{
$errors["pwd_dup"]=1;
}
}

?>

<html>
<head>
 <title>Registration</title>
 <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form method="post" action="registration.php">
<?php
if($errors['error_existe']==1)
echo "<p><span style='color :red;'>Login deja existe</span></p>";
?>
  <input type="text" name="surname" placeholder ="Surname" required / ><br>
  <input type="text" name="name" placeholder ="name" required / ><br>
  <input type="text" name="country" placeholder ="country" required / ><br>
  <input type="email" name="mail" placeholder ="mail" required / ><br>
  <input type="text" name="campFr" placeholder ="campFr" required / ><br>
   <input type="date" name="birthday"min="2012-04-10" value="YYYY-MM-DD" placeholder ="birthday" required / ><br>
   <div class="row">
<?php

if($errors['error_log']==1)echo "<p><span style='color :red;'>Login incorrect</span></p>";
?>
  <input type="text" name="login" placeholder ="login" required / ><br>
  <div class="error" id="login-error"><?php=$errors['login'];?></div>
  <div class="instruction" id="login-instruction">Le nom d'utilisateur ne peut être que des lettres latines, des chiffres, '_', '-', '.'. Nom d'utilisateur doit être au moins 4 caractères et pas plus de 16 caractères</div>
      </div>
<div class ="row">
<?php
if($errors['error_pwd']==1)echo "<p><span style='color :red;'>Password incorrect</span></p>";
?>
  <input type="password" name="password" placeholder ="password" required / ><br>
  <div class="error" id="password-error"><?php=$errors['password'];?></div>
  <div class="instruction" id="password-instruction">Mot de passe ne peut être que des lettres latines, des chiffres, '_', '-', '.'. Mot de passe doit être au moins 4 caractères et pas plus de 16 caractères</div>
  </div>
<?php
if($errors["pwd_dup"]==1)echo "<p><span style='color :red;'>Passwords differents</span></p>";
?>
  <input type="password" name="c_password" placeholder ="Confirmer password" required / ><br>
  <input type="submit" name="submit"value="Register"  / >
   <input type="reset" name="reset"value="Annuler"  / >
 </form>
 </body>
 </html>