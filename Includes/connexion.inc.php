<?php
session_start();
$adresse = "***********";
$nom_bdd = "***********";
$identif = "***********";
$mdp = "***********";
mysql_connect($adresse,$identif,$mdp);
mysql_select_db($nom_bdd);

if ( isset($_COOKIE["sid"]) && $_COOKIE["sid"] != "NULL" )
	{
		$sid_info_connexion = mysql_real_escape_string($_COOKIE["sid"]);
		$sql_info_connexion = " SELECT * FROM utilisateur WHERE sid = '". $sid_info_connexion ."';";
		$req_info_connexion = mysql_query($sql_info_connexion);

		if ( $re_info_connexion = mysql_fetch_array($req_info_connexion) )
			{
				$email_info = $re_info_connexion["email"];
				$connexion_info = true;	
			}
		else
			{
				$connexion_info = false;
				session_destroy();
				setcookie('sid','' - 3600);
			}
	}
else
	{
		$connexion_info = false;	
	}

?>