<?php

class conexion {

    private static $instancia;
    private $dbh;

    private function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=champagnat', 'root', '');
            $this->dbh->exec('SET CHARACTER utf-8');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    public static function singleton() {

       if (!isset(self::$instancia)) {

           $miclase = __CLASS__;
           self::$instancia = new $miclase;
       }
       return self::$instancia;
   }
    public function query($consulta) {
        return $this->dbh->query($consulta);
    }

    public function prepare($consulta) {
        return $this->dbh->prepare($consulta);
    }

    public function beginTransaction() {
        return $this->dbh->beginTransaction();
    }

    public function commit() {
        return $this->dbh->commit();
    }

    public function rollBack() {
        return $this->dbh->rollBack();
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }

}

?>
