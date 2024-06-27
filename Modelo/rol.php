<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rol
 *
 * @author William
 */
class rol {
    private $idRol;
    private $nombre;
    
    function __construct($idRol, $nombre) {
        $this->idRol = $idRol;
        $this->nombre = $nombre;
    }
    
    public function getIdRol() {
        return $this->idRol;
    }

    public function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}

?>
