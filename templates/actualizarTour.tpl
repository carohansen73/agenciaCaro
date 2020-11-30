{include 'header.tpl'} 
<h1>Tours</h1>
<main class="container">

    {include 'form_actualizarTour.tpl'} 

    {if $error}
        <div class="alert alert-primary">
            {$error}
        </div>
    {/if}
    <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Destino</th>
                    <th scope="col">Paquete</th>
                    <th scope="col">Itinerario</th>
                    <th scope="col">Precio</th> 
                </tr>
            </thead>
            <tbody>
        
                <tr>
                    <th scope="row">{$tour->destinos}</th>
                    <td>{$tour->paquete}</td>
                    <td>{$tour->itinerario}</td>
                    <td>{$tour->precio}</td> 
                </tr>
            
            </tbody>
        </table>
    
{include 'footer.tpl'}