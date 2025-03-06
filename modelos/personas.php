<?php

    include_once ("modelos/conexion.php");

    class personas{
        private $id;
        private $cedula;
        private $nombre;
        private $apellido;
        private $usuario;
        private $clave;

        public function __construct(){
            $this->con = new conexion();
        }

        public function set($atributo, $contenido){
            $this->$atributo=$contenido;
        }

        public function get($atributo){
            return $this->$atributo;
        }

        public function listar(){
            $sql = "SELECT id, cedula, nombre, apellido, usuario, clave FROM personas_t";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function ver($id){
            $sql = "SELECT * FROM personas_t WHERE id='$id'";
            $resultado = $this->con->consultaRetorno($sql);
            $row=mysqli_fetch_assoc($resultado);
            if ($row) {
                $this->set('id', $row['id']);
                $this->cedula = $row['cedula'];
                $this->nombre = $row['nombre'];
                $this->apellido = $row['apellido'];
                $this->usuario = $row['usuario'];
                $this->clave = $row['clave'];
            } else {
                return null;
            }
            return $row;
        }

        public function editar($id, $cedula, $nombre, $apellido, $usuario, $clave){
            $sql = "UPDATE personas_t SET cedula = '$cedula', nombre = '$nombre',
            apellido = '$apellido', usuario = '$usuario', clave = '$clave' WHERE id = '$id'";
            $this->con->consultaSimple($sql);
        }

        public function eliminar($id){
            $sql = "DELETE FROM personas_t WHERE id= '$id'";
            if ($this->con->consultaSimple($sql)) {
                return true; // Devolver verdadero si la eliminación fue exitosa
            } else {
                echo "Error al eliminar: " . mysqli_error($this->con->getConnection());
                return false; // Devolver falso si hubo un error
            }
        }

        public function crear(){
            //validar que la cedula no exista
            $ql2="SELECT * FROM personas_t WHERE cedula='{$this->cedula}'";
            $resultado2 = $this->con->consultaRetorno($ql2);
            $filas=mysqli_num_rows($resultado2);
            if ($filas == 0) {
                $sql = "INSERT INTO personas_t (cedula, nombre, apellido, usuario, clave)
                VALUES ('{$this->cedula}', '{$this->nombre}', '{$this->apellido}', '{$this->usuario}', '{$this->clave}')";
                // Ejecutar la consulta en la conexión
                if ($this->con->consultaSimple($sql)) {
                    return true;
                } else {
                    echo "Error al insertar: " . mysqli_error($this->con->getConnection());
                    return false;
                }
            } else {
                echo "Error: La cédula ya existe."; // Mensaje de error si la cédula ya existe
                return false;
            }
        }
        //public function guardar(){
        //$sql = "INSERT INTO equipo (nombre, placa, color) VALUES ('$this->nombre', '$this->placa', '$this->color')";
        //$this->conexion->consultaRetorno($sql);}
    }
?>
