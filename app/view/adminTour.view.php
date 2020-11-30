<?php

require_once('libs/Smarty.class.php');

class AdminTourView{
      
  function mostrarTablaTours($tours,$error=null){
     
    $smarty=new smarty();
        
    $smarty->assign('tours', $tours);

    $smarty->assign('error', $error);
        
    $smarty->display('templates/adminTour.tpl');
    
  }

  function mostrarTour($tour, $error=null){

    $smarty=new smarty();
  
    $smarty->assign('tour', $tour);
    
    $smarty->assign('error', $error);

    $smarty->display('templates/actualizarTour.tpl');
     
  }
    
  function mostrarErrorTour($msg){

    $smarty=new smarty();
    
    $smarty->assign('msg', $msg);
    
    $smarty->display('templates/adminTour.tpl');

  }

}