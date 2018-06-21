<?php

namespace Mini\Model;
use Mini\Core\Model;

class controlE_S extends Model{

    private $idcontrolE_S;
    private $horaE;
    private $horaS;
    private $fecha;
    

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    public function __GET($attr){
        return $this->$attr;
    }

    public function registrarcontrolE_S(){
        $sql = "INSERT INTO controlE_S (idcontrolE_S,horaE,horaS,fecha ) VALUES (null,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->horaE);
        $query->bindParam(2, $this->horaS);
        $query->bindParam(3, $this->fecha);
        
        
        return  $query->execute();
    }

    public function editar(){
        $sql = "SELECT idcontrolE_S,horaE,horaS,fecha FROM controlE_S WHERE idcontrolE_S = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->idcontrolE_S);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetch();
        //fetchAll para devolver varios valores
    }

    public function listar(){
        $sql = "SELECT idcontrolE_S,horaE,horaS,fecha FROM controlE_S ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE controlE_S SET  horaE = ?,horaS = ?,fecha = ? WHERE idcontrolE_S = ?";

        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->horaE);
        $query->bindParam(2, $this->horaS);
        $query->bindParam(3, $this->fecha);
        
        return  $query->execute();
    }

   
}
?>