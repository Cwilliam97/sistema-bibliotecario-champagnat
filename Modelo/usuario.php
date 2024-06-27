<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author William
 */

require_once 'persona.php';
class usuario extends persona{
    private $login;
    private $password;
    private $estado;
    private $persona;
    private $rol;
    
    function __construct($identificacion=null, $nombres=null, $apellidos=null, $genero=null, $telefono=null, $correo=null, $direccion=null,$login=null, $password=null, $estado=null, $persona=null, $rol=null) {
        parent::__construct($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $this->login = $login;
        $this->password = $password;
        $this->estado = $estado;
        $this->persona = $persona;
        $this->rol = $rol;
        
    }
    
    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getPersona() {
        return $this->persona;
    }

    public function setPersona($persona) {
        $this->persona = $persona;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }



}

?>
