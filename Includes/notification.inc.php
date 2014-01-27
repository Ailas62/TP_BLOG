<?php

$croix = "<a href='#' class='cacher_notif' id='croix'>&times;</a>";
if ( isset($_SESSION["article"]) )
	{
		switch ( $_SESSION["article"] )	
		{
			case "ajoute" :
					echo '<div class="alert alert-success" id="notif">Article ajouté !'.$croix.'</div>';
			break;
			case "modifie" :
					echo '<div class="alert alert-info" id="notif">Article modifié !'.$croix.'</div>';
			break;	
			case "supprime" :
					echo '<div class="alert alert-info" id="notif">Article supprimé !'.$croix.'</div>';
			break;	
			case "connexion" :
					echo '<div class="alert alert-success" id="notif">Vous êtes connecté !'.$croix.'</div>';
			break;	
			case "erreur" :
					echo '<div class="alert alert-error" id="notif">Une erreur est survenue !'.$croix.'</div>';
			break;	
			case "badpass" :
					echo '<div class="alert alert-error" id="notif">Adresse e-mail ou mot de passe incorrect !'.$croix.'</div>';
			break;	
			case "deco" :
					echo '<div class="alert alert-info" id="notif">Vous vous êtes bien déconnecté !'.$croix.'</div>';
			break;	
			case "erreur_ajout" :
					echo '<div class="alert alert-error" id="notif">Erreur ! Vous devez être connecté pour pouvoir ajouter un article !'.$croix.'</div>';
			break;	
			case "erreur_modif" :
					echo '<div class="alert alert-error" id="notif">Erreur ! Vous devez être connecté pour pouvoir modifier un article !'.$croix.'</div>';
			break;	
			case "erreur_vide" :
					echo '<div class="alert alert-error" id="notif">Erreur ! Vous devez remplir tous les champs !'.$croix.'</div>';
			break;	
			case "erreur_suppr" :
					echo '<div class="alert alert-error" id="notif">Erreur ! Vous devez être connecté pour pouvoir supprimer un article !'.$croix.'</div>';
			break;	
			case "erreur_gen" :
					echo '<div class="alert alert-error" id="notif">Erreur ! Vous devez être connecté pour pouvoir accéder à cette page !'.$croix.'</div>';
			break;	
		}
	}
	else
	{
		echo '<div id="notif" class="hide"><span id="notif-span"></span>'.$croix.'</div>';
	}
	unset($_SESSION["article"]);
?>