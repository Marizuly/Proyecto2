<?php

/**
 * Class Songs
 * This is a demo Model class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;


class Login extends Model
{ 
    /**
     * Get all songs from database
     */
    
  

     public function inicioAdmin($correo, $contrasena)
    {
        $sql = "CALL SP_login(:correo, :contrasena)";
        $query = $this->db->prepare($sql);
        $parameters = array(':correo' => $correo, ':contrasena'=> $contrasena);
        $query->execute($parameters);
        return $query->fetch();
    }
  
}