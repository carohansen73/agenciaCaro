<?php
include_once 'app/model/comentarios.model.php';
include_once 'app/helpers/auth.helper.php';

class ComentariosController{

    private $model;
    private $authHelper;

    function __construct () {
       
        //$this->view = new AdministradorView();
        $this->model = new ComentarioModel();

        $this->authHelper = new AuthHelper();

        //$this->authHelper->chequearAdmin();
    }

    function addComment($id){
            
        $texto=$_POST['comentario'];
        $calificacion=$_POST['inlineRadioOptions'];
        $idTour=$id;
        

        if( empty ($texto) || empty ($calificacion)|| empty ($idTour) ){
        // $comentarios = $this->model-> obtenerTours();
            //$this->view->mostrarTablaTours($tours,'Faltan datos obligatorios');
            echo "no anda";
            die();
        }
        $id=$this->model->insert($texto, $calificacion, $idTour);

        header("location: " . BASE_URL . "adminTour");
    }
}