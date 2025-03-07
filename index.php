<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">

 </head>
 <body>

    <?php

        include_once("controlador/enrutador.php");
        include_once("controlador/controlador.php");

    ?>
    <h1> Ejercicio creacion de hermes </h1>

    <div>
        <nav>
            <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="?cargar=registrar">registro</a></li>
            </ul>
        </nav>
    </div>


    <?php
        $enrutador = new Enrutador();

        if(isset($_GET["cargar"])){
            $cargar = $_GET["cargar"];
        }else{
            $cargar="";
        }

        if ($enrutador->validarVista($cargar)) {
            $enrutador->cargarVista($cargar);
        }
    ?>
    
   
 </body>
 </html>
