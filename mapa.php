<?php
require_once('./config/conexion.php');



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de Establecimiento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style/mapa.css" />
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
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
            <div class="modal fade" id="movedModal" tabindex="-1" aria-labelledby="movedModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="movedModalLabel">Selecciona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="searchInput" placeholder="Buscar">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mundo_aventura">
                                        <a href="./mouse/centros_comerciales.php">
                                            <figure>
                                                <img src="./Imagenes/modal/Centro-Comercial.gif" />
                                                <div class="capa">
                                                    <h3>Centros comerciales</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="parque">
                                        <a href="./informacion.php">
                                            <figure>
                                                <img src="./Imagenes/imagen de lugares/parque.jpeg" />
                                                <div class="capa">
                                                    <h3>parque</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="simon_bolivar">
                                        <a href="./mouse/hospedaje.php">
                                            <figure>
                                                <img src="./Imagenes/modal/Hotel.jpeg" />
                                                <div class="capa">
                                                    <h3>Hospedaje</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="estadio">
                                        <a href="./mouse/estadios.php">
                                            <figure>
                                                <img src="./Imagenes/imagen de lugares/campin.jpeg" />
                                                <div class="capa">
                                                    <h3>estadios</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="cine_colombia">
                                        <a href="./mouse/Discotecas.php">
                                            <figure>
                                                <img src="./Imagenes/modal/Discoteca.jpeg" />
                                                <div class="capa">
                                                    <h3>Discotecas</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid" id="contenido">
                <div class="titulo">
                    <h1>Localidades de Bogotá</h1>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Antonio_Narino">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Antonio_Nariño.jfif" />
                                    <div class="capa">
                                        <h3>Antonio Nariño</h3>
                                        <p>
                                            Antonio Nariño es conocida por ser un área culturalmente diversa y cuenta
                                            con una población multicultural.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Barrios_Unidos">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Barrios_Unidos.jfif" />
                                    <div class="capa">
                                        <h3>Barrios Unidos</h3>
                                        <p>
                                            La localidad de Barrios Unidos es una mezcla de áreas residenciales y
                                            comerciales
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Bosa">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Bosa.jpg" />
                                    <div class="capa">
                                        <h3>Bosa</h3>
                                        <p>
                                            Bosa cuenta con varios parques y espacios públicos donde los residentes
                                            pueden disfrutar de actividades al aire libre
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Candelaria">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Candelaria.jpg" />
                                    <div class="capa">
                                        <h3>Candelaria</h3>
                                        <p>
                                            Dada su riqueza histórica y cultural, la Candelaria es un destino turístico
                                            importante en Bogotá. Los visitantes pueden explorar sus museos.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Chapinero">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Chapinero.jpeg" />
                                    <div class="capa">
                                        <h3>Chapinero</h3>
                                        <p>
                                            Chapinero se encuentra en el norte de Bogotá y es una de las localidades más
                                            céntricas de la ciudad.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Ciudad_Bolivar">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Ciudad_Bolivar.jpeg" />
                                    <div class="capa">
                                        <h3>Ciudad Bolivar</h3>
                                        <p>
                                            Ciudad Bolívar es principalmente una zona residencial con una alta densidad
                                            de población.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Engativa">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Engativa.png" />
                                    <div class="capa">
                                        <h3>Engativa</h3>
                                        <p>
                                            La localidad cuenta con una amplia gama de opciones comerciales y de
                                            servicios.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Fontibon">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Fontibon.jpg" />
                                    <div class="capa">
                                        <h3>Fontibon</h3>
                                        <p>
                                            Fontibón tiene una rica herencia cultural y tradiciones arraigadas. Cuenta
                                            con festivales y eventos culturales
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Kennedy">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Kennedy.jpg" />
                                    <div class="capa">
                                        <h3>Kennedy</h3>
                                        <p>
                                            Kennedy es una localidad con un carácter residencial y comercial. Aquí
                                            encontrarás una gran variedad de viviendas,
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Los_Martires">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Los_Martires.jpg" />
                                    <div class="capa">
                                        <h3>Los Martires</h3>
                                        <p>
                                            La seguridad en Los Mártires ha mejorado en los últimos años, y se han
                                            implementado medidas para proteger a los residentes y visitantes en esta
                                            zona de alto tráfico.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Puente_Aranda">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Puente_Aranda.avif" />
                                    <div class="capa">
                                        <h3>Puente Aranda</h3>
                                        <p>
                                            Puente Aranda es un centro importante de comercio mayorista, donde se
                                            realizan transacciones comerciales
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Rafael_Uribe_Uribe">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Rafael_Uribe_Uribe.jfif" />
                                    <div class="capa">
                                        <h3>Rafael Uribe Uribe</h3>
                                        <p>
                                            La localidad está bien conectada con el sistema de transporte público de
                                            Bogotá, incluyendo buses
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="San_Cristobal">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/San_Cristobal.jpg" />
                                    <div class="capa">
                                        <h3>San Cristobal</h3>
                                        <p>
                                            La localidad alberga instituciones educativas que ofrecen desde educación
                                            preescolar hasta educación superior.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Santafe">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Santafe.jfif" />
                                    <div class="capa">
                                        <h3>Santa Fe</h3>
                                        <p>
                                            La localidad se caracteriza por su arquitectura colonial y neoclásica
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Suba">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Suba.jpg" />
                                    <div class="capa">
                                        <h3>Suba</h3>
                                        <p>
                                            Suba dispone de parques y espacios públicos donde los residentes pueden
                                            disfrutar de actividades al aire libre.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Sumapaz">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Sumapaz.jpg" />
                                    <div class="capa">
                                        <h3>Sumapaz</h3>
                                        <p>
                                            Sumapaz es la localidad más grande de Bogotá y una de las más extensas de
                                            Colombia.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Teusaquillo">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Teusaquillo.jpg" />
                                    <div class="capa">
                                        <h3>Teusaquillo</h3>
                                        <p>
                                            La localidad presenta una interesante mezcla de estilos arquitectónicos.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Tunjuelito">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Tunjuelito.jpg" />
                                    <div class="capa">
                                        <h3>Tunjuelito</h3>
                                        <p>
                                            A pesar de su tamaño reducido en comparación con otras localidades,
                                            Tunjuelito tiene una comunidad activa.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Usaquen">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Usaquen.jfif" />
                                    <div class="capa">
                                        <h3>Usaquen</h3>
                                        <p>
                                            Usaquén es famosa por su actividad comercial y gastronómica. Aquí
                                            encontrarás mercados.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Usme">
                            <button data-toggle="modal" data-target="#movedModal"
                                style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Usme.jpg" />
                                    <div class="capa">
                                        <h3>Usme</h3>
                                        <p>

                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="./Funcionamiento_por_js/localidades.js"></script>
    <script>
        const searchInput = document.getElementById("searchInput");
        const items = document.querySelectorAll(".mundo_aventura, .parque, .simon_bolivar, .estadio, .cine_colombia, .el_corral");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase();

            items.forEach(item => {
                const title = item.querySelector("h3").textContent.toLowerCase();
                const itemText = item.textContent.toLowerCase();

                if (title.includes(searchTerm) || itemText.includes(searchTerm)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    </script>
    <script>





</body >

</html >