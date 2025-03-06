<?php
    include_once("controlador/controlador.php");
    // Crear una instancia del controlador de personas
    $controlador = new controladorPersonas();

    // Obtener el ID de la URL, si está presente
    $id = isset($_GET['id']) ? $_GET['id'] : null; 

    // Obtener solo el registro específico
    $resultado = $controlador->ver($id); 

    // Verificar si el resultado es nulo
    if ($resultado === null) { 
        die("Error: No se encontró el registro con ID: $id");
    }
?>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Cédula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Clave</th>
    </tr>
    <tr>
        <td><?php echo $resultado['id']; ?></td>
        <td><?php echo $resultado['cedula']; ?></td>
        <td><?php echo $resultado['nombre']; ?></td>
        <td><?php echo $resultado['apellido']; ?></td>
        <td><?php echo $resultado['usuario']; ?></td>
        <td><?php echo $resultado['clave']; ?></td>
    </tr>
</table>
