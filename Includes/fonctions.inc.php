<?php
function var_get($nom)
	{
		return $resultat = ( isset($_GET[$nom]) ) ? $_GET[$nom] : false;
	}

function var_post($nom)
	{
		return $resultat = ( isset($_POST[$nom]) ) ? $_POST[$nom] : false;
	}

function requete_notif($req_sql,$var_notif,$val_notif)
	{
		if ( mysql_query($req_sql) )
			{
				$_SESSION["article"] = $val_notif;
			}
		else
			{
				$_SESSION["article"] = "erreur";
			}		
	}

function notif($val_notif)
	{
				$_SESSION["article"] = $val_notif;	
	}

function connexion($email,$mdp)
	{
		$email = htmlspecialchars($email);
		$mdp = htmlspecialchars($mdp);
		$sql = "SELECT * FROM utilisateur WHERE email= '".$email."' AND mdp='".$mdp."';";
		$req= mysql_query($sql);
	
		if ( $re = mysql_fetch_array($req) )
			{
				$sid = md5($email.time());
				$id = $re["id"];	
				$sql_add_sid = "UPDATE utilisateur SET sid = '".$sid."' WHERE id = ".$id.";";
				mysql_query($sql_add_sid);
				setcookie('sid',$sid,time() + 3600);
				return TRUE;		
			}
		else
			{
				return FALSE;
			}
	}
	
function clear_tag()
	{
		$clear_tag_sql_rech = "SELECT id, tag FROM tags WHERE id NOT IN (SELECT t.id FROM tags t, articles a WHERE t.id = a.tags_id);";
		$req = mysql_query($clear_tag_sql_rech);
		$j = 0;
		
		while ( $re = mysql_fetch_array($req) ) // ON RECUPERE TOUS LES IDs DES TAGS A SUPPRIMER
			{
				$j = $j + 1;
				$clear_tags_id[$j] = $re['id'];
			}
		
		for ( $i = 1 ; $i <= $j ; $i++ ) // ON SUPPRIME TOUS LES TAGS A SUPPRIMER
			{
				$clear_tag_sql = "DELETE FROM tags WHERE id = ".$clear_tags_id[$i];
				mysql_query($clear_tag_sql);
			}
	}
?>