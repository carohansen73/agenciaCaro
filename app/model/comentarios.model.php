<?php
class ComentarioModel{

    private $db;
  
    function __construct(){
       $this->db= $this-> conectar();
    }

    private function conectar(){
        //1- Abro la conexion
        $db = new PDO('mysql:host=localhost;'.'dbname=db_agenciaviajes;charset=utf8', 'root', '');
        return $db;
    }

    function getAllByTour($idTour){
        
    

        $query = $this->db->prepare('SELECT * FROM comentario WHERE id_tour=?');

        
        //$query = $this->db->prepare('SELECT * FROM comentario');
        $query->execute([$idTour]);
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
         
        return $comentarios;
      
    }

    function get($id){
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id = ?');
        $query->execute([$id]);

        $comentarios = $query->fetch(PDO::FETCH_OBJ);
     
        return $comentarios;
    }

    function delete($id){

        $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
        $query->execute([$id]);

        //usar esto para avisar cuando no se puede eliminar categoria!
        return $query->rowCount();
    }

    function insert($texto, $calificacion, $idTour){

        //2-Enviar la consulta(los datos), lindeo los parametros (?,?,?)
        $query = $this->db->prepare('INSERT INTO comentario (texto, calificacion, id_tour) VALUES (?,?,?)');
        $query->execute([$texto, $calificacion, $idTour]);

        //3-no necesito obtener respuesta xq estoy insertando
        return $this->db->lastInsertId();

    }

    function update($id, $texto, $calificacion, $idTour){

        $query = $this->db->prepare('UPDATE comentario SET texto = ?, calificacion = ?, id_tour = ? WHERE id = ?');
        $result = $query->execute([$texto, $calificacion, $idTour, $id]);
        
        return $result;
    }

}