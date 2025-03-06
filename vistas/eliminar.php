<?php
    // Crear una instancia del controlador de personas
    $controlador = new controladorPersonas();

    // Verificar si se ha proporcionado un ID en la URL
    if (isset($_GET['id'])) {
        // Obtener el registro correspondiente al ID
        $registrar = $controlador->ver($_GET['id']);
    } else {
        // Redirigir a la página de inicio si no se proporciona un ID
        header('Location:index.php'); 
    }

    // Verificar si se ha enviado la solicitud de eliminación
    if (isset($_POST['eliminar'])) {
        // Llamar al método eliminar del controlador
        if ($controlador->eliminar($_GET['id'])) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar el usuario.";
        }
        // Redirigir a la página de inicio después de eliminar
        header('Location:index.php');
        exit; // Asegurarse de que no se ejecute más código después de la redirección
}
?>

<form action="" method="post"> <!-- Formulario para confirmar la eliminación -->
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr> <!-- Mostrar los detalles del usuario a eliminar -->
                <td><?php echo $registrar['id']; ?></td>
                <td><?php echo $registrar['cedula']; ?></td>
                <td><?php echo $registrar['nombre']; ?></td>
                <td><?php echo $registrar['apellido']; ?></td>
                <td><?php echo $registrar['usuario']; ?></td>
                <td><?php echo $registrar['clave']; ?></td>
                <td><input type="submit" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');"></td>
            </tr>
        </tbody>
    </table>    
</form>
