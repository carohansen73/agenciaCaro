<?php
//VISTA PARA LA API REST
//clase generica, para cualquier recurso
//tengo que manejar el CODIGO DE RESPUESTA y devolver a info en FORMATO JSON
class ApiView{

    public function response($data, $status){
        //aca vamos a convertir a JSON
        //header -> avisa q es formato JSON
        header("Content-Type: application/json");
        //para CODIGO DE RESPUESTA:
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));

        echo json_encode($data);
    }

//"diccionario", segun codigo pone el msj
    private function requestStatus($code){
        $status = array(
          200 => "OK",
          404 => "Not found",
          500 => "Internal Server Error"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
    }
  
}