<?php

include_once 'app/view/auth.view.php';
include_once 'app/model/usuario.model.php';
include_once 'app/helpers/auth.helper.php';


class AuthController{

    private $view;
    private $model;
    private $authHelper;

    function __construct(){
        $this->view = new AuthView();
        $this->model = new usuarioModel();
        $this->authHelper = new AuthHelper();
    }

    function mostrarLogin(){
        $this->view-> mostrarFormLogin();
    }

    function iniciarSesion(){

        $email=$_POST['email'];
        $contraseña=$_POST['password'];

        if( empty ($email) || empty ($contraseña)){
            $this->view->mostrarFormLogin("Faltan datos obligatorios");
            die();
        }

        /*Obtengo el usuario*/
        $usuario = $this->model->obtenerEmail($email);

        if($usuario && password_verify($contraseña, $usuario->password)) {
            session_start();
            $_SESSION['ID_USUARIO'] = $usuario->id;
            $_SESSION['EMAIL_USUARIO'] = $usuario->email;
            $_SESSION['PERMISO_USUARIO']=$usuario->permiso;

            header("Location: " . BASE_URL . "administrador");

        } else {

            $this->view->mostrarFormLogin("Datos incorrectos");
            
        };

    }

    function cerrarSesion(){

        $this->authHelper->cerrarSesion();

        header("location: " .BASE_URL . "iniciar"); 
        
    }
}