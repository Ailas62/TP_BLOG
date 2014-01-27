<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');
		
// MODIFICATIONS
if ( $connexion_info == true )
	{
		$id = (var_post("id"))? (int)$_POST["id"] : false;
		$titre = htmlspecialchars($_POST["titre"]);
		$texte = htmlspecialchars($_POST["texte"]);
		$tag = htmlspecialchars($_POST["tags"]);
		
		if ( $tag == NULL )
			{
				$id_tag = 1;
			}
		else
			{
				$req_verif_tag_sql = mysql_query(" SELECT * FROM tags WHERE tag = '". $tag ."'; ");
							
				if ( $verif_result_tag = mysql_fetch_array($req_verif_tag_sql) )
					{
						$id_tag = $verif_result_tag["id"];
					}
				else
					{
						mysql_query(" INSERT INTO `tags` (`id` ,`tag`) VALUES (NULL , '".$tag."'); ");
						$id_tag = mysql_insert_id();
					}
			}
		
		$req_sql = "UPDATE articles SET titre = '".$titre."', texte = '".$texte."', tags_id = ".$id_tag." WHERE id = ".$id.";";
		$var_notif = "article";
		$val_notif = "modifie";
		requete_notif($req_sql,$var_notif,$val_notif);
		clear_tag();
		header("Location: index.php");
		exit();
	}
else
	{ // Si on essaye de modifier sans etre connecté
		$val_notif = "erreur_modif";
		notif($val_notif);
		header("Location: connexion.php");
		exit();
	}
?>