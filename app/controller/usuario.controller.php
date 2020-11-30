<?php
include_once 'app/view/usuario.view.php';
include_once 'app/model/usuario.model.php';


class UsuarioController{

    private $model;
    private $view;

    function __construct(){
        
        $this->model = new UsuarioModel();
        $this->view = new UsuarioView();
        
    }
    function mostrarRegistro(){
        $this->view->mostrarRegistro();
    }

    function agregarUsuario(){

        $email=$_POST['email'];
        $password=$_POST['password'];
        $permiso=0;

        if( empty ($email) || empty ($password)){
            $this->view->mostrarRegistro('Faltan ingresar datos');
            die();
        }

        $controlarEmail=$this->model->obtenerEmail($email);//controla que no este el mismo nombre
            if(empty($controlarEmail)){

            $password=password_hash($password, PASSWORD_DEFAULT);

            $this->model->insertarUsuario($email, $password,$permiso);
                
                header("location: " . BASE_URL . "iniciar");
        }
        else{
            $this->view->mostrarRegistro('El usuario ya existe');
        }
    }
}