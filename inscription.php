<?php
require_once("inc/init.inc.php");
if($_POST)
{
	debug($_POST);
	$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']); 
	if(!$verif_caractere || strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20 )
	{
		$contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caract�res. <br> Caract�re accept� : Lettre de A � Z et chiffre de 0 � 9</div>";
	}
	if(empty($contenu)) 
	{
		$membre = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'"); 
		if($membre->num_rows > 0)
		{
			$contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
		}
		else
		{
			foreach($_POST as $indice => $valeur)
			{
				$_POST[$indice] = htmlEntities(addSlashes($valeur));
			}
			executeRequete("INSERT INTO membre (pseudo, mdp, email, adresse) VALUES ('$_POST[pseudo]', '$_POST[mdp]', '$_POST[email]', '$_POST[adresse]')");
			$contenu .= "<div class='validation'>Vous �tes inscrit � notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
		}
	}
}
?>
<?php require_once("inc/haut.inc.php"); ?>
<?php echo $contenu; ?>

<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" title="caract�res accept�s : a-zA-Z0-9-_." required="required"><br><br>
         
    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" required="required"><br><br>
      
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>
              
    <label for="adresse">Email Verif</label><br>
    <textarea id="adresse" name="adresse" placeholder="votre dresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caract�res accept�s :  a-zA-Z0-9-_."></textarea><br><br>
 
    <input name="inscription" value="S'inscrire" type="submit">
</form>
 
<?php require_once("inc/bas.inc.php"); ?>