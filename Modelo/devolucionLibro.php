<?php

class devolucionLibro {

    private $identificacion;
    private $idLibro;
    private $cantidad;
    private $fechaDevolucion;
    
    function __construct($identificacion, $idLibro, $cantidad, $fechaDevolucion) {
        $this->identificacion = $identificacion;
        $this->idLibro = $idLibro;
        $this->cantidad = $cantidad;
        $this->fechaPrestamo = $fechaDevolucion;
    }
    
    
    function getIdentificacion() {
        return $this->identificacion;
    }

    function getIdLibro() {
        return $this->idLibro;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    function setIdLibro($idLibro) {
        $this->idLibro = $idLibro;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setFechaPrestamo($fechaPrestamo) {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }

    function setFechaDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
    }
    
}

?>