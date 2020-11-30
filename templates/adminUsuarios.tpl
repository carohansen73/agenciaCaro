{include 'header.tpl'} 
<div class='titulodark'> 
    <h1>USUARIOS</h1>
</div> 
<main class="container">
    
    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuario</th>
                <th scope="col">Permisos</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$usuarios item= $usuario}
            <tr>
                <th scope="row">{$usuario->id}</th>
                <td>{$usuario->email}</td>
                <td>{$usuario->permiso}</td>
                
                <td><a class='btn btn-danger btn-sm' href='eliminarUsuario/{$usuario->id}'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                    </svg></a></td>
                
                <td><a class='btn btn-danger btn-sm' href='otorgarPermiso/{$usuario->id}'> Dar Permiso </a></td>
            </tr>
        {/foreach} 
        
        </tbody>
    </table>
    

{include 'footer.tpl'}
