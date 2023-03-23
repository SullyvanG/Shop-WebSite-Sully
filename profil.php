<?php
require_once("inc/init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) 
{
	header("location:connexion.php");
}
$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>'; // exercice: tenter d'afficher le pseudo de l'internaute pour lui dire Bonjour.
$contenu .= '<div class="cadre"><h2> Voici vos informations de profil </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= '<p> votre solde est de: ' . $_SESSION['membre']['solde'] . '€ </p><br>';
	
//--------------------------------- AFFICHAGE HTML ---------------------------------//
header('Content-Type: text/html; charset=utf8'); 
require_once("inc/haut.inc.php");
echo $contenu;
require_once("inc/bas.inc.php");