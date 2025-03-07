<head>
    <link rel="stylesheet" href="../styles.css">
</head>
<?php
    include_once("controlador/controlador.php");

        // Crear una instancia del controlador de personas
        $controlador = new controladorPersonas();


        // Obtener el ID de la URL, filtrando y sanitizando
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : null;


        // Verificar si se ha proporcionado un ID
        if ($id) {
            // Obtener el registro correspondiente al ID
            $resultado = $controlador->ver($id);

            // Verificar si se encontró el registro
            if ($resultado) {
                // Mostrar el formulario para editar

        } else {
                echo "Registro no encontrado."; // Mensaje de error si no se encuentra el registro

                exit; // Importante: detener la ejecución si no se encuentra el registro

        }
        } else {
            echo "ID no proporcionado."; // Mensaje de error si no se proporciona el ID

            exit; // Importante: detener la ejecución si no se proporciona el ID

    }
?>

<h2>Editar Persona</h2> <!-- Título del formulario de edición -->


<form action="" method="post"> <!-- Formulario para editar los datos de la persona -->

    <label>Cédula</label><br>
    <input type="text" name="cedula" value="<?php echo htmlspecialchars($resultado['cedula']); ?>" required><br><br>
    <label>Nombre</label><br>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($resultado['nombre']); ?>" required><br><br>
    <label>Apellido</label><br>
    <input type="text" name="apellido" value="<?php echo htmlspecialchars($resultado['apellido']); ?>" required><br><br>
    <label>Usuario</label><br>
    <input type="text" name="usuario" value="<?php echo htmlspecialchars($resultado['usuario']); ?>" required><br><br>
    <label>Clave</label><br>
    <input type="password" name="clave" required><br><br> <!-- Campo para la clave -->


    <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- ID oculto para enviar con el formulario -->
    <input type="submit" name="enviar" value="Guardar Cambios"> <!-- Botón para guardar los cambios -->

</form>

<?php
    if (isset($_POST["enviar"])) {
        // Obtener los datos del formulario
        $cedula = $_POST['cedula']; 

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        // Llamar al método editar del controlador
        $controlador->editar($id, $cedula, $nombre, $apellido, $usuario, $clave);


        echo "Cambios guardados con éxito."; // Mensaje de éxito

        // Redirigir a la página de inicio después de guardar
        header('Location:index.php'); 

        exit; // Asegúrate de que el script termine después de la redirección

    }
?>
