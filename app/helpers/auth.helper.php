<?php

class AuthHelper {
    public function __construct() {
    }

    /*barrera de seguridad*/
    function chequearLogin(){
        session_start();
        if (!isset($_SESSION['ID_USUARIO'])){
            header("Location: " . BASE_URL . "iniciar");
            die();
        }
    }

    function cerrarSesion() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    } 

    function chequearAdmin(){
        session_start();
        if ($_SESSION['PERMISO_USUARIO']==0){
            header("Location: " . BASE_URL . "home");
            die();
        }
    }
}    