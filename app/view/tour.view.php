<?php

require_once('libs/Smarty.class.php');

class TourView{

    function mostrarToursPorRegion($tours){
       
        $smarty=new smarty();
        
        $smarty->assign('tours', $tours);
        
        $smarty->display('templates/mostrarTour.tpl');
          
    }

    function mostrarUnTours($tour){
       
        $smarty=new smarty();
        
        $smarty->assign('tour', $tour);

        $smarty->display('templates/mostrarDetalleTour.tpl');
    
            
    }

    function mostrarTours($tours){
        $smarty = new smarty();
        $smarty->assign('tours', $tours);
        $smarty->display('templates/mostrarTours.tpl');
    }

}