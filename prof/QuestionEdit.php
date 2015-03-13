<?php
/*Vous redirige si vous n'êtes pas prof, ou si vous n'etes pas le bon prof.
Note : Cette page vous redirige vers une page d'erreur custom.
Présentant une erreur 503 : access forbidden.
Sinon faut faire un gros IF dans le PHP et echo que la bonne page, c'est chiant.
Si le numéro de question n'est pas spécifié, on ne fait rien pour l'instant.
*/
	if(isset($_GET["idq"]) && ! empty($_GET["idq"]) ){
		
		//#TODO
			
	}
?>
<!DOCTYPE html>
<html> 
<!-- 
___________________________________________________________________
Page en Html permettent d'étiter une question en particulier.

Vous redirige si vous n'etes pas prof ou si vous n'etes pas
le bon prof.
Bon c'est plutot simple, et aussi on peux y accéder grace a une url
en GET , c'est une convention quand on veut afficher une ressource
variable sur une page fixe, même si ici je pourrais mettre un post.
___________________________________________________________________
-->
<head>
	<meta charset="UTF-8"/>
	<title>
		Edit : Question 
		<?php
		if(isset($_GET["idq"]) && ! empty($_GET["idq"]) )
		echo($_GET["idq"]) ;   
		?>
	</title>
</head>
<body>
<?php /*
Script qui vous renvoie a la liste des questions si vous n'avez pas 
selectionné de question.  */
if( ! isset($_GET["idq"]) || empty($_GET["idq"]) ){
	 header("Location: QuestionList.php");   
}
//Sinon récupère les données de la question
//[idMat][idUser][lvlQuest][quest][goodAnsw][answ][correction][coef]
$question = questInfo($_GET["idq"]) ; //alternative script for debug : ;
$answ = $question["answ"] ;
$goodAnsw = $question["goodAnsw"] ;
?>
<h1>
	Vous editez la question 
	<?php echo($_GET["idq"]); ?>
</h1>
<div class="text">
	<h2>
		Informations sur cette question
	<h2>
	<br/>
	Id de la question : <?php echo($_GET["idq"]); ?>
	<br/><br/>
	Matière : <?php echo($question["idmat"]); ?>
	<br/>
	Coeficient : <?php echo($question["coef"]); ?>
	<br/>
	Niveau de la question : <?php echo($question["lvlQuest"]); ?>
	<br/><br/>
	Question : 
	<br/>
	<p>
		<?php echo($question["correction"]); ?>
	</p>
	<br/><br/>
	Réponces :
	<br/>
	
	<!--Script pour une reponce, adapter au nombre de réponces par question.-->
	Réponce 1 : <?php echo($answ["1"]) ; ?>
	<br/>
	<?php 
	if( $goodAnsw["1"] == true )
		echo("Cette reponce est une bonne réponce") ;
	else
		echo("Cette reponce est une mauvaise réponce") ;
	?> <br/>
 	<!--Fin du script pour une réponce-->

	<br/>
	Correction : 
	<br/>
	<p>
		<?php echo($question["quest"]); ?>
	</p>
	
	
</div> <!--Fin du div pour afficher les spec de la question-->

<div class="text"><!--Div de formulaire pour modifier la question.-->

	<h2>
	Editer cette question
	</h2>
	<br/><br/>
	<form action="QuestionEdit.php" method="post" accept-charset="UTF-8">
		ID de la question (non changeable) : <?php echo($_GET["idq"]); ?> <br/>
		Question : 
		<br/>
		<textarea cols="40" rows="3" name="quest" id="quest">
			<?php echo( $question["quest"] ) ; ?>
		</textarea>
		<br/><br/>
		Matiere :
		<input type="text" value="<?php echo( $question["idmat"] ) ; ?>" name="mat" id="mat" placeholder="matière">
		<br/><br/>
		Niveau :
		<input type="text" value="<?php echo( $question["lvlQuest"] ) ; ?>" name="lvl" id="lvl" placeholder="Niveau de la question">
		<br/><br/>
		
		<!--Script pour une réponce-->
		Réponce 1
		<textarea cols="40" rows="1" name="r1" id="r1">
			<?php echo( $answ["1"] ) ; ?>
		</textarea><br/>
		Réponce correcte : <input type="checkbox" name="r1c" id="r1c"><br/>
		<!--Fin du script pour une réponce-->
		
		<br/>
		
		Correction : 
		<br/>
		<textarea cols="40" rows="5" name="correction" id="correction">
			<?php echo( $question["quest"] ) ; ?>
		</textarea>
		
		<input type="hidden" value=1 name="test" id="test"><!--Utilisé pour tester la présence du formulaire.-->
		<br/>
		<button type="submit">Changer la question</button>
	</form>

</div> <!--Fin du div d'edition de question-->

<div class="text">
	<h2>
		Supprimer cette question
	</h2>
	<br/><br/>
	<p>
	Cette action est définitive, elle supprimera cette question et toutes les statisiques liées
	a celle ci. Soyez bien sûr de vouloir supprimer cette question avant de cliquer sur ce boutton.
	</p>

	<form>
		Je souhaite supprimer cette question! 
		<input type="checkbox" name="todel" id="todel"><br/>
		<button type="submit">Suprimmer la question</button>
	</form>
	<br/>
</div>

</body>
</html>
