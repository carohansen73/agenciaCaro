<?php

require_once('libs/Smarty.class.php');

class AdministradorView{

  function mostrarBotones(){

        $smarty=new smarty();

        $smarty->display('templates/administrador.tpl');
    }

    function showUsuarios($usuarios){
      $smarty = new smarty();
      $smarty->assign('usuarios', $usuarios);
      $smarty->display('templates/adminUsuarios.tpl');
    }

  

}