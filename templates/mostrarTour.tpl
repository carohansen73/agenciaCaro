
{include 'header.tpl'} 
<div class='titulo'> 
    <h1>{$tours[0]->nombre|upper}</h1>
</div>
<main class="container">

    <div class='container-fluid'>
        <div class='row'>
            {foreach from=$tours item= $tour}
                
                <div class='col mt-5'>
                    <div class='card' style='width: 18rem;'>
                        <img src='img/avion.jpg' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$tour->destinos }</h5>
                            <p class='card-text'> {$tour->precio}</p>
                            <a class='btn btn-info' href='verDetalle/{$tour->id}'>Ver</a>
                        </div>
                    </div>
                </div>
            
            {/foreach}
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
        </ul>
    </nav>

{include 'footer.tpl'}