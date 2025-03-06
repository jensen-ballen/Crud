<?php

class Enrutador{

    public function cargarVista($vista){
        echo "la vista cargada es... $vista  <br>";
        
        switch ($vista){
            case 'ver':
                include_once("vistas/" . $vista . ".php");
                break;
            case 'registrar':
                include_once("vistas/" . $vista . ".php");
                break;
            case 'editar':
                include_once("vistas/" . $vista . ".php");
                break;
            case 'eliminar':
                include_once("vistas/" . $vista . ".php");
                break;
        }
    }

    public function validarVista($variable){
        if(empty($variable)){
            include_once("vistas/inicio.php");
        }else{
            return true;
        }
    }
}
?>
