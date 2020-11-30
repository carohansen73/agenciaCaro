<?php

class RegionModel{

    private $db;
  
    function __construct(){
       $this->db= $this-> conectar();
    }

    private function conectar(){
        //1- Abro la conexion
        $db = new PDO('mysql:host=localhost;'.'dbname=db_agenciaviajes;charset=utf8', 'root', '');
        return $db;
    }

    function obtenerRegiones(){
       //2-Enviar la consulta (preparar y ejecutar)
        $query = $this->db->prepare('SELECT * FROM region');
        $query->execute();

        //3-procesar la respuesta para generar html
        $region = $query->fetchAll(PDO::FETCH_OBJ);
        //4- cerrar la conexion (PDO lo hace solo)
        return $region;
     
    }
    function insertarRegion($nombre, $informacion, $imagen = null){

        //cargar en la BBDD con o sin imagen
        if($imagen){
            $query = $this->db->prepare('INSERT INTO region (nombre, informacion, imagen) VALUES (?,?,?)');
            $query->execute([$nombre, $informacion, $imagen]);
        }else{
            $query = $this->db->prepare('INSERT INTO region (nombre, informacion) VALUES (?,?)');
            $query->execute([$nombre, $informacion]);
        }
       
        return $this->db->lastInsertId();

    }

    function eliminarRegion($id){
        $query = $this->db->prepare('DELETE FROM region WHERE id = ?');
        $query->execute([$id]);
    }
    
    function actualizarRegion( $nombre, $informacion, $id, $imagen = null){

        if($imagen){
            $query = $this->db->prepare('UPDATE region SET nombre = ?, informacion = ?, imagen = ? WHERE id = ?');
            $query->execute([$nombre, $informacion, $imagen, $id]);
        }else{
            $query = $this->db->prepare('UPDATE region SET nombre = ?, informacion = ? WHERE id = ?');
            $query->execute([$nombre, $informacion, $id]);
        }

        /*
        $query = $this->db->prepare('UPDATE region SET nombre = ?, informacion = ? WHERE id = ?');
        
        $query->execute([$nombre, $informacion, $id]);*/
      
    }

    function obtenerRegion($id){
        //2-Enviar la consulta (preparar y ejecutar)
         $query = $this->db->prepare('SELECT * FROM region WHERE id=?');
         $query->execute([$id]);
 
         //3-procesar la respuesta para generar html
         $region = $query->fetch(PDO::FETCH_OBJ);
         //4- cerrar la conexion (PDO lo hace solo)
         return $region;
      
    }

    
};