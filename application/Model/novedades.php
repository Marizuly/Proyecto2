<?php

namespace Mini\Model;
use Mini\Core\Model;

class novedades extends Model{

    private $idNovedades;
    private $descripcion;
    private $fechaNovedad; 

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    public function __GET($attr){
        return $this->$attr;
    }

    public function registrarnovedades(){
        $sql = "INSERT INTO novedades (idNovedades,descripcion,fechaNovedad) VALUES (null,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->descripcion);
        $query->bindParam(2, $this->fechaNovedad);
        
        return  $query->execute();
    }

    public function editar(){
        $sql = "SELECT idNovedades,descripcion,fechaNovedad FROM novedades WHERE idNovedades = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idNovedades);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetch();
        //fetchAll para devolver varios valores
    }

    public function listar(){
        $sql = "SELECT idNovedades,descripcion,fechaNovedad FROM novedades ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE novedades SET  descripcion = ?,fechaNovedad = ? WHERE idNovedades = ?";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->descripcion);
        $query->bindParam(2, $this->fechaNovedad);
        $query->bindParam(3, $this->idNovedades);
        return  $query->execute();
    }

    
}
?>