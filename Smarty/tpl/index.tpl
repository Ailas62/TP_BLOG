{if $recherche eq 0}
    <h2>Derniers Articles :</h2>
    <hr>
    <div class="panel panel-primary" >
        {foreach $tab_articles as $articles}
            {include file='_article.tpl'}
        {/foreach}
    </div>
    
    <div class="pagination pagination-large pagination-centered">
        <ul>
            {if $page neq 1}
                <li>
                    <a href="index.php?p={$page2}">Précédent</a>
                </li>
            {else}
                <li>
                    <a class="active">Précédent</a>
                </li>
            {/if}
    
            {for $i=1 to $numpagemax}
                {if $page eq $i}
                    <li>
                        <a class="active" href="index.php?p={$i}"><b>{$i}</b></a>
                    </li>
                {else}
                    <li>
                        <a href="index.php?p={$i}">{$i}</a>
                    </li>
                {/if}
            {/for}
        
            {if $page neq $numpagemax}
                <li>
                    <a href="index.php?p={$page3}">Suivant</a>
                </li>
            {else}
                <li>
                    <a class="active">Suivant</a>
                </li>
            {/if}
        </ul>
    </div>
    
{/if}

{if $recherche eq 1}

    <h2>Résultat de la recherche : {$rech} ({$numresrech})</h2>
    <hr>
    
    {if $numresrech eq 0}
    	Aucun résultats trouvés pour votre recherche ! :-(<br/>
    {/if}
    
    <div class="panel panel-primary" >
        {foreach $tab_articles as $articles}
            {include file='_article.tpl'}
        {/foreach}
    </div>
    
    {if $numresrech neq 0}
        <div class="pagination pagination-large pagination-centered">
        <ul>
        
            {if $page neq 1}
                <li>
                    <a href="index.php?r={$rech}&p={$page2}">Précédent</a>
                </li>
            {else}
                <li>
                    <a class="active">Précédent</a>
                </li>
            {/if}
        
                {for $i=1 to $numpagemax}
                    {if $page eq $i}
                        <li>
                            <a class="active" href="index.php?r={$rech}&p={$i}"><b>{$i}</b></a>
                        </li>
                    {else}
                        <li>
                            <a href="index.php?r={$rech}&p={$i}">{$i}</a>
                        </li>
                    {/if}
                {/for}
            
                {if $page neq $numpagemax}
                    <li>
                        <a href="index.php?r={$rech}&p={$page3}">Suivant</a>
                    </li>
        
                {else}
        
                    <li>
                        <a class="active">Suivant</a>
                    </li>
                {/if}
          </ul>
        </div>
	{/if}
{/if}