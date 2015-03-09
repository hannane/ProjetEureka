<?php
/* BdUtil
   Liste de toutes les méthodes */
   
/*  dataListCountry
 void -> String 
 génère une datalist en String.
 Documentation sur les datalists : http://41mag.fr/liste-des-balises-html5/balise-datalist-html5
 ^^^^^^ J'aime bien ce site ya plein de trucs intéressants.
 */
 function dataListCountry(){
//Bon je commente pas ce que sa fait, le code est plutot simple... Mais comme sa on a pas a le recopier a cheque document HTML.
//Pour rappel, dans un form on appelle la liste comme sa : <input type="list" list="pays" value="indéfini" name="country" id="country" placeholder="Pays">
//début du String
$string = "
<datalist id='pays'>
	<option value='indéfini'>
	<option value='pays2'>
	<option value='pays3'> 
	<option value='pays4'>
	<option value='pays5'>

	
	
</datalist>
" ;// Fin du String
return $string;
}
 
 
 
 /*isemail
  String -> vrai ou faux*/ 
 ?>
