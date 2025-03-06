<?php
    include_once("modelos/personas.php");

    class controladorPersonas {
        private $personas;

        public function __construct() {
            $this->personas = new personas();
        }

        public function listar() {
            $resultado = $this->personas->listar();
            return $resultado;
        }

        public function index() {
            return $this->listar();
        }

        public function ver($id) {
            $this->personas->set("id", $id);
            $resultado = $this->personas->ver($id);
            return $resultado;
        }

        public function eliminar($id) {
            // Llama al método eliminar de la clase personas
            $this->personas->set("id", $id);
            return $this->personas->eliminar($id); // Asegurarse de pasar el ID
        }

        public function editar($id, $cedula, $nombre, $apellido, $usuario, $clave) {
            // Establece los valores para editar una persona
            $this->personas->set("id", $id);
            $this->personas->set("cedula", $cedula);
            $this->personas->set("nombre", $nombre);
            $this->personas->set("apellido", $apellido);
            $this->personas->set("usuario", $usuario);
            $this->personas->set("clave", $clave);
            // Llama al método editar de la clase personas
            $this->personas->editar($id, $cedula, $nombre, $apellido, $usuario, $clave);
        }

        public function crear($cedula, $nombre, $apellido, $usuario, $clave) {
            // Establece los valores en el orden correcto para crear un nuevo usuario
            $this->personas->set("cedula", $cedula);
            $this->personas->set("nombre", $nombre);
            $this->personas->set("apellido", $apellido);
            $this->personas->set("usuario", $usuario);
            $this->personas->set("clave", $clave);
            // Intenta crear el usuario
            $resultado = $this->personas->crear();
            // Maneja el resultado de la creación
            return $resultado;
        }
    }
?>
