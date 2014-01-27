<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');

if ( var_get("id") && $connexion_info == true )
	{
		$id = (var_get("id"))? (int)$_GET["id"] : false;
				try
					{
						if ( file_exists(dirname(__FILE__)."/data/images/".$id.".jpg") )
							{
								$chemin = dirname(__FILE__)."/data/images/".$id.".jpg";
								unlink($chemin);
							}
						$req_sql = "DELETE FROM articles WHERE id= ". $id ."; ";
						$var_notif = "article";
						$val_notif = "supprime";
						requete_notif($req_sql,$var_notif,$val_notif);
						clear_tag();

						header("Location: index.php");
						exit();
					}
				catch (exception $e)
					{
						echo "Didn't Work ! :'( : ".$e."<br/>";
						echo "<a href=\"index.php\">Cliquez ici pour revenir à l'accueil</a>";
					}
	}
else
	{ 
		$_SESSION["article"] = "erreur_suppr";
		header("Location: connexion.php");
		exit();
	}