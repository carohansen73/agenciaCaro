<?php

require_once('libs/Smarty.class.php');

class UsuarioView{

    function mostrarRegistro($error=null){

        $smarty=new smarty();

        $smarty->assign('error', $error);
    
        $smarty->display('templates/usuario.tpl');


    }


     

}