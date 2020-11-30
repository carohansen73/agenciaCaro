<?php
include_once 'ApiView.php';
include_once 'app/model/comentarios.model.php';

class ApiCommentsController{

    private $view;
    private $model;

    function __construct(){
        $this->model = new ComentarioModel();
       $this->view = new ApiView();
       $this->data = file_get_contents("php://input");
    }

    
    function getAllByTour($params=null){

        $idTour = $params[':IDTOUR'];
        $comentarios = $this->model->getAllByTour($idTour);

        if ($comentarios){
            $this->view->response($comentarios, 200);
        }else{
            $this->view->response("el comentario  con el id = $idTour no existe", 404);
        }
        //$comentarios = $this->model->getAll(); //$this->model->getAll();
       // $this->view->response($comentarios, 200);
    }

    function get($params=null){
        //el router me manda un arreglo asociativo de parametros llamado $params, null por si no lo uso
        $id=$params[':ID'];
        $comentario = $this->model->get($id);
        //PARA VER SI EXISTE EL COMENTARIO, SINO 404 NOT FOUND
        if ($comentario){
            $this->view->response($comentario, 200);
        }else{
            $this->view->response("el comentario  con el id = $id no existe", 404);
        }
        
        //var_dump($id);
    }

    public function delete($params = null){
        $id=$params[':ID'];
        $success= $this->model->delete($id);
        if($success){
            $this->view->response("el comentario con el id = $id se borro exitosamente", 200);
        }else {
            $this->view->response("el comentario  con el id = $id no existe", 404);
        }
        
    }
/*POST -- AGREAR*/
    public function add($params=null){
        $body = $this->getData();
        
        $texto = $body->texto;
        $calificacion= $body->calificacion;
        $idTour = $body->id_tour;

        $id = $this->model->insert($texto, $calificacion, $idTour);
        if($id>0){
            $comentario = $this->model->get($id);
            $this->view->response($comentario, 200);
        }else {
            $this->view->response("el comentario no se pudo insertar", 500);
        }
    }

//Funcion para convertir de string(la variable de entrada) a json
    function getData(){ 
        return json_decode($this->data); 
    }  

    public function update($params=null){
        $idComentario=$params[':ID'];
        $body = $this->getData();
        //var_dump($this->data);
        
        $texto = $body->texto;
        $calificacion= $body->calificacion;
        $idTour = $body->id_tour;

        $success = $this->model->update($idComentario, $texto, $calificacion, $idTour);
        if($success){
            $this->view->response("Se modifico el comentario  con el id = $idComentario, exitosamente", 200);
        }else {
            $this->view->response("el comentario no se pudo modificar", 500);
        }
    }

    public function showerror($params=null){
        $this->view->response("El recurso solicitado no existe", 404);
    }
}