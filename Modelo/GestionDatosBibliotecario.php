<?php

class GestionDatosBibliotecario {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::singleton();
    }

    public function agregarbibliotecario(usuario $usuario) {
        try {

            $this->conexion->beginTransaction();

            //INSERTAR EN LA TABLA PERSONA

            $consulta = "insert into persona values(?,?,?,?,?,?,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $usuario->getIdentificacion());
            $query->bindParam(2, $usuario->getNombres());
            $query->bindParam(3, $usuario->getApellidos());
            $query->bindParam(4, $usuario->getGenero());
            $query->bindParam(5, $usuario->getTelefono());
            $query->bindParam(6, $usuario->getCorreo());
            $query->bindParam(7, $usuario->getDireccion());
            $query->execute();

            //INSERTAR EN LA TABLA USUARIO

            $consulta = "insert into usuario values(null,?,?,'bibliotecario','Activo',2,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1,$usuario->getNombres());
            $query->bindParam(2,$usuario->getApellidos());
            $query->bindParam(3,$usuario->getIdentificacion());
            $query->execute();
            $this->conexion->commit();
            return $query;
        } catch (Exception $e) {
            $this->conexion->rollBack();
            echo 'Error ' . $e->getMessage();
        }
    }

    public function obtenerDatos() {

        $identificacion = $_SESSION['identificacion'];
        try {
            $consulta = " SELECT * from persona INNER JOIN usuario on persona.perIdentificacion=usuario.Persona_perIdentificacion"
                    . " WHERE persona.perIdentificacion='$identificacion'";
            $query = $this->conexion->prepare($consulta);
//            $query->bindParam(1, $identificacion);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function actualizarBibliotecario(usuario $usuario) {

        try {
            //ACTUALIZAR BIBLIOTECARIO
            $consulta = " UPDATE persona AS p INNER JOIN usuario AS u ON p.perIdentificacion=u.Persona_perIdentificacion"
                      . " SET p.perNombres=?,p.perApellidos=?,p.perGenero=?,p.perTelefono=?,p.perCorreo=?,p.perDireccion=?"
                      . " WHERE p.perIdentificacion=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $usuario->getNombres());
            $query->bindParam(2, $usuario->getApellidos());
            $query->bindParam(3, $usuario->getGenero());
            $query->bindParam(4, $usuario->getTelefono());
            $query->bindParam(5, $usuario->getCorreo());
            $query->bindParam(6, $usuario->getDireccion());
            $query->bindParam(7, $usuario->getIdentificacion());
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listarBibliotecario($inicio, $registros) {

        $return = new stdClass();
        $return->data = new stdClass();

        try {
            $consulta = "Select count(*) as count from persona as p inner join usuario as u on p.perIdentificacion"
                      . "= u.Persona_perIdentificacion where u.Rol_idRol=2";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;

            //*********

            $consulta = " Select * from persona as p inner join usuario as u on p.perIdentificacion=u.Persona_perIdentificacion"
                    . " where u.Rol_idRol=2 LIMIT $inicio,$registros";
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

    public function obtenerDatosBibliotecario($identificacion) {
        try {
            $consulta = "Select * from persona as p inner join usuario as u where p.perIdentificacion=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $identificacion);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

}

?>
