<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');

// AJOUTS D UN ARTICLE
if ( $connexion_info == true )
	{
		if (var_post("titre") && var_post("texte"))
			{
				$titre = mysql_real_escape_string($_POST["titre"]);
				$texte = mysql_real_escape_string($_POST["texte"]);
				$tags = mysql_real_escape_string($_POST["tags"]);

				if ( $tags == "" )
					{
						$id_tags = 1;
					}
				else
					{
						$req_verif_tags_sql = mysql_query(" SELECT * FROM tags WHERE tag = '". $tags ."'; ");
									
						if ( $verif_result_tags = mysql_fetch_array($req_verif_tags_sql) )
							{
								$id_tags = $verif_result_tags["id"];
							}
						else
							{
								mysql_query(" INSERT INTO `tags` (`id` ,`tag`) VALUES (NULL , '".$tags."'); ");
								$id_tags = mysql_insert_id();
							}
					}
					
				$req_sql = "INSERT INTO `articles` (`titre` ,`texte` ,`date` ,`tags_id`)
				VALUES ('". $titre ."',  '". $texte ."', UNIX_TIMESTAMP(), ".$id_tags."); ";
				$var_notif = "article";
				$val_notif = "ajoute";
				requete_notif($req_sql,$var_notif,$val_notif);
				$id = mysql_insert_id();
				$src = $_FILES["image"]["tmp_name"];
				$dest = dirname(__FILE__)."/data/images/$id.jpg";		
				move_uploaded_file($src,$dest);
				header("Location: index.php");
				exit();
			}
	}
if ( $connexion_info == false )
	{ // Si on essaye d'ajouter sans etre connecté
		$val_notif = "erreur_ajout";
		notif($val_notif);
		header("Location: connexion.php");
		exit();
	}
?>