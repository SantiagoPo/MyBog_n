<?php
$conexion = mysqli_connect("localhost", "root", "admin", "mybog");
if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['Email'])) {
        $user_email = $_SESSION['Email'];
        $sql = "SELECT Nombres FROM cuentas WHERE Email = '$user_email'";
    
        $result = mysqli_query($conexion, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if (isset($row['Nombres'])) {
                $_SESSION['Nombres'] = $row['Nombres']; // Asignar el nombre de usuario a la sesión
            } else {
                echo 'No se encontraron nombres en la base de datos.';
            }
        } else {
            echo 'Error en la consulta SQL: ' . mysqli_error($conexion); // Mostrar errores SQL para depurar
        }
    } else {
        echo 'La variable de sesión $_SESSION["Email"] no está configurada.';
    }
}

?>
