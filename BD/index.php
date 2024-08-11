<?php
// Incluir la clase de conexión
include '../config/Conexion_db.php';

// Inicializamos la variable de estado
$status = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $host = $_POST['host'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];

    // Conectar a la base de datos
    $conexion = Conexion::conectar($host, $username, $password);

    // Crear base de datos si no existe
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conexion->query($sql) === TRUE) {
        // Seleccionar la base de datos
        $conexion->select_db($dbname);

        // Leer el archivo SQL
        $dumpFile = 'repuestosjj.sql';
        $queries = file_get_contents($dumpFile);
        if ($queries === false) {
            $status = "Error al leer el archivo SQL.";
        } else {
            // Dividir el contenido en consultas
            $queries = explode(';', $queries);

            // Ejecutar las consultas
            foreach ($queries as $query) {
                $query = trim($query);
                if (!empty($query)) {
                    if ($conexion->query($query) === FALSE) {
                        $status = "Error al ejecutar la consulta: " . $conexion->error;
                        break;
                    }
                }
            }

            if (empty($status)) {
                // Actualizar el archivo de conexión
                $conexionFile = '../config/Conexion_db.php';
                $conexionContent = "<?php\n";
                $conexionContent .= "class Conexion {\n";
                $conexionContent .= "    private static \$host = '$host';\n";
                $conexionContent .= "    private static \$user = '$username';\n";
                $conexionContent .= "    private static \$password = '$password';\n";
                $conexionContent .= "    private static \$db_name = '$dbname';\n";
                $conexionContent .= "    public static function configurar(\$host, \$user, \$password, \$db_name) {\n";
                $conexionContent .= "        self::\$host = \$host;\n";
                $conexionContent .= "        self::\$user = \$user;\n";
                $conexionContent .= "        self::\$password = \$password;\n";
                $conexionContent .= "        self::\$db_name = \$db_name;\n";
                $conexionContent .= "    }\n";
                $conexionContent .= "    public static function conectar() {\n";
                $conexionContent .= "        \$conexion = new mysqli(self::\$host, self::\$user, self::\$password);\n";
                $conexionContent .= "        if (\$conexion->connect_error) {\n";
                $conexionContent .= "            die(\"No se pudo conectar al servidor MySQL: \" . \$conexion->connect_error);\n";
                $conexionContent .= "        }\n";
                $conexionContent .= "        \$result = \$conexion->query(\"SHOW DATABASES LIKE '\" . self::\$db_name . \"'\");\n";
                $conexionContent .= "        if (\$result && \$result->num_rows == 0) {\n";
                $conexionContent .= "            if (\$conexion->query(\"CREATE DATABASE \" . self::\$db_name) === TRUE) {\n";
                $conexionContent .= "                echo \"Base de datos creada exitosamente. \";\n";
                $conexionContent .= "            } else {\n";
                $conexionContent .= "                die(\"Error al crear la base de datos: \" . \$conexion->error);\n";
                $conexionContent .= "            }\n";
                $conexionContent .= "        }\n";
                $conexionContent .= "        \$conexion->select_db(self::\$db_name);\n";
                $conexionContent .= "        return \$conexion;\n";
                $conexionContent .= "    }\n";
                $conexionContent .= "}\n";
                $conexionContent .= "?>";

                // Guardar el archivo de conexión
                if (file_put_contents($conexionFile, $conexionContent) === false) {
                    $status = "Error al actualizar el archivo de conexión.";
                } else {
                    $status = "Base de datos configurada y archivo de conexión actualizado.";
                }
            }
        }
    } else {
        $status = "Error al crear la base de datos: " . $conexion->error;
    }

    $conexion->close();

    // Mostrar la alerta y redirigir
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Instalador de Base de Datos</title>
        <link rel='stylesheet' href='https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: '" . (strpos($status, "Error") === false ? "Éxito" : "Error") . "',
                text: '$status',
                icon: '" . (strpos($status, "Error") === false ? "success" : "error") . "'
            }).then(() => { window.location.href = '../index.php'; });
        </script>
    </body>
    </html>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalador de Base REPUESTOS J.J</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Instalador de Base REPUESTOS J.J</h1>
        <img src="NewWins/img/logo.png" alt="Logo" class="img-fluid" width="175" height="157">
        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="host" class="form-label">Host</label>
                <input type="text" class="form-control" id="host" name="host" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="dbname" class="form-label">Nombre de la Base de Datos</label>
                <input type="text" class="form-control" id="dbname" name="dbname" value="BD_JJ" required>
            </div>
            <button type="submit" class="btn btn-primary">Instalar</button>
        </form>
    </div>
</body>
</html>