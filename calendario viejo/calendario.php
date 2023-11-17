<?php
include_once('config/conexion.php');

if (!isset($_SESSION['user_id'])) {
    // Mostrar el modal
    echo '<script>
            $(document).ready(function() {
                $("#myModal").modal("show");
            });
          </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./estilos/calendario.css">
    <link rel="stylesheet" href="./estilos/HeaderFooter.css">
    <title>MyBog</title>
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
                            
                            include ('modales_usuario.php');
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="container">
                <div class="calendar-container">
                    <div class="calendar">
                        <div class="calendar__info">
                            <div class="calendar__prev" id="prev-month">&#9664;</div>
                            <div class="calendar__month" id="month"></div>
                            <div class="calendar__year" id="year"></div>
                            <div class="calendar__next" id="next-month">&#9654;</div>
                        </div>
                        <br>
                        <div class="calendar__week">
                            <div class="calendar__day calendar__item">Lunes</div>
                            <div class="calendar__day calendar__item">Martes</div>
                            <div class="calendar__day calendar__item">MIercoles</div>
                            <div class="calendar__day calendar__item">Jueves</div>
                            <div class="calendar__day calendar__item">Viernes</div>
                            <div class="calendar__day calendar__item">Sabado</div>
                            <div class="calendar__day calendar__item">Domingo</div>
                        </div>
                        <div class="calendar__dates" id="dates"></div>
                    </div>
                </div>

            
                <div class="content-container">
                    <div class="content">
                        <div class="actividades-del-dia">
                            <img class="comercial" src="./Imagenes/musical.jpg" alt="">
                            <span>Actividades del día</span>
                            <hr>
                            <label class="actividadcen">Queen inmersivo</label>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto labore eius possimus quam
                                sed,
                                quas eveniet
                                et, provident vitae ullam ea?.</p>
                        </div>
                        <div class="comercial">
                            <a href="./evento.php">Más información</a>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal de Política de Privacidad -->
            <div class="modal fade" id="modalPoliticaPrivacidad" tabindex="-1" role="dialog"
                aria-labelledby="modalPoliticaPrivacidadLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalPoliticaPrivacidadLabel">Política de Privacidad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Política de Privacidad de MyBog</h4>
                            <p>
                                En MyBog, valoramos y respetamos tu privacidad. Esta política de privacidad describe
                                cómo
                                recopilamos, utilizamos y protegemos tu información personal cuando utilizas nuestro
                                servicio.
                            </p>
                            <p>
                                <strong>Información Personal:</strong> Recopilamos información personal como tu nombre y
                                dirección de correo electrónico cuando te registras en MyBog.
                            </p>
                            <p>
                                <strong>Uso de la Información:</strong> Utilizamos tu información personal para
                                proporcionarte un mejor servicio y personalizar tu experiencia en MyBog.
                            </p>
                            <p>
                                <strong>Seguridad:</strong> Protegemos tu información personal y no la compartimos con
                                terceros sin tu consentimiento.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de Términos y Condiciones -->
            <div class="modal fade" id="modalTerminosCondiciones" tabindex="-1" role="dialog"
                aria-labelledby="modalTerminosCondicionesLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTerminosCondicionesLabel">Términos y Condiciones</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Términos y Condiciones de MyBog</h4>
                            <p>
                                Al utilizar el servicio de MyBog, aceptas cumplir con nuestros términos y condiciones.
                                Por
                                favor, léelos cuidadosamente antes de usar nuestro servicio.
                            </p>
                            <p>
                                <strong>Uso del Servicio:</strong> Está prohibido el uso inapropiado o ilegal de nuestro
                                servicio. No toleramos el spam ni la conducta abusiva.
                            </p>
                            <p>
                                <strong>Contenido del Usuario:</strong> Al publicar contenido en MyBog, garantizas que
                                tienes los derechos necesarios sobre ese contenido.
                            </p>
                            <p>
                                <strong>Cancelación de Cuenta:</strong> Puedes cancelar tu cuenta en cualquier momento
                                si ya
                                no deseas utilizar nuestro servicio.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
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
        <script src="./Funcionamiento_por_js/scripts_calendar.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./Funcionamiento_por_js/Funcionamiento.js"></script>
        <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
         <script>
            const selectDay = (dayElement) => {
                if (selectedDay) {
                    selectedDay.classList.remove('calendar__date--selected');
                }
                selectedDay = dayElement;
                selectedDay.classList.add('calendar__date--selected');

                // Obtener el número de día seleccionado
                const selectedDate = parseInt(dayElement.textContent);

                // Obtener el div de información del día
                const dayInfoDiv = document.getElementById('day-info');

                // Crear y establecer el contenido del div de información del día
                const dayInfoContent = `Información del día ${selectedDate}`;
                dayInfoDiv.innerHTML = dayInfoContent;
            };
        </script>
        <script>
            document.getElementById('logout-form').addEventListener('submit', function (event) {
                event.preventDefault();
                $('#confirmLogoutModal').modal('show');
            });

            document.getElementById('confirm-logout-btn').addEventListener('click', function (event) {
                document.getElementById('logout-form').submit();
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#myModal").modal("show");
            });
        </script>

</body>



</html>