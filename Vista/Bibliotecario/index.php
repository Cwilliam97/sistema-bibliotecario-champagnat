<?php
session_start();
extract($_REQUEST);

if (!isset($_GET['pag']))
    $pag = "section";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio | Bibliotecario</title>

        <link rel="stylesheet" href="../../Css/VistaBibliotecario/index.css">
        <link rel="stylesheet" href="../../Css/VistaBibliotecario/informacion.css">
        <link rel="stylesheet" href="../../Css/VistaBibliotecario/menu.css">
        <link rel="stylesheet" href="../../Css/VistaBibliotecario/funcionesVista.css">
        <link rel="stylesheet" href="../../Css/VistaBibliotecario/paginaInicio.css"> 
        <link rel="stylesheet" href="../../Css/VistaBibliotecario/banner.css">
        <script src="../../Recursos/JavaScript/PaginaPrincipal/jquery/jquery-ui.min.js"></script>
        <script src="Javascript/ValidacionCamposLibro.js" type="text/javascript"></script>
        
        <!--<script src="Javascript/buscarLibro.js"></script>-->

    </head>
    <body>

        <!--Navegador-->
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>

                <li class="drop">
                    <a class="a-nav" href="#">Libros</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>
                            <ul>
                                <li><a href="?pag=frmCrearLibro">Agregar</a></li>
                                <li><a href="?pag=frmListarLibros2">Listar</a></li>
                                <!--<li><a href="?pag=frmBuscarLibro">Buscar</a></li>-->
                                <!--<li><a href="#">Actualizar</a></li>-->
                            </ul>
                        </div>
                    </div>

                </li>
                <li class="drop">
                    <a class="a-nav" href="#">Material Didactico</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>
                            <ul>
                                <li><a href="?pag=frmCrearMaterial">Agregar</a></li>
                                <li><a href="?pag=frmListarMaterialDidactico">Listar</a></li>
                                <!--<li><a href="?pag=frmBuscarMaterial">Buscar</a></li>-->
                                <!--<li><a href="#">Actualizar</a></li>-->
                            </ul>
                        </div>
                    </div>

                </li>

                <li class="drop">
                    <a class="a-nav" href="#">Bibliotecario</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>

                            <ul>
                                <!--<li><a href="#">Agregar</a></li>-->
                                <li><a href="?pag=frmActualizarMisDatos">Actualizar</a></li>
<!--                                <li><a href="#">Desactivar</a></li>
                                <li><a href="#">Listar</a></li>-->
                            </ul>

                        </div>
                    </div>

                </li>

                <li class="drop">
                    <a class="a-nav" href="#">Prestamos</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>     
                            <ul>
                                <li><a href="?pag=frmGestionPrestamo">Agregar</a></li>
                                <li><a href="#">Actualizar</a></li>
                                <li><a href="?pag=frmGestionListarPrestamo">Listar</a></li>
                            </ul>

                        </div>
                    </div>

                </li>
                <li class="drop">
                    <a class="a-nav" href="#">Devoluciones</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>

                            <ul>
                                <li><a href="#">Agregar</a></li>
                                <li><a href="#">Actualizar</a></li>
                                <li><a href="#">Listar</a></li>
                                <li><a href="#">Devolver</a></li>
                            </ul>

                        </div>
                    </div>

                </li>
                <li><a class="a-nav" href="../../salir.php">Salir</a></li>
            </ul>
        </nav>

        <!-------Informacion Usuario------->

        <div id="user"><?php echo "" . $_SESSION['usuario'] ?></div>
        <div id="foto">

            <img id="fotoPerfil" src="../../Recursos/Imagenes/subidas/<?php echo $_SESSION['foto'] . '.png' ?>">

        </div>


        <!--Contenido dinamico-->
        <div id="main">
            <section id="Section">
                <?php
                include $pag . ".php";
                ?> 
            </section>
        </div>


        <!--Bienvenidos-->

        <section aling="center" id="bienvenidos">
            <img src="../../Recursos/Imagenes/champagnat1.png">
        </section>

        <!--Informacion-->

        <section id="informacion">
            <h3 style="font-size: 17px;">CHAMPA LIBRARY, Te ofrece a ti como Bibliotecario poder
                crear Bibliotecarios, Estudiantes y Profesores</h3>


            <div class="contenedor-info">
                <div align="center" id="deaf-info-libro">  

                    <h4>Libros</h4>
                </div>
                <div align="center" id="deaf-info-prestamo">  

                    <h4>Prestamos</h4>
                </div>

                <div id="deaf-info-devolucion">               
                    <h4>Devoluciones</h4>
                </div>
            </div>

        </section>

        <!-- Footer-->
        <p class="authors"><a href="#">CHAMPA LIBRARY - DERECHOS RESERVADOS &COPY;</a></p>


    </body>
</html>

