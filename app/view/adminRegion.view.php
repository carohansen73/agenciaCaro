<?php

require_once('libs/Smarty.class.php');

class AdminRegionView{

  function mostrarTablaRegiones($regiones, $error=null){

    $smarty=new smarty();

    $smarty->assign('regiones', $regiones);

    $smarty->assign('error', $error);

    $smarty->display('templates/adminRegion.tpl');
      
  }

  function mostrarRegion($region, $error=null){
    
    $smarty=new smarty();

    $smarty->assign('region', $region);

    $smarty->assign('error', $error);

    $smarty->display('templates/actualizarRegion.tpl');

  }
  
  function mostrarError($msg){/*muestro el error*/

    $smarty=new smarty();
    
    $smarty->assign('msg', $msg);
    
    $smarty->display('templates/adminRegion.tpl');

  }


}