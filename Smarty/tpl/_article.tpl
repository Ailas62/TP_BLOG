<h4 class="panel-title">
	{$articles['titre']|escape|nl2br}
</h4>

<i>Le : {$articles['date']|date_format:'d/m/y'} - Tag : {$articles['tag']}</i><br />
<br/>

{if $articles['image']}
	<a href="{$articles['image']}" ><img src="{$articles['image']}" height="75" width="250" /></a>
	</br>
{/if}

<div class="panel-body">
	<p>{$articles['texte']|escape|nl2br}</p>
</div>

<hr>

{if $connexion_info eq true}
<div align="right">
	<a class="btn btn-success" href="article.php?id={$articles['id']}">Editer</a>
&nbsp; &nbsp;
	<a class="btn btn-danger" href="supprimer_article.php?id={$articles['id']}">Supprimer</a><br />
</div>
{/if}