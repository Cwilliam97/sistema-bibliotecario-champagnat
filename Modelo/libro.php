<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of libro
 *
 * @author William
 */
class libro {
    private $codigo;
    private $nombre;
    private $autor;
    private $cantidad;
    private $editorial;
    private $estado;
    
    function __construct($codigo=null, $nombre=null, $autor=null, $cantidad=null, $editorial=null, $estado=null) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->autor = $autor;
        $this->cantidad = $cantidad;
        $this->editorial = $editorial;
        $this->estado = $estado;
    }

    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }


    
}

?>
