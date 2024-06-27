<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionDatosProfesor
 *
 * @author William
 */
class GestionDatosProfesor {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::singleton();
    }

    public function agregarProfesor(profesor $profesor) {
        try {

            $this->conexion->beginTransaction();

            //INSERTAR EN LA TABLA PERSONA

            $consulta = "insert into persona values(?,?,?,?,?,?,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $profesor->getIdentificacion());
            $query->bindParam(2, $profesor->getNombres());
            $query->bindParam(3, $profesor->getApellidos());
            $query->bindParam(4, $profesor->getGenero());
            $query->bindParam(5, $profesor->getTelefono());
            $query->bindParam(6, $profesor->getCorreo());
            $query->bindParam(7, $profesor->getDireccion());
            $query->execute();

            //INSERTAR EN LA TABLA DE PROFESOR

            $consulta = "insert into profesor values(null,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $profesor->getIdentificacion());
            $query->execute();

            //INSERTAR EN LA TABLA USUARIO

            $consulta = "insert into usuario values(null,?,?,'profesor','Activo',4,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $profesor->getCorreo());
            $query->bindParam(2, $profesor->getIdentificacion());
            $query->bindParam(3, $profesor->getIdentificacion());
            $query->execute();
            $this->conexion->commit();
            return $query;
        } catch (Exception $e) {
            $this->conexion->rollBack();
            echo 'Error ' . $e->getMessage();
        }
    }

    public function listarProfesor($inicio, $registros) {

        $return = new stdClass();
        $return->data = new stdClass();

        try {
            $consulta = "SELECT COUNT(*) as count from persona as p INNER JOIN profesor as pr on p.perIdentificacion"
                    . "=pr.Persona_perIdentificacion";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;

            //*********

            $consulta = "SELECT * from persona as p INNER JOIN profesor as pr on p.perIdentificacion"
                    . "=pr.Persona_perIdentificacion LIMIT $inicio,$registros";
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

    public function obtenerProfesor($identificacion) {
        try {
            $consulta = " SELECT * FROM persona as p INNER JOIN profesor as pr on "
                    . " p.perIdentificacion=pr.Persona_perIdentificacion WHERE "
                    . " pr.Persona_perIdentificacion='$identificacion'";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

    public function actualizarProfesor(usuario $profesor) {
        try {
            $consulta = " UPDATE persona as p INNER JOIN profesor as pr ON p.perIdentificacion=pr.Persona_perIdentificacion"
                      . " SET p.perNombres=?,p.perApellidos=?,p.perGenero=?,p.perTelefono=?,"
                      . " p.perCorreo=?,p.perDireccion=? WHERE p.perIdentificacion=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $profesor->getNombres());
            $query->bindParam(2, $profesor->getApellidos());
            $query->bindParam(3, $profesor->getGenero());
            $query->bindParam(4, $profesor->getTelefono());
            $query->bindParam(5, $profesor->getCorreo());
            $query->bindParam(6, $profesor->getDireccion());
            $query->bindParam(7, $profesor->getIdentificacion());
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

}
