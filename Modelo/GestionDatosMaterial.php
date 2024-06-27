<?php

class GestionDatosMaterial {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::singleton();
    }

    public function agregarMaterial(material $material) {
        try {
            $consulta = "insert into materialdidactico values(null,?,?,?,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $material->getCodigo());
            $query->bindParam(2, $material->getNombre());
            $query->bindParam(3, $material->getCantidad());
            $query->bindParam(4, $material->getEstado());
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listarMaterialDidactico($inicio, $registros) {
        $return = new stdClass();
        $return->data = new stdClass();
        try {
            $consulta = "Select count(*) as count from materialDidactico";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;

            //*********

            $consulta = "Select * from materialDidactico limit $inicio,$registros";
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

    public function obtenerMaterial($idMaterial) {
        try {
            $consulta = "select * from materialDidactico where idmaterialDidactico='$idMaterial'";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function actualizarMaterial(material $material) {
        try {
            $consulta = "update materialdidactico as m set"
                    . " m.matCodigo=?,m.matNombre=?,m.matCantidad=?,m.matEstado=?"
                    . " where idmaterialDidactico=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $material->getCodigo());
            $query->bindParam(2, $material->getNombre());
            $query->bindParam(3, $material->getCantidad());
            $query->bindParam(4, $material->getEstado());
            $query->bindParam(5, $material->getIdMaterial());
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

}
