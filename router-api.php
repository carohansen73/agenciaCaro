<?php
//incluyo el router de la libreria
include_once 'libs/Router.php';
include_once 'app/api/ApiController.php';

//creo el nuevo router
$router = new Router();

//defino la tabla de ruteo (case)
$router->addRoute('comentarios/:IDTOUR', 'GET', 'ApiCommentsController', 'getAllByTour');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentsController', 'delete');
$router->addRoute('comentarios', 'POST', 'ApiCommentsController', 'add');
$router->addRoute('comentarios/:ID', 'PUT', 'ApiCommentsController', 'update');

$router->setDefaultRoute('ApiTaskController','showerror');

//rutear
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);