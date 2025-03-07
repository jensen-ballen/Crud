<html>
    <head>
        <title>Registrar Usuario</title>
        <link rel="stylesheet" href="../styles.css">
    </head>

    <body>
        <h2>Este es el módulo de crear</h2>

        <form action="" method="post">
            <label>Cédula</label><br>
            <input type="text" name="cedula" required><br><br>
            <label>Nombre</label><br>
            <input type="text" name="nombre" required><br><br>
            <label>Apellido</label><br>
            <input type="text" name="apellido" required><br><br>
            <label>Usuario</label><br>
            <input type="text" name="usuario" required><br><br>
            <label>Clave</label><br>
            <input type="password" name="clave" required><br><br>

            <input type="submit" name="enviar" value="Crear Usuario">
        </form>

        <?php
        if (isset($_POST["enviar"])) {
            include_once("controlador/controlador.php");
            $controlador = new controladorPersonas();
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];

            $res = $controlador->crear($cedula, $nombre, $apellido, $usuario, $clave);

            if ($res) {
                echo "Usuario creado con éxito";
            } else {
                //echo "Error: el usuario no pudo ser registrado. Verifique que la cédula o usuario no existan.";
            }
        }
        ?>
    </body>
</html>
