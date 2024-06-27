<?php

class gestionDatosUsuarios {

    private $conexion;

    public function __construct() {
        $this->conexion=  conexion::singleton();
    }

    public function iniciarSesion($login, $password) {
        try {
            $consulta = " SELECT * FROM persona INNER JOIN usuario ON persona.perIdentificacion=usuario.Persona_perIdentificacion"
                       ." WHERE usuario.usuLogin=? AND usuario.usuPassword=? AND usuario.usuEstado='Activo'";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $login);
            $query->bindParam(2, $password);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>
