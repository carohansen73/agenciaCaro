{include 'header.tpl'} 
{include 'carrusel.tpl'} 
    <main class="container">
        <div class='container-fluid'>
        <div class='row'>
        {foreach from=$regiones item= $region}
            
            <div class='col mt-5'>
                <div class='card' style='width: 18rem;'>
                    {if $region->imagen != ''}
                        <img src='{$region->imagen}' class='card-img-top' alt='...'>
                    {/if}
                    <div class='card-body'>
                        <h5 class='card-title'>{$region->nombre }</h5>
                        <p class='card-text'> {$region->informacion }</p>
                        <a href='region/{$region->id}' class='btn btn-info'>Ver Tour</a>
                    </div>
                </div>
            </div>
        
        {/foreach}
        </div>
        </div>
        
    
{include 'footer.tpl'}