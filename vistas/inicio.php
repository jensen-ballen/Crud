<?php
    // Crear una instancia del controlador de personas
    $controlador = new controladorPersonas();

    $resultado = $controlador->index();
    
    // Verificar si se solicita eliminar un registro

    if (isset($_GET['cargar']) && $_GET['cargar'] == 'eliminar' && isset($_GET['id'])) {
        // Sanitizar el ID recibido de la URL
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT); 

        $controlador->eliminar($id);
        header("Location: index.php"); // Redirige para refrescar la lista
        exit;
    }

    // Obtener la lista de personas
    $resultado = $controlador->index(); 

?>

<head>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    <h1>Página de inicio</h1>

    <table border="1">
        <tr>
            <th>id</th>
            <th>cedula</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>usuario</th>
            <th>clave</th>
            <th>Acciones</th>
            
        </tr>
        <tbody> 


        <?php
            while($fila=mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>" . $fila["id"] . "</td>";
                // Mostrar los datos de cada persona en la tabla
                echo "<td>" . $fila["cedula"] . "</td>"; 

                echo "<td>" .$fila["nombre"] . "</td>";
                echo "<td>" .$fila["apellido"] . "</td>";
                echo "<td>" .$fila["usuario"] . "</td>";
                echo "<td>" .$fila["clave"] . "</td>";
                 // Enlaces para ver, editar y eliminar
                 echo "<td><a href='?cargar=ver&id=".$fila["id"]."'>ver</a> <a href='?cargar=editar&id=".$fila["id"]."'

                 >editar</a> <a href='?cargar=eliminar&id=".$fila["id"]."'>eliminar</a></td>";

                
            }
        ?>
    </table>
</body>
