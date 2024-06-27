<?php

require_once 'persona.php';

class estudiante extends persona {

    private $curso;

    function __construct($identificacion = null, $nombres = null, $apellidos = null, $genero = null, $telefono = null, $correo = null, $direccion = null, $curso = null) {
        parent::__construct($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
        $this->curso = $curso;
    }

    function getCurso() {
        return $this->curso;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }


}
