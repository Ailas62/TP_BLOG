<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');




if ( $connexion_info == true )
	{
		if ( var_get("id") )
			{ //POUR ACTIVER LE FORMULAIRE EN MODE MODIFICATION
				
				$id_sql = htmlspecialchars($_GET["id"]);
				
				$req = mysql_query("SELECT a.id id, a.texte texte, a.titre titre, t.tag tag FROM articles a
				INNER JOIN tags AS t ON t.id = a.tags_id WHERE a.id = ". $id_sql .";");
				
				if ( $res = mysql_fetch_array($req) )
					{
						extract($res);
					}
				$titre_page = "Modifier un article";
				$action = "modif_article.php";
				$btn_submit = "Modifier";
				
				$titre = htmlspecialchars($titre);
				$texte= htmlspecialchars($texte);
				$id = htmlspecialchars($id);
				
				if ( $tag == "Aucun" ) {
				$tag = ""; }
				
				$tag = htmlspecialchars($tag);
				
				
			}
		else
			{ //POUR ACTIVER LE FORMULAIRE EN MODE D'AJOUT
				
				$titre_page = "Ajouter un article";
				$action = "ajout_article.php";
				$btn_submit = "Ajouter";
				$titre = "";
				$texte= "";
				$id = "";
				$tag = "";
			}
		include ('Includes/haut.inc.php');
?>
		<h2><?= $titre_page ?></h2>
		<form action="<?= $action ?>" method="POST" id="addart" enctype="multipart/form-data" >
			<div class="input-group">
				<span class="input-group-addon">Titre : </span></br>
				<input type="text" name="titre" id="titre" value="<?= $titre ?>" />
			</div>
			<div class="input-group">
				<span class="input-group-addon">Texte : </span></br>
				<textarea name="texte" id="texte" rows="10" style="width: 500px;height: 200px;resize: none;"><?= $texte ?></textarea>
			</div>
<?php
		if ( !var_get("id") )
			{
?>
				<div class="input-group">
					<span class="input-group-addon">Image :</span><br />
					<input type="file" name="image" id="image" /><br /><br />
				</div>
<?php
			}
		else
			{
?>
				<div class="input-group">
			<input type="hidden" name="id" id="id" value="<?= $id ?>" >
            	</div>
<?php
			}
?>
            <div class="input-group">
                <span class="input-group-addon">Tags :</span><br />
                <input type="text" name="tags" id="tags" value="<?= $tag ?>" /><br /><br />
            </div>
			<div class="form-action">
				<input type="submit" value="<?= $btn_submit ?>" class="btn btn-large btn-primary" />
			</div>
		</form>
<?php
	}
else
	{ // SI ON ACCEDE A CETTE PAGE SANS ETRE CONNECTE
		$_SESSION["article"] = "erreur_gen";
		header("Location: connexion.php");
		exit();
	}
include ('Includes/bas.inc.php');
?>
<script>
	$(function()
		{
		$('#addart').submit(function()
			{
				var titre = $('#titre').val();
				var texte = $('#texte').val();
				var etat = $('#notif-span').val();
				
				if (!titre.length || !texte.length)
					{
						console.log("Veuillez remplir tous les champs avant de continuer !");
						$('#notif').removeClass('hide');
						$('#notif').addClass('alert alert-error');
						$('#notif-span').html("Veuillez remplir tous les champs avant de continuer !");	
						$('#notif').delay(5000).hide('slow');
							if ( etat == "" )
								{
									$('#notif').show();
								}
						
						return false;
					}
				return true;	
			});
		$("#croix").click(function()
			{
				notif();	  
			});
		});
</script>