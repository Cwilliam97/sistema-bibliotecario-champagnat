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
        <title>Inicio | Administrador</title>

        <link rel="stylesheet" href="../../Css/VistaAdministrador/index.css">
        <link rel="stylesheet" href="../../Css/VistaAdministrador/informacion.css">
        <link rel="stylesheet" href="../../Css/VistaAdministrador/menu.css">
        <link rel="stylesheet" href="../../Css/VistaAdministrador/funcionesVista.css">
        <link rel="stylesheet" href="../../Css/VistaAdministrador/paginaInicio.css"> 
        <link rel="stylesheet" href="../../Css/VistaAdministrador/banner.css">
        <script src="../../Recursos/JavaScript/PaginaPrincipal/jquery/jquery-ui.min.js"></script>
       
    </head>
    
    
    <body>

        <!--Navegador-->
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>

                <li class="drop">
                    <a class="a-nav" href="#">Administrador</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>
                            <ul>
                                <li><a href="?pag=frmCrearAdministrador">Agregar</a></li>
                                <li><a href="?pag=frmListarAdministrador">Listar</a></li>
                                <!--<li><a href="#">Buscar</a></li>-->
                                <li><a href="?pag=frmActualizarMisDatos">Mis Datos</a></li>
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
                                <li><a href="?pag=frmCrearBibliotecario">Agregar</a></li>
<!--                                <li><a href="#">Actualizar</a></li>
                                <li><a href="#">Desactivar</a></li>-->
                                <li><a href="?pag=frmListarBibliotecario">Listar</a></li>
                            </ul>

                        </div>
                    </div>

                </li>
                <li class="drop">
                    <a class="a-nav" href="#">Estudiantes</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>

                            <ul>
                            <li><a href="?pag=frmCrearEstudiante">Agregar</a></li>
<!--                                <li><a href="#">Actualizar</a></li>
                                <li><a href="#">Desactivar</a></li>-->
                                <li><a href="?pag=frmListarEstudiantes1">Listar</a></li>
                            </ul>

                        </div>
                    </div>

                </li>
                <li class="drop">
                    <a class="a-nav" href="#">Profesores</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>

                            <ul>
                            <li><a href="?pag=frmCrearProfesor">Agregar</a></li>
                                <li><a href="#">Actualizar</a></li>
                                <li><a href="#">Desactivar</a></li>
                                <li><a href="?pag=frmListarProfesor">Listar</a></li>
                            </ul>

                        </div>
                    </div>

                </li>
<!--                <li class="drop">
                    <a class="a-nav" href="#">Libros</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>

                            <ul>
                            <li><a href="#">Agregar</a></li>
                                <li><a href="#">Actualizar</a></li>
                                <li><a href="#">Desactivar</a></li>
                                <li><a href="#">Listar</a></li>
                            </ul>

                        </div>
                    </div>

                </li>-->

<!--                <li class="drop">
                    <a class="a-nav" href="#">Prestamo Libros</a>

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
                <li class="drop">
                    <a class="a-nav" href="#">Devolucion Libros</a>

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

                </li>-->
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
            <h3 style="font-size: 17px;">CHAMPA LIBRARY, Te ofrece a ti como Administrador poder
                crear Libros, Prestamos y Devoluciones</h3>


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
        <p class="authors"><a href="../../index.php">CHAMPA LIBRARY - DERECHOS RESERVADOS &COPY;</a></p>


    </body>
</html>
