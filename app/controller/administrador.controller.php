<?php
include_once 'app/view/administrador.view.php';
include_once 'app/helpers/auth.helper.php';
include_once 'app/model/usuario.model.php';

class AdministradorController{
    
    private $view;
    private $model;
    private $authHelper;

    function __construct () {
       
        $this->view = new AdministradorView();
        $this->model = new UsuarioModel();

        $this->authHelper = new AuthHelper();

        $this->authHelper->chequearAdmin();
    }
        
    function mostrar () {

        $this->view-> mostrarBotones();

    }

    function showUsuarios () {
        $usuarios = $this->model->obtenerUsuarios();
        $this->view->showUsuarios($usuarios);
    }
     
    function cambiarPermiso($id){

        $usuario = $this->model->obtenerUsuario($id);
        $this->model->cambiarPermiso($usuario, $id);
        header("Location: " . BASE_URL . "adminUsuarios");
    }
}