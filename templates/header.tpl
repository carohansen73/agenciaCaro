<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumbo Argentina</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- script de vue 
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home">Rumbo Argentina</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav  d-flex w-100">
                    <li class="nav-item active">
                        <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ml-auto">
                            <a class="nav-link"  href="listarTours">Todos los destinos</a>
                        </li>  
                    {if isset($smarty.session.PERMISO_USUARIO)&&($smarty.session.PERMISO_USUARIO==1)}
                        <li class="nav-item ml-auto">
                            <a class="nav-link"  href="administrador">Administrador</a>
                        </li>  
                    {/if}
                    {if !isset($smarty.session.EMAIL_USUARIO)}
                        <li class="nav-item ml-auto">
                            <a class="nav-link"  href="registrar">Registrarse</a>
                        </li>  
                    {/if}
                    {if isset($smarty.session.EMAIL_USUARIO)}
                        <li class="nav-item ml-auto">
                            <a class="nav-link"  href="cerrar">{$smarty.session.EMAIL_USUARIO}(Cerrar Sesion)</a>
                        </li> 
                    {else} 
                        <li class="nav-item ml-auto">
                            <a class="nav-link"  href="iniciar">Iniciar Sesion</a>
                        </li>  
                    {/if}
                </ul>
            </div>
        </nav>  
    </header>