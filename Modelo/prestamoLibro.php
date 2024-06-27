<?php

class prestamoLibro {

    private $identificacion;
    private $idLibro;
    private $cantidad;
    private $fechaPrestamo;
    private $estado;

    function __construct($identificacion = null, $idLibro = null, $cantidad = null, $fechaPrestamo = null, $estado=null) {
        $this->identificacion = $identificacion;
        $this->idLibro = $idLibro;
        $this->cantidad = $cantidad;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->estado=$estado;
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
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



}
