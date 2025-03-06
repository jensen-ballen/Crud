<?php
class conexion {
    
    //atributos
    private $host;
    private $user;
    private $pass;
    private $bd;
    private $con;

    //metodos
    public function __construct() {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->bd = "hermes_prueba_25_02_2025";

        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->bd);
        if (mysqli_errno($this->con)) {
            die("Fallo la conexión a $this->bd: " . mysqli_connect_error());
        } else {
            echo "Conexión exitosa a $this->bd";
        }
    }

    public function getConnection() {
        return $this->con;
    }
    
    public function consultaSimple($sql) {
        mysqli_query($this->con, $sql);
    }

    public function consultaRetorno($sql) {
        $consulta = mysqli_query($this->con, $sql);
        if (!$consulta) {
            die("Error en la consulta: " . mysqli_error($this->con));
        }
        return $consulta;



    }
}
?>
