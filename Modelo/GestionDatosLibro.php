<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionDatosLibro
 *
 * @author William
 */
class GestionDatosLibro {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::singleton();
    }

    public function agregarLibro(libro $libro) {
        try {
            $consulta = "INSERT INTO libro values(null,?,?,?,?,?,?,'Disponible')";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $libro->getCodigo());
            $query->bindParam(2, $libro->getNombre());
            $query->bindParam(3, $libro->getAutor());
            $query->bindParam(4, $libro->getCantidad());
            $query->bindParam(5, $libro->getEditorial());
            $query->bindParam(6, $libro->getEstado());
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function obtenerLibro() {
        try {
            $consulta = "Select * from libro where libro.libEstadoLibro='Disponible'";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function obtenerLibroById($id) {
        try {
            $consulta = "Select * from libro where libro.idLibro=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $id);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function actualizarLibro(libro $libro, $idLibro) {
        try {
            $consulta = " UPDATE libro SET libro.libCodigo=?,libro.libNombre=?,libro.libAutor=?,"
                    . " libro.libCantidad=?,libro.libEditorial=?,libro.libEstado=?"
                    . " WHERE libro.idLibro=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $libro->getCodigo());
            $query->bindParam(2, $libro->getNombre());
            $query->bindParam(3, $libro->getAutor());
            $query->bindParam(4, $libro->getCantidad());
            $query->bindParam(5, $libro->getEditorial());
            $query->bindParam(6, $libro->getEstado());
            $query->bindParam(7, $idLibro);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function desactivarLibro($idLibro) {
        try {
            $consulta = "Update libro set libro.libEstadoLibro='Inactivo' where idLibro=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $idLibro);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function buscarLibro($filtro) {

        try {
            $consulta = " SELECT libro.libCodigo codigo,libro.libNombre nombre,libro.libAutor autor,"
                    . " libro.libCantidad cantidad,libro.libEditorial editorial,libro.libEstado estado,"
                    . " libro.libEstadoLibro estadoLibro WHERE libro.libCodigo LIKE '%$filtro%' or "
                    . " libro.libNombre LIKE '%$filtro%' OR libro.libAutor like '%$filtro%' or libro.libCantidad"
                    . " LIKE '%$filtro%' or libro.libEditorial LIKE '%$filtro%' OR libro.libEstado LIKE '%$filtro%'";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $filtro);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function buscarLibroDisponible($filtro) {

        try {
            $where = "";
            if ($filtro !== "") {
                $where = "where libNombre like '%" . $filtro . "%' OR libAutor like '%" . $filtro . "%' OR libCodigo like '%" . $filtro . "%' OR libEditorial like '%" . $filtro . "%'";
            }

            $sql = "select * from libro {$where}";

            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $filtro);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function listarLibro($inicio, $registros) {
        $return = new stdClass();
        $return->data = new stdClass();

        try {
            $consulta = "select count(*) as count from libro";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;

            //*********

            $consulta = "select * from libro LIMIT $inicio,$registros";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $tipo);
            $query->execute();
            $return->data->rows = $query->fetchAll(PDO::FETCH_CLASS, "stdClass");

            $return->status = 200;
            $return->msg = "Consulta exitosa.";
        } catch (Exception $e) {
            
            $return->status = 505;
            $return->msg = $e->getMessage();
            $return->data = null;
            
        }
        return $return;
    }

}

?>
