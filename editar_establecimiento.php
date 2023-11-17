<?php
include_once('config/conexion.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: main.php'); // Redirige a la página de inicio de sesión si el usuario no está conectado.
    exit;
}

if (isset($_GET['id'])) {
    $establecimientoId = $_GET['id'];

    // Consulta para obtener los detalles del establecimiento a editar
    $sql = "SELECT * FROM registro_de_establecimiento WHERE Id_registro = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $establecimientoId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        // Manejar el caso en que el establecimiento no se encuentre en la base de datos.
        echo "El establecimiento no se encuentra en la base de datos.";
        exit;
    }
} else {
    // Manejar el caso en que no se proporcionó un ID válido.
    echo "ID de establecimiento no válido.";
    exit;
}

// Procesa el formulario de edición si se envió.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_establecimiento'])) {
    $nombreCategoria = $_POST['nombre_categoria'];
    $nombreEstablecimiento = $_POST['nombre_establecimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $informacionAdicional = $_POST['informacion_adicional'];
    $nit = $_POST['nit'];
    $localidad = $_POST['localidad'];
    $tipoEstablecimiento = $_POST['tipo_establecimiento'];

    // Consulta para actualizar los detalles del establecimiento en la base de datos
    $sql = "UPDATE registro_de_establecimiento SET Nombres_de_categorias=?, Nombre_del_establecimiento=?, Direccion_de_establecimiento=?, Telefono=?, Informacion_adicional=?, Nit=?, localidad=?, id_tipo_de_establecimiento=? WHERE Id_registro=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssssi", $nombreCategoria, $nombreEstablecimiento, $direccion, $telefono, $informacionAdicional, $nit, $localidad, $tipoEstablecimiento, $establecimientoId);

    if ($stmt->execute()) {
        // Establecimiento actualizado con éxito, puedes redirigir a una página de éxito o mostrar un mensaje aquí.
        echo '<div class="alert alert-success" role="alert">
        Establecimiento registrado de forma exitosa
        </div>';
    } else {
        // Error al actualizar el establecimiento, muestra un mensaje de error.
        echo "Error al actualizar el establecimiento: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Establecimiento</title>
    <!-- Agrega los enlaces a las bibliotecas de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./estilos/HeaderFooter.css">
    <link rel="stylesheet" type="text/css" href="./estilos/inicio.css">
</head>

<body>
    <div class="wrapper">
        <nav id="custom-navbar" class="navbar navbar-expand-lg navbar-light navbar-dark-bg">
            <div class="container-fluid" id="header">
                <a class="navbar-brand Logo" href="./index.php"><img src="./Imagenes/Logo.png" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link rojo" id="mapa" href="./mapa.php">Mapa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link amarillo" id="calendario" href="./calendario.php">Calendario</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '<li class="nav-item">
                            <a class="nav-link amarillo" id="calendario" href="./reg_establecimiento.php">registra tu establecimiento</a>
                            </li>';
                        } else {
                            echo '';
                        }
                        include('modales_usuario.php');
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Establecimiento</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="nombre_categoria">Nombre de Categoría:</label>
                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="<?php echo $row['Nombres_de_categorias']; ?>">
            </div>
            <div class="form-group">
                <label for="nombre_establecimiento">Nombre del Establecimiento:</label>
                <input type="text" class="form-control" id="nombre_establecimiento" name="nombre_establecimiento" value="<?php echo $row['Nombre_del_establecimiento']; ?>">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['Direccion_de_establecimiento']; ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['Telefono']; ?>">
            </div>
            <div class="form-group">
                <label for="informacion_adicional">Información Adicional:</label>
                <textarea class="form-control" id="informacion_adicional" name="informacion_adicional"><?php echo $row['Informacion_adicional']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="nit">NIT:</label>
                <input type="text" class="form-control" id="nit" name="nit" value="<?php echo $row['Nit']; ?>">
            </div>
            <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $row['localidad']; ?>">
            </div>
            <div class="form-group">
                <label for="tipo_establecimiento">Tipo de Establecimiento:</label>
                <input type="text" class="form-control" id="tipo_establecimiento" name="tipo_establecimiento" value="<?php echo $row['id_tipo_de_establecimiento']; ?>">
            </div>
            <button type="submit" name="editar_establecimiento" class="btn btn-primary">Guardar Cambios</button>
        </form>
        <a class="btn btn-secondary mt-3" href="mis_registros.php">Volver a Mis Registros</a>
    </div>
    <br><br><br><br><br><br><br>
        <?php
        include('modales_footer.php');
        ?>
        <footer class="footer">
            <nav>
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de
                            privacidad</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y
                            condiciones</a></li>
                    <li><a href="#">Contacto</a></li>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '';
                    } else {
                        echo '<li><a data-toggle="modal" data-target="#myModal" href="#">deseas registrar tu establecimiento</a></li>';
                    }
                    ?>

                </ul>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                Debes estar logeado/Registrado para utilizar este servicio.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <p>© 2023 MyBog. Todos los derechos reservados.</p>
            </nav>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
    <script src="./Funcionamiento_por_js/search_index.js"></script>
    
</body>
</html>
