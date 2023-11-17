<?php
include_once('config/conexion.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: main.php'); // Reemplaza 'main.php' con la página de inicio de sesión.
    exit;
}

$userId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['borrar_registro'])) {
    $registroId = $_POST['registro_id'];
    $sql = "DELETE FROM registro_de_establecimiento WHERE Id_registro = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $registroId);
    if ($stmt->execute()) {
        // Registro eliminado con éxito, puedes redirigir a una página de éxito o mostrar un mensaje aquí.
    } else {
        // Error al eliminar el registro, muestra un mensaje de error.
    }
}

$sql = "SELECT * FROM registro_de_establecimiento WHERE Id_Usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Registros de Establecimientos</title>
    <!-- Agrega los enlaces a las bibliotecas de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <link rel="stylesheet" type="text/css" href="style/mis_registros.css">

</head>

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
                include('./modales_usuario.php');
                ?>
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Mis Registros de Establecimientos</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de Categoría</th>
                    <th>Nombre del Establecimiento</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Información Adicional</th>
                    <th>NIT</th>
                    <th>Localidad</th>
                    <th>Tipo de Establecimiento</th>
                    <th>Acciones</th>
                    <!-- Agrega más encabezados de columnas según tus campos -->
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $row['Nombres_de_categorias']; ?>
                        </td>
                        <td>
                            <?php echo $row['Nombre_del_establecimiento']; ?>
                        </td>
                        <td>
                            <?php echo $row['Direccion_de_establecimiento']; ?>
                        </td>
                        <td>
                            <?php echo $row['Telefono']; ?>
                        </td>
                        <td>
                            <?php echo $row['Informacion_adicional']; ?>
                        </td>
                        <td>
                            <?php echo $row['Nit']; ?>
                        </td>
                        <td>
                            <?php echo $row['localidad']; ?>
                        </td>
                        <td>
                            <?php echo $row['id_tipo_de_establecimiento']; ?>
                        </td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="registro_id" value="<?php echo $row['Id_registro']; ?>">
                                <button type="submit" name="borrar_registro" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                        <td>
                        <a href="editar_establecimiento.php?id=<?php echo $row['Id_registro']; ?>"
                            class="btn btn-primary">Editar</a>
                        </td>
                        <!-- Agrega más celdas de datos según tus campos -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
        include('modales_footer.php');
        ?>
        <a class="btn btn-primary" href="index.php">Volver a la página principal</a>
        <!-- Agrega el enlace a tu página principal -->
    </div>

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
                        echo '<li><a data-toggle="modal" data-target="#myModal" href="#">Deseas registrar tu establecimiento</a></li>';
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

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
</body>

</html>