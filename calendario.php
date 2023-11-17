<?php
require_once('./config/conexion.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBog</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style/HeaderFooter.css">
    <link rel="stylesheet" href="style/Calendario.css">
    <script src="./fullcalendar/lib/main.min.js"></script>
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '<style>
            .col-md-3 {
                display: block;
            }
    </style>';
    } else {
        echo '<style>
            .col-md-3 {
                display: none;
            }
    </style>';
    }

    ?>
</head>

<body>
    <div class="wrapper">
        <div class="content">
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


            <div class="container py-5" id="page-container">
                <div class="row">
                    <div class="col-md-9">
                        <div id="calendar"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="cardt rounded-0 shadow">
                            <div class="card-header bg-gradient bg-primary text-light ">
                                <h5 class="card-title">Crear Evento</h5>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <form action="save_schedule.php" method="post" id="schedule-form">
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group mb-2">
                                            <label for="title" class="control-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm rounded-0"
                                                name="title" id="title" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="description" class="control-label">Descripción</label>
                                            <textarea rows="3" class="form-control form-control-sm rounded-0"
                                                name="description" id="description" required></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="start_datetime" class="control-label">Inicio</label>
                                            <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                                name="start_datetime" id="start_datetime" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="end_datetime" class="control-label">Fin</label>
                                            <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                                name="end_datetime" id="end_datetime" required>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button class="btn btn-primary btn-sm rounded-0" type="submit"
                                        form="schedule-form"><i class="fa fa-save"></i> Guardar</button>
                                    <button class="btn btn-default border btn-sm rounded-0" type="reset"
                                        form="schedule-form"><i class="fa fa-reset"></i> Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Details Modal -->
            <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0">
                        <div class="modal-header rounded-0">
                            <h5 class="modal-title">Detalles de evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body rounded-0">
                            <div class="container-fluid">
                                <dl>
                                    <dt class="text-muted">Nombre</dt>
                                    <dd id="title" class="fw-bold fs-4"></dd>
                                    <dt class="text-muted">Descripción</dt>
                                    <dd id="description" class=""></dd>
                                    <dt class="text-muted">Inicio</dt>
                                    <dd id="start" class=""></dd>
                                    <dt class="text-muted">Fin</dt>
                                    <dd id="end" class=""></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="modal-footer rounded-0">
                            <div class="text-end">
                                <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit"
                                    data-id="">Editar</button>
                                <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete"
                                    data-id="">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include('modales_footer.php');
            ?>
            <br><br><br><br>
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

        <?php
        $schedules = $conexion->query("SELECT * FROM `schedule_list`");
        $sched_res = [];
        foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
            $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
            $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
            $sched_res[$row['id']] = $row;
        }
        ?>
        <?php
        if (isset($conexion))
            $conexion->close();
        ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./Funcionamiento_por_js/editar_usuario.js"></script>
<script src="./Funcionamiento_por_js/search_index.js"></script>
<script src="./js/es.js"></script> <!--Idioma español Fullcalendar-->
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>

</html>