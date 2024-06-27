<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profesor
 *
 * @author William
 */

require_once 'persona.php';
class profesor extends persona{
    
    function __construct($identificacion = null, $nombres = null, $apellidos = null, $genero = null, $telefono = null, $correo = null, $direccion = null) {
        parent::__construct($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
    }
   
}
