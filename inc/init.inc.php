<?php
//--------- BDD
$mysqli = new mysqli("localhost", "root", "famalo", "site");
if ($mysqli->connect_error) die('Un probl�me est survenu lors de la tentative de connexion � la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");
header('Content-Type: text/html; charset=iso-8859-1'); 
 
//--------- SESSION
session_start();

//--------- CHEMIN
define("RACINE_SITE","");
 
//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES INCLUSIONS
require_once("fonction.inc.php");
