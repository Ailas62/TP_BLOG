<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');
			
// ON VERIFIE LA CONNEXION

if ( var_post("email") && var_post("mdp") )
	{
		$email = mysql_real_escape_string($_POST["email"]);
		$mdp = mysql_real_escape_string($_POST["mdp"]);
				
		// CONNEXION
				
		if ( connexion($email,$mdp) == TRUE )
			{
				$val_notif = "connexion";
				notif($val_notif);
				header("Location: index.php");
				exit();
				
			}
		else
			{
				$val_notif = "badpass";
				notif($val_notif);
				header("Location: connexion.php");
				exit();
			}
	}
	
// FIN DE LA VERIFICATION DE CONNEXION

include ('Includes/haut.inc.php');

if ( isset($_SESSION["article"]) )
	{
		include ('Includes/notification.inc.php');
	}
?>
<h2>Connexion</h2>
<p>Saisissez les identifiants choisis lors de votre inscription</p>

<form action="connexion.php" method="POST" id="form_connexion">

<fieldset>
	<div class="clearfix">
		<label for="email">Email</label>
		<div class="input"><input id="email" name="email" size="30" type="email" value="" /></div>
	</div>
	
	<div class="clearfix">
		<label for="mdp">Mot de Passe</label>
		<div class="input"><input id="mdp" name="mdp" size="30" type="password" value="" /></div>
	</div>
	<div class="form-actions">
		<input class="btn btn-large btn-primary" id="submit" type="submit" value="Se Connecter" />
	</div>
</fieldset>

</form>

<script>
	$(function()
		{
		$('#form_connexion').submit(function()
			{
				var email = $('#email').val();
				var mdp = $('#mdp').val();
				var etat = $('#notif-span').val();
				
				if (!email.length || !mdp.length)
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
	
<?php
include ('Includes/bas.inc.php');
?>