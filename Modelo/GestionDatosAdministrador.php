<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionDatosAdministrador
 *
 * @author William
 */
class GestionDatosAdministrador {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::singleton();
    }

    public function obtenerMisDatos() {
        $identificacion = $_SESSION['identificacion'];
        try {
            $consulta = " select * from persona as p inner join usuario as u on p.perIdentificacion=u.Persona_perIdentificacion"
                    . " where p.perIdentificacion='$identificacion'";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

    public function obtenerDatosAdmin($identificacion) {
        try {
            $consulta = "select * from persona as p inner join usuario as u on p.perIdentificacion=u.Persona_perIdentificacion"
                    . " where p.perIdentificacion=?";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $identificacion);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

    public function listarAdministrador() {
        try {
            $consulta = " select * from persona as p inner join usuario as u on p.perIdentificacion=u.Persona_perIdentificacion"
                    . " where u.Rol_idRol=1";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

    public function actualizarMisDatos(usuario $usuario) {

        $identificacion = $_SESSION['identificacion'];

        try {
            $consulta = " UPDATE persona as p INNER JOIN usuario AS u on p.perIdentificacion=u.Persona_perIdentificacion "
                    . " SET p.perIdentificacion=?,p.perNombres=?,p.perApellidos=?,p.perGenero=?,p.perTelefono=?, "
                    . " p.perCorreo=?,p.perDireccion=? WHERE p.perIdentificacion='$identificacion'";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $usuario->getIdentificacion());
            $query->bindParam(2, $usuario->getNombres());
            $query->bindParam(3, $usuario->getApellidos());
            $query->bindParam(4, $usuario->getGenero());
            $query->bindParam(5, $usuario->getTelefono());
            $query->bindParam(6, $usuario->getCorreo());
            $query->bindParam(7, $usuario->getDireccion());
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }
    
    public function actualizarDatosAdmin(usuario $usuario) {

        try {
            $consulta = " UPDATE persona as p INNER JOIN usuario AS u on p.perIdentificacion=u.Persona_perIdentificacion "
                    . " SET p.perNombres=?,p.perApellidos=?,p.perGenero=?,p.perTelefono=?, "
                    . " p.perCorreo=?,p.perDireccion=? WHERE p.perIdentificacion=?";
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
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

    public function agregarAdministrador(usuario $usuario) {
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

            $consulta = "insert into usuario values(null,?,?,'administrador','Activo',1,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $usuario->getCorreo());
            $query->bindParam(2, $usuario->getIdentificacion());
            $query->bindParam(3, $usuario->getIdentificacion());
            $query->execute();
            $this->conexion->commit();
            return $query;
        } catch (Exception $e) {
            $this->conexion->rollBack();
            echo 'Error ' . $e->getMessage();
        }
    }

}
