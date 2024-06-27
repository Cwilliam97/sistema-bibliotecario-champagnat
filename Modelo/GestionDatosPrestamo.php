<?php

class GestionDatosPrestamo {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::singleton();
    }

    public function buscarAdministrativo($iden) {
        try {
            $consulta = "SELECT * FROM persona AS p INNER JOIN administrativos AS a on "
                    . "p.perIdentificacion=a.Persona_perIdentificacion WHERE "
                    . "p.perIdentificacion like '%$iden%' OR p.perNombres like '%$iden%' "
                    . "LIMIT 5;";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function buscarEstudiante($iden) {
        try {
            $consulta = "SELECT * FROM persona AS p INNER JOIN estudiante AS e on "
                    . "p.perIdentificacion=e.Persona_perIdentificacion WHERE "
                    . "p.perIdentificacion like '%$iden%' OR p.perNombres like '%$iden%' "
                    . "LIMIT 5";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function buscarLibro($iden) {
        try {
            $consulta = "SELECT * FROM libro AS l WHERE l.libNombre like '%$iden%' or "
                    . "l.libAutor like '%$iden%' LIMIT 5";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function buscarProfesor($iden) {
        try {
            $consulta = "SELECT * FROM persona as p INNER JOIN profesor as pr on"
                    . " p.perIdentificacion=pr.Persona_perIdentificacion WHERE "
                    . " p.perIdentificacion like '%$iden%' OR p.PerNombres like '%$iden%' "
                    . " LIMIT 5";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function buscarMaterial($iden) {
        try {
            $consulta = "SELECT * FROM materialDidactico AS m WHERE m.matNombre like '%$iden%' or "
                    . " m.matCodigo like '%$iden%' LIMIT 5";
            $query = $this->conexion->prepare($consulta);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function prestarLibro(prestamoLibro $prestamo) {
        
        $estado=1;
        
        try {
            $consulta = "INSERT INTO prestamoLibro VALUES(null,?,?,?,?,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $prestamo->getIdentificacion());
            $query->bindParam(2, $prestamo->getIdLibro());
            $query->bindParam(3, $prestamo->getCantidad());
            $query->bindParam(4, $prestamo->getFechaPrestamo());
            $query->bindParam(5, $estado);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function prestarMaterial(prestamoMaterial $prestamo) {
        
        $estado=1;
        
        try {
            $consulta = "INSERT INTO prestamoMaterial VALUES(null,?,?,?,?,?)";
            $query = $this->conexion->prepare($consulta);
            $query->bindParam(1, $prestamo->getIdentificacion());
            $query->bindParam(2, $prestamo->getIdMaterial());
            $query->bindParam(3, $prestamo->getCantidad());
            $query->bindParam(4, $prestamo->getFechaPrestamo());
            $query->bindParam(5,$estado);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

   
     public function listarPrestamos($inicio, $registros) {
         
        $identificacion=$_SESSION['identificacion'];

        $return = new stdClass();
        $return->data = new stdClass();

        try {

            $consulta = " SELECT count(*) as count FROM prestamolibro as pr INNER JOIN persona as p "
                      . " on pr.Persona_perIdentificacion=p.perIdentificacion INNER JOIN"
                      . " libro as l ON l.idLibro= pr.Libro_idLibro WHERE p.perIdentificacion=$identificacion";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;


            //*********

            $consulta = " SELECT * FROM prestamolibro as pr INNER JOIN persona as p "
                      . " on pr.Persona_perIdentificacion=p.perIdentificacion INNER JOIN"
                      . " libro as l ON l.idLibro= pr.Libro_idLibro WHERE p.perIdentificacion=$identificacion LIMIT $inicio,$registros";
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
    
    
    public function listarPrestamoMaterial($inicio, $registros) {
         
        $identificacion=$_SESSION['identificacion'];

        $return = new stdClass();
        $return->data = new stdClass();

        try {

            $consulta = " SELECT count(*) as count FROM prestamomaterial as pm INNER JOIN persona as"
                      . " p on pm.Persona_perIdentificacion=p.perIdentificacion INNER JOIN "
                      . " materialdidactico as m ON m.idmaterialDidactico= pm.materialDidactico_idmaterialDidactico"
                      . " WHERE p.perIdentificacion=$identificacion";
            $query = $this->conexion->prepare($consulta);
            $query->execute();

            $objCount = $query->fetchObject();
            $return->data->count = $objCount->count;


            //*********

            $consulta = " SELECT * FROM prestamomaterial as pm INNER JOIN persona as"
                      . " p on pm.Persona_perIdentificacion=p.perIdentificacion INNER JOIN "
                      . " materialdidactico as m ON m.idmaterialDidactico= pm.materialDidactico_idmaterialDidactico"
                      . " WHERE p.perIdentificacion=$identificacion LIMIT $inicio,$registros";
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