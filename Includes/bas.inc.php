				<!-- contenu -->
                </div>
				<nav class="span4">
                    <h2>Recherche</h2>
                    
                    <form action="index.php" method="GET" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="r" placeholder="Informatique, Ubuntu..." value="" class="span3" />
                            &nbsp;
                            <input type="submit" value="OK" class="btn" />
                        </div>
                    </form>
                    
                    <h2>Menu</h2>
                    
                    <ul>
                        <li>
                        	<a href="index.php">Accueil</a>
                        </li>
                        <li>
                        	<a href="article.php">Rédiger un article</a>
                        </li>
<?php
                        if ( $connexion_info != true )
							{
?>
								<li>
									<a href="connexion.php">Connexion</a>
								</li>
<?php 
							} 
                        else 
							{ 
?>
                                <li>
                                	<a href="index.php?Deconnexion">Se déconnecter</a>
                                </li>
<?php
							}
?>
                    </ul>
                </nav>
			</div>
		</div>
    <footer>
    
    <script>
		$("#croix").click(function()
			{
				notif();	  
			});
		setTimeout(function(){notif();}, 5000);
    </script>
    
    <p>&copy; Nilsine & IUT CALAIS - ULCO : 2013 - 2014</p>

    </footer>
</div>

</body>
</html>