<?php
if ( isset($_GET["Deconnexion"]) )
	{
		setcookie('sid','deco',time() - 3600);
		$connexion_info = false;
		unset($email_info);
		$_SESSION["article"] = "deco";
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
    <meta name="description" content="Aiieyyye">
    <meta name="author" content="Jean-philippe Lannoy">
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script>
    function notif()
		{
			$("#notif").hide("slow");
		}
    </script>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="page-header well">
            	<h1>Morgan Fait <small>Son travail correctement =)</small></h1>
            </div>
            <?php
            if ( $connexion_info == true ) 
				{ ?>
                    <ul class="breadcrumb">
                    	<li><?php	echo "Bonjour : " . $email_info . " (<a href=\"index.php?Deconnexion\">Se déconnecter</a>)"; ?></li>
                    </ul>
                    <?php
				}
			?>
            <div class="row">
                <div class="span8">
                <!-- notifications -->
                <?php
                include ('Includes/notification.inc.php');
                ?>