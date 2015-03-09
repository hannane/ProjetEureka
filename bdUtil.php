<?php
/* BdUtil
   Liste de toutes les méthodes */
// Initialisation des constantes -----------------------------------------------------------------------



// Méthodes --------------------------------------------------------------------------------------------

/* getBdLink - Renvoie le lien vers la BD
(void) -> (String) */
function getBdLink () =

/* addUser - Créer un nouvel utilisateur dans la BD
(link, login, pwd, surname, name, email, country, campFr, isProf, isResp) -> (void) */
function addUser ($link, $login, $pwd, $surname, $name, $email, $country, $campFr, $isProf, $isResp) =

/* delUser - Supprime un utilisateur de la BD
(link, idUser) -> (void) */
function delUser ($link, $idUser) =

/* isProf - Renvoie true si l’utilisateur est un professeur
(link, idUser) -> (boolean) */
function isProf ($link, $idUser) =

/* isResp - Renvoie true si l’utilisateur est un responsable
(link, idUser) -> (boolean) */
function isResp ($link, $idUser) =

/* getPwd - Renvoie le mot de passe de l'utilisateur
(link, idUser) -> (pwd) */
function getPwd ($link, $idUser) =

/* getId - Renvoie l’id de l’utilisateur
(link, login) -> (int) */
function getId ($link, $login) =

/* getNbQuest - Renvoie le nombre de question dans la BD
(link) -> (int) */
function getNbQuest ($link) =

/* getLvlMat - Renvoie un tableau de boolean avec pour index [L1][L2][L3][M1][M2]
(link, idMat) -> ([boolean]) */
function getLvlMat ($link, $idMatiere) =

/* getUserInfo - Renvoie un tableau de String avec pour index  [name][surmane][email][country][campFr]
(link, idUser) -> (String) */
function getUserInfo ($link, $idUser) =

/* getIdMat - Renvoie l’id de la matière
(link, nameMat) -> (int) */
function getIdMat ($link, $nameMat) =

/* chgUserInfo - Change les données d'un utilisateur
(link, idUser, pwd, surname, name, email, country, campFr) -> (void) */
function chgUserInfo ($link, $idUser, $pwd, $surname, $name, $email, $country, $campFr) =

/* chgMatInfo - Change les données d'une matière
(link, idMat, title, desc, lvlL1, lvlL2, lvlL3, lvlM1, lvlM2) -> (void) */
function chgMatInfo ($link, $idMat, $title, $desc, $lvlL1, $lvlL2, $lvlL3, $lvlM1, $lvlM2) =

/* addQuest - Créer une nouvelle question dans la BD
(link, idQuest, idMat, idUser, lvlQuest, quest, answ, goodAnsw, correction, coef) -> (void) */
function getBdLink ($link, $idQuest, $idMat, $idUser, $lvlQuest, $quest, $answ, $goodAnsw, $correction, $coef) =

/* delQuest - Supprimme une question dans la BD
(link, idQuestion) -> void Doit appeler delStatQuest */
function getBdLink ($link, $idQuestion) =

/* statLength - Renvoie la longueur de la table Stat
(link) -> (int) */
function statLength ($link) =

/* addStat - Créer une nouvelle stat dans la BD
(link, idQuest, idUser, goodRep, repUser) -> (void) */
function addStat ($link, $idQuest, $idUser, $goodRep, $repUser) =

/* occQuest - Renvoie le nombre d'occurence de la question dans la table Stat
(link, idQuest) -> int */
function occQuest ($link, $idQuest) =

/* nbGoodAnsw - Renvoie le nombre de bonnes réponses envoyées pour une question
(link, idQuest) -> int */
function nbGoodAnsw ($link, $idQuest) =

/* delStatQuest - Supprime les stats associées à une question dans la table Stat
(link, idQuest) -> void */
function delStatQuest ($link, $idQuest) =

/* getStatUserMat - Renvoie... 
(link, idUser, nameMat) -> (nbGoodAnsw, NbQuest) */
function getStatUserMa ($link, $idUser, $nameMat) =

/* getStatUser - Renvoie le nombre de bonnes réponses  et le nombre total de formulaire envoyé pour un utilisateur 
(link, idUser) -> (nbBonneRep, NbQuestion) */
function getStatUser ($link, $idUser) =

/* listQuestProf - Renvoie un tableau contenant la liste des idQuest écris par le professeur
(link, idUser) -> [idQuest] */
function listQuestProf ($link, $idUser) =

/* listEtu - Renvoie la liste des id de tous les utilisateurs de type étudiant
(link) -> ([idUser]) */
function listEtu ($link) =

?>