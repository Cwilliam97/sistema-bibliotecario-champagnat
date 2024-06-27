<?php


class prestamoMaterial {
    private $identificacion;
    private $idMaterial;
    private $cantidad;
    private $fechaPrestamo;
    private $estado;
            
    function __construct($identificacion=null, $idMaterial=null, $cantidad=null, $fechaPrestamo=null,$estado=null) {
        $this->identificacion = $identificacion;
        $this->idMaterial = $idMaterial;
        $this->cantidad = $cantidad;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->estado=$estado;
    }
    
    function getIdentificacion() {
        return $this->identificacion;
    }

    function getIdMaterial() {
        return $this->idMaterial;
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

    function setIdMaterial($idMaterial) {
        $this->idMaterial = $idMaterial;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setFechaPrestamo($fechaPrestamo) {
        $this->fechaPrestamo = $fechaPrestamo;
    }
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }





}
