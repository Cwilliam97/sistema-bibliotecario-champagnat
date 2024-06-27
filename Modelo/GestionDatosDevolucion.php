<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionDatosDevolucion
 *
 * @author William
 */
class GestionDatosDevolucion {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::singleton();
    }

    public function consultarPrestamo($inicio, $registros, $filtro) {

        $return = new stdClass();
        $return->data = new stdClass();

        try {
            $where = "";
            if ($filtro !== "") {
                $where = "where peridentificacion like '%" . $filtro . "%' OR pernombre like '%" . $filtro . "%' OR perapellido like '%" . $filtro . "%'";
            }

            $consulta = " SELECT count(*) as count FROM prestamolibro as pr INNER JOIN libro as l ON pr.Libro_idLibro=l.idLibro INNER JOIN"
                    . " persona as p on p.perIdentificacion=pr.Persona_perIdentificacion";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;


            //*********

            $consulta = " SELECT * FROM prestamolibro as pr INNER JOIN libro as l ON pr.Libro_idLibro=l.idLibro INNER JOIN"
                    . " persona as p on p.perIdentificacion=pr.Persona_perIdentificacion {$where} LIMIT $inicio,$registros";
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

    public function listarDevoluciones($inicio, $registros) {

        $identificacion = $_SESSION['identificacion'];

        $return = new stdClass();
        $return->data = new stdClass();

        try {

            $consulta = " SELECT COUNT(*) AS count FROM devolucionlibro as d INNER JOIN libro as l"
                    . " ON d.Libro_idLibro=l.idLibro INNER JOIN persona AS p on "
                    . " d.Persona_idPersona=p.perIdentificacion WHERE p.perIdentificacion=$identificacion";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;


            //*********

            $consulta = " SELECT * FROM devolucionlibro as d INNER JOIN libro as l ON "
                    . " d.Libro_idLibro=l.idLibro INNER JOIN persona AS p on "
                    . " d.Persona_idPersona=p.perIdentificacion WHERE "
                    . " p.perIdentificacion=$identificacion LIMIT $inicio,$registros";
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

    public function listarDevolucionesMaterial($inicio, $registros) {

        $identificacion = $_SESSION['identificacion'];

        $return = new stdClass();
        $return->data = new stdClass();

        try {

            $consulta = " SELECT COUNT(*) AS count FROM devolucionmaterial as d INNER JOIN "
                    . " materialDidactico as m ON d.materialDidactico_idmaterialDidactico="
                    . " m.idmaterialDidactico INNER JOIN persona AS p on d.Persona_perIdentificacion"
                    . " =p.perIdentificacion WHERE p.perIdentificacion=$identificacion";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;


            //*********

            $consulta = " SELECT * FROM devolucionmaterial as d INNER JOIN "
                    . " materialDidactico as m ON d.materialDidactico_idmaterialDidactico="
                    . " m.idmaterialDidactico INNER JOIN persona AS p on d.Persona_perIdentificacion"
                    . " =p.perIdentificacion WHERE p.perIdentificacion=$identificacion LIMIT $inicio,$registros";
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

    public function obtenerPrestamoLibro($idPrestamo) {
        try {
            $consulta = " SELECT * FROM prestamolibro as pr INNER JOIN libro as l on pr.Libro_idLibro=l.idLibro"
                      . " INNER JOIN persona as p ON p.perIdentificacion=pr.Persona_perIdentificacion "
                      . " WHERE pr.idPrestamo=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $idPrestamo);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

}
