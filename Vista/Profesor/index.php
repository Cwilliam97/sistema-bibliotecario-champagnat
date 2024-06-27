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
        <title>Inicio | Profesor</title>

        <link rel="stylesheet" href="../../Css/VistaProfesor/index.css">
        <link rel="stylesheet" href="../../Css/VistaProfesor/informacion.css">
        <link rel="stylesheet" href="../../Css/VistaProfesor/menu.css">
        <link rel="stylesheet" href="../../Css/VistaProfesor/funcionesVista.css">
        <link rel="stylesheet" href="../../Css/VistaProfesor/paginaInicio.css"> 
        <link rel="stylesheet" href="../../Css/VistaProfesor/banner.css">
        <script src="../../Recursos/JavaScript/PaginaPrincipal/jquery/jquery-ui.min.js"></script>
       
    </head>
    
    
    <body>

        <!--Navegador-->
       <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>

                <li class="drop">
                    <a class="a-nav" href="#">Prestamos</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>

                            <ul>
                                <li><a href="?pag=frmVerificarPrestamoLibro">Listar Libros Prestados</a></li>
                                <li><a href="?pag=frmVerificarPrestamoMaterial">Listar Material Didactico Prestados</a></li>
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
                                <li><a href="?pag=frmVerificarDevolucionLibro">Listar devoluciones Libros</a></li>
                                <li><a href="?pag=frmVerificarDevolucionMaterial">Listar devoluciones Material Didactico</a></li>
                            </ul>

                        </div>
                    </div>

                </li>
                
                <li class="drop">
                    <a class="a-nav" href="#">Libros</a>

                    <div class="dropdownContain">
                        <div class="dropOut">
                            <div class="triangle"></div>

                            <ul>
                           
                                <li><a href="?pag=frmListarLibrosDisponibles">Verificar Libros Disponibles</a></li>
                               
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
                                <li><a href="?pag=frmListarMaterialDisponible">Verificar Material Didactico</a></li>
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
            <h3 style="font-size: 17px;">CHAMPA LIBRARY, Te ofrece a ti como Profesor poder
                verificar Prestamos,Devoluciones o Buscar libros, Material didactico disponible</h3>


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
