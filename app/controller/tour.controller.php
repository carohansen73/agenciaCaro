<?php
include_once 'app/view/tour.view.php';
include_once 'app/model/tour.model.php';
include_once 'app/helpers/auth.helper.php';

class TourController{
    private $model;
    private $view;
    

    function __construct(){
        
        $this->model = new TourModel();
       
        $this->view = new TourView();
        session_start();
        
    }

    function mostrarTour($id){
        
        $items_por_pagina= 3;
       // $pagina=$_GET['pagina'];

        $total_items = $this->model->countTours($id);
        print_r($total_items);
        die();
        $total_paginas = ceil($total_items/$items_por_pagina);

        /*if(!$pagina){
            $inicio = 0;
            $pagina = 1;
        }else{
            $inicio = ($pagina - 1)*$items_por_pagina;
        }*/

    }

    function detalleUnTour($id){

        $tour = $this->model->detalleTour($id);
        $this->view->mostrarUnTours($tour);
                
    }

    function mostrarTours(){
    $tours = $this->model->obtenerTours();
    $this->view->mostrarTours($tours);
    }

    /*function paginacion(){
        $items_por_pagina= 3;
        $pagina=$_GET['pagina'];

        $total_items = //count
        $total_paginas = ceil($total_items/$items_por_pagina);

        if(!$pagina){
            $inicio = 0;
            $pagina = 1;
        }else{
            $inicio = ($pagina - 1)*$items_por_pagina;
        }


    }

    function mostrarTour($id){
        
        $tour = $this->model-> obtenerTour($id);
        $this->view-> mostrarTours($tour);

    }*/
     

}