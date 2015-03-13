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
$question = questInfo($_GET["idq"]) ;
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
		<?php echo($question["quest"]); ?>
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

</div> <!--Fin du div pour afficher les spec de la question-->

<div class="text"><!--Div de formulaire pour modifier la question.-->

<!--Ouais mais la pour le moment j'ai la flegme.-->

</div>

</body>
</html>
