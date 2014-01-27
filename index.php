<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');
include ('Includes/haut.inc.php');
include ('Smarty/libs/Smarty.class.php');

$Smarty = new Smarty();
$Smarty->setTemplateDir('Smarty/tpl');
$Smarty->assign('connexion_info', $connexion_info);

//CODE IDENTIQUE POUR LES PAGINATIONS
$app = 2;
$page = (var_get('p'))? var_get('p') : 1;
$debut = round(($page*$app)-$app);
		
if ( !var_get('r') )
	{
		// ON PREPARE LA REQUETE DES ARTICLES
		$req_article = mysql_query("SELECT a.id id, a.texte texte, a.titre titre, a.date date, t.tag tag, t.id id_tag FROM articles a INNER JOIN tags AS t ON t.id = a.tags_id ORDER BY date DESC LIMIT ". $debut .",". $app .";");
		// ON PREPARE PLUS LA REQUETE DES ARTICLES

		// ON FAIT LA PAGINATION POUR TOUS LES ARTICLES

		$reqnumart = mysql_query("SELECT COUNT(*) AS total FROM articles;");
		
		if ( $resnumart = mysql_fetch_array($reqnumart) )
			{
				$numartmax = $resnumart["total"];
			}
		
		$numpagemax = ($page > 0) ? ceil($numartmax / $app) : 1;
		$page2 = $page - 1;
		$page3 = $page + 1;
		
		$Smarty->assign('app', $app);
		$Smarty->assign('page', $page);
		$Smarty->assign('page2', $page2);
		$Smarty->assign('page3', $page3);
		$Smarty->assign('numpagemax', $numpagemax);
		$Smarty->assign('numartmax', $numartmax);
		
		$recherche = 0;
		$Smarty->assign('recherche', $recherche);
		
		// ON FAIT PLUS LA PAGINATION POUR TOUS LES ARTICLES
	}
else
	{
		// ON FAIT LA PAGINATION POUR LES ARTICLES RECHERCHES
		
		$rech = htmlspecialchars($_GET["r"]);
		
		// ON PREPARE LA REQUETE DES ARTICLES
		$req_article = mysql_query("SELECT a.id id, a.texte texte, a.titre titre, a.date date, t.tag tag, t.id id_tag FROM articles a INNER JOIN tags AS t ON t.id = a.tags_id WHERE titre LIKE '%". $rech."%' ORDER BY date DESC LIMIT ". $debut .",". $app .";");
		// ON PREPARE PLUS LA REQUETE DES ARTICLES
		
		$reqRech = mysql_query("SELECT COUNT(*) AS total FROM articles WHERE titre LIKE '%". $rech."%'");
		if ( $resrech = mysql_fetch_array($reqRech) )
			{
				$numresrech = $resrech["total"]; // ON RECUPERE LE NOMBRE D ARTICLE DANS LES RESULTATS DE LA RECHERCHE
			}
			
		$info_nb_page = ceil($numresrech / 2);
		$numpagemax = ($page > 0) ? ceil($numresrech / $app) : 1;
		$page2 = $page - 1;
		$page3 = $page + 1;
		
		$Smarty->assign('rech', $rech);
		$Smarty->assign('numresrech', $numresrech);
		$Smarty->assign('info_nb_page', $info_nb_page);
		$Smarty->assign('app', $app);
		$Smarty->assign('page', $page);
		$Smarty->assign('page2', $page2);
		$Smarty->assign('page3', $page3);
		$Smarty->assign('numpagemax', $numpagemax);
		
		$recherche = 1;
		$Smarty->assign('recherche', $recherche);
		
		// ON FAIT PLUS LA PAGINATION POUR LES ARTICLES RECHERCHES
	}

// ON RECUPERE LES ARTICLES

while ( $re = mysql_fetch_array($req_article) )
	{
		$re['image'] = (file_exists(dirname(__FILE__)."/data/images/".$re['id'].".jpg")) ? "/TP_PHP_BLOG/data/images/".$re['id'].".jpg" : false;
		$articles[] = $re;
	}
		
$Smarty->assign('tab_articles', $articles);
		
// ON NE RECUPERE PLUS LES ARTICLES

$Smarty->display('index.tpl');

include ('Includes/bas.inc.php');