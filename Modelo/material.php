<?php

class material {

    private $idMaterial;
    private $codigo;
    private $nombre;
    private $cantidad;
    private $estado;

    function __construct($idMaterial=null, $codigo=null, $nombre=null, $cantidad=null, $estado=null) {
        $this->idMaterial = $idMaterial;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->estado = $estado;
    }
    
    function getIdMaterial() {
        return $this->idMaterial;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdMaterial($idMaterial) {
        $this->idMaterial = $idMaterial;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



}
