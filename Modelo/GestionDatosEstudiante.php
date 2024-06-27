<?php

class GestionDatosEstudiante {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::singleton();
    }

    public function agregarEstudiante(estudiante $estudiante) {
        try {

            $this->conexion->beginTransaction();

            //AGREGAR A TABLA PERSONA

            $consulta = "insert into persona values(?,?,?,?,?,?,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $estudiante->getIdentificacion());
            $query->bindParam(2, $estudiante->getNombres());
            $query->bindParam(3, $estudiante->getApellidos());
            $query->bindParam(4, $estudiante->getGenero());
            $query->bindParam(5, $estudiante->getTelefono());
            $query->bindParam(6, $estudiante->getCorreo());
            $query->bindParam(7, $estudiante->getDireccion());
            $query->execute();

            //INSERTAR EN LA TABLA ESTUDIANTE
            $consulta = "insert into estudiante values(null,?,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $estudiante->getCurso());
            $query->bindParam(2, $estudiante->getIdentificacion());
            $query->execute();

            //INSERTAR EN LA TABLA USUARIO

            $consulta = "insert into usuario values(null,?,?,'estudiante','Activo',3,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $estudiante->getCorreo());
            $query->bindParam(2, $estudiante->getIdentificacion());
            $query->bindParam(3, $estudiante->getIdentificacion());
            $query->execute();
            $this->conexion->commit();
            return $query;
        } catch (Exception $e) {
            $this->conexion->rollBack();
            echo 'Error ' . $e->getMessage();
        }
    }

    public function listarEstudiantes() {
        try {
            $consulta = " SELECT * FROM persona as p INNER JOIN estudiante as e INNER JOIN usuario as u"
                    . " on p.perIdentificacion=e.Persona_perIdentificacion and "
                    . " p.perIdentificacion=u.Persona_perIdentificacion WHERE u.Rol_idRol=3";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

    public function listarEstudiante($inicio, $registros) {
        $return = new stdClass();
        $return->data = new stdClass();

        try {
            $consulta = " SELECT COUNT(*) as COUNT from persona AS p INNER JOIN estudiante as e"
                    . " INNER JOIN usuario as u ON p.perIdentificacion=e.Persona_perIdentificacion"
                    . " AND u.Persona_perIdentificacion=p.perIdentificacion";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;

            //*********

            $consulta = " SELECT * from persona as p INNER JOIN estudiante as e INNER JOIN usuario as u"
                    . " ON p.perIdentificacion=e.Persona_perIdentificacion AND "
                    . " u.Persona_perIdentificacion=p.perIdentificacion LIMIT $inicio,$registros";
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

    public function actualizarEstudiante(estudiante $estudiante) {
        try {
            $consulta = " UPDATE persona as p INNER JOIN estudiante as e on p.perIdentificacion=e.Persona_perIdentificacion"
                    . " SET p.perNombres=?,p.perApellidos=?,p.perGenero=?,p.perTelefono=?,p.perCorreo=?,p.perDireccion=?,e.estCurso=?"
                    . " WHERE p.perIdentificacion=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $estudiante->getNombres());
            $query->bindParam(2, $estudiante->getApellidos());
            $query->bindParam(3, $estudiante->getGenero());
            $query->bindParam(4, $estudiante->getTelefono());
            $query->bindParam(5, $estudiante->getCorreo());
            $query->bindParam(6, $estudiante->getDireccion());
            $query->bindParam(7, $estudiante->getCurso());
            $query->bindParam(8, $estudiante->getIdentificacion());
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }
    
    public function obtenerDatosEstudiante($identificacion){
        try{
            $consulta="Select * from persona as p inner join estudiante as e on p.perIdentificacion=e.Persona_perIdentificacion"
                    . " WHERE p.perIdentificacion=?";
            $query=$this->conexion->prepare($consulta);
            $query->bindParam(1,$identificacion);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

}
