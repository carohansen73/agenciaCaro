<?php

require_once('libs/Smarty.class.php');

class RegionView{

  function mostrarRegiones($regiones){

        $smarty=new smarty();

        $smarty->assign('regiones', $regiones);

        $smarty->display('templates/mostrarRegion.tpl');

        
  }

  
  

}