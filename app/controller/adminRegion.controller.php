<?php
include_once 'app/view/adminRegion.view.php';
include_once 'app/model/region.model.php';
include_once 'app/helpers/auth.helper.php';


class AdminRegionController{

    private $model;
    private $view;
    private $authHelper;

    function __construct(){

        $this->model = new RegionModel();
        
        $this->view = new AdminRegionView();

        $this->authHelper = new AuthHelper();

        // verifico que el usuario esté logueado siempre
        
        $this->authHelper->chequearAdmin();

    }

    function mostrarTabla(){
        
        $regiones = $this->model-> obtenerRegiones();
        $this->view-> mostrarTablaRegiones($regiones);
    }
    
    function insertarRegion(){
        $nombre = $_POST['nombre'];
        $informacion = $_POST['informacion'];

        //controlo que haya cargado los datos
        if(empty($nombre) || empty($informacion)){
            $regiones = $this->model-> obtenerRegiones();
            $this->view->mostrarTablaRegiones($regiones, "Faltan datos obligatorios");
            die();
        }

        //controlo la extencion de la imagen
        if($_FILES['input_name']['type'] == "image/jpg" ||
            $_FILES['input_name']['type'] == "image/jpeg" ||
            $_FILES['input_name']['type'] == "image/png") 
        {
            $imagen =  $this->uniqueImgName ($_FILES['input_name']['name'], $_FILES['input_name']['tmp_name']);

            $id = $this->model->insertarRegion($nombre, $informacion, $imagen);
            
        }else{
            $id = $this->model->insertarRegion($nombre, $informacion);
        }

        header("Location: " . BASE_URL . "administrador");
    }

    /*FUNCION Q ME DEUELVE UN NOMBRE UNICO PARA CADA IMAGEN
    Y LA MUEVE A LA CARPETA IMG*/
    function uniqueImgName ($realName, $tempName) {
        $filePath = "img/" . uniqid("", true) . "." 
        . strtolower(pathinfo($realName, PATHINFO_EXTENSION));
        // obtenemos algo como “img/123127843873.jpg” (o la extensión que sea)

        /*funcion que mueve la imagen a la caarpeta img*/
        move_uploaded_file($tempName, $filePath);

        return  $filePath;
    }
    
    function eliminarRegion($id){
        $this->model->eliminarRegion($id);
        header("Location: " . BASE_URL . "administrador");
    }

    function actualizarRegion ($id){
       
        $region=$this->model->obtenerRegion($id);
        
        $this->view-> mostrarRegion($region);
    }

    function actualizar (){
        $nombre = $_POST['nombre'];
        $informacion = $_POST['informacion'];
        $id = $_POST['id'];

        if(empty($nombre) || empty($informacion)){
            $region=$this->model->obtenerRegion($id);
            $this->view->mostrarRegion($region, "Faltan datos obligatorios");
            die();
        }
        //controlo la extencion de la imagen
        if($_FILES['input_name']['type'] == "image/jpg" ||
            $_FILES['input_name']['type'] == "image/jpeg" ||
            $_FILES['input_name']['type'] == "image/png") 
        {
            $imagen =  $this->uniqueImgName ($_FILES['input_name']['name'], 
                                              $_FILES['input_name']['tmp_name']);
            
            $this->model->actualizarRegion($nombre, $informacion, $id, $imagen);
            
        }else{
            $this->model->actualizarRegion($nombre, $informacion, $id);
        }

      
        //necesito id para actualizar esa fila en particular//
        $this->model->actualizarRegion($nombre, $informacion, $id);
        
        header("Location: " . BASE_URL . "administrador");
    }
    
}