<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
include_once('../config/conexion.php');

if (!isset($_SESSION['id_usuario'])) {
    header('Location: ./main.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera los datos enviados por POST
    $nuevoNombre = $_POST['nuevoNombre'];
    $nuevoApellido = $_POST['nuevoApellido'];
    $nuevoCorreo = $_POST['nuevoCorreo'];
    $userId = $_SESSION['user_id'];

    // Realiza una consulta SQL para verificar si el nuevo correo ya existe en la base de datos
    $stmtVerificarCorreo = $conexion->prepare("SELECT id_usuario FROM cuentas WHERE email = ? AND id_usuario != ?");
    $stmtVerificarCorreo->bind_param('si', $nuevoCorreo, $userId);
    $stmtVerificarCorreo->execute();
    $stmtVerificarCorreo->store_result();

    if ($stmtVerificarCorreo->num_rows > 0) {
        // El nuevo correo ya existe en la base de datos, por lo que no se permite la actualización
        echo '<div class="alert alert-danger" role="alert">
                El email ya existe. Inténtalo de nuevo.
              </div>';
        echo '<script> setTimeout(function(){ window.location.href = "../main.php"; }, 2000); </script>';
    } else {
        // El nuevo correo no existe, por lo que se puede realizar la actualización
        $stmtVerificarCorreo->close();

        // Realiza una consulta SQL para actualizar los datos en la base de datos
        $stmtActualizar = $conexion->prepare("UPDATE cuentas SET nombres = ?, apellidos = ?, email = ? WHERE id_usuario = ?");
        $stmtActualizar->bind_param('sssi', $nuevoNombre, $nuevoApellido, $nuevoCorreo, $userId);

        if ($stmtActualizar->execute()) {
            // Actualización exitosa
            echo '<div class="alert alert-success" role="alert">
                Actualizacion realizada correctamente
              </div>';
            echo '<script> setTimeout(function(){ window.location.href = "../main.php"; }, 2000); </script>';
            session_destroy();
        } else {
            // Error en la actualización
            echo '<div class="alert alert-danger" role="alert">
                Error en la actualizacion
              </div>';
            echo '<script> setTimeout(function(){ window.location.href = "../main.php"; }, 2000); </script>';
        }

        // Cierra la conexión
        $stmtActualizar->close();
    }
} else {
    // Redirige si no es una solicitud POST válida
    header('Location: main.php');
    exit;
}
?>
