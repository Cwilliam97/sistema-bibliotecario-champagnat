
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Champagnat</title>

        <!-- Jquery -->
        <link rel="stylesheet" href="Recursos/JavaScript/PaginaPrincipal/jquery/jquery-ui.css">
        <script src="Recursos/JavaScript/PaginaPrincipal/jquery/jquery-ui.js"></script>
        <script src="Recursos/JavaScript/PaginaPrincipal/jquery/external/jquery/jquery.js"></script>
        <script type="text/javascript" src="Recursos/JavaScript/PaginaPrincipal/jquery-1.7.1.min.js"></script>
        <!--<script src="Vista/Bibliotecario/Javascript/ValidacionCamposLibro.js"></script>-->


        <!-- Stylesheets --> 
        <link rel="stylesheet" href="Css/PaginaInicio/menu.css">
        <link rel="stylesheet" href="Css/PaginaInicio/inicioSesion.css">
        <link rel="stylesheet" href="Css/PaginaInicio/tablasPaginaPrincipal.css">
        <link rel="stylesheet" href="Css/PaginaInicio/index.css">
        <link rel="stylesheet" href="Css/PaginaInicio/ventanaEmergente/ventanaRespuestaAdmin.css">

    </head>
    <body>

        <!-- Slider Container -->

        <section class="slider-container">
            <ul id="slider" class="slider-wrapper">

                <!-- Container Header -->
                <header class="container-header">

                    <!--Logo-->
                    <div class="logo1"></div>
                    <div class="logo2"></div>

                    <div class="container-botones">
                        <div class="btn-ingresar"><a class="a-btn" id="comenzar" href="#">Comenzar</a>
                            <div class="opcion">     
                            </div>

                        </div>
                        <div class="btn-registrar"><a class="a-btn" id="registrar" href="#">Registrarse</a></div>
                    </div>

                </header>

                <li class="slide-current">
                    <img src="Recursos/Imagenes/champagnat.jpg" alt="Imagen 1">
                    <div class="caption">
                        <h3 class="caption-title">Sordos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, ea.</p>
                    </div>
                </li>

                <li>
                    <img src="Recursos/Imagenes/champagnat4.jpg" alt="Imagen 2">
                    <div class="caption">
                        <h3 class="caption-title">Sordos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, ea.</p>
                    </div>
                </li>

                <li>
                    <img src="Recursos/Imagenes/champagnat3.jpg" alt="Imagen 3">
                    <div class="caption">
                        <h3 class="caption-title">Sordos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, ea.</p>
                    </div>
                </li>

                <li>
                    <img src="Recursos/Imagenes/champagnat4.jpg" alt="Imagen 4">
                    <div class="caption">
                        <h3 class="caption-title">Sordos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, ea.</p>
                    </div>
                </li>
            </ul>

            <!--Menu desplegable-->

            <div class="header-menu">
                <input type="checkbox" id="btn-menu">
                <label for="btn-menu"><img src="Recursos/Imagenes/icon-menu.png" width="20" height="20"alt=""></label>

                <nav class="menu">
                    <ul class="menu-ul">

                        <li class="menu-li"><a href="">¿Quienes Somos?</a>

                            <ul class="menu-ul-submenu">
                                <li class="menu-li-submenu" id="mision"><a class="a-submenu" href="#">Misión</a></li>
                                <li class="menu-li-submenu" id="vision"><a class="a-submenu" href="#">Visión</a></li>
                                <li class="menu-li-submenu" id="objetivos"><a class="a-submenu" href="#">Objetivos</a></li>  
                            </ul>
                        </li>
                        <li class="menu-li" id="introduccion"><a href="#">Introducción</a></li>
                        <li class="menu-li"><a href="#">Ayuda</a>
                            <ul class="menu-ul-submenu-2">
                                <li class="menu-li-submenu-2" id="interpretaciones"><a class="a-submenu" href="#">Interpretaciones</a></li>
                                <li class="menu-li-submenu-2" id="activeKeyboard"><a class="a-submenu" href="#">Activar teclado</a></li>    
                            </ul>
                        </li>   
                    </ul>
                </nav>
            </div>

            <!-- Controles -->
            <ul id="slider-controls" class="slider-controls"></ul>

            <!-- Autores de las Imagenes-->
            <p class="authors"><a href="#">CHAMPA LIBRARY DERECHOS RESERVADOS &COPY;</a></p>




            <!--Pantalla Modal Boton Comenzar-->
            <div id="tablaComenzar">
                <div id="tablaDinamica">
                    <div id="cerrarComenzar">x</div>

                    <form action="Control/controladorInicioSesion.php" method="post" class="form_register">
                        <h2 id="title-creacuenta">INICIAR SESION</h2>
                        <div class="container-input-register">
                            <input type="text" name="login" id="username" placeholder="Tu Login" class="input-100" autocomplete="off">
                            <input type="password" name="password" id="password" placeholder="Tu contraseña" class="input-100">			

                            <input type="submit" value="Comenzar" class="btn-enviar">
                            <p class="form-link">¿No tiene una cuenta? <a  href="index.php">Ingresa aqui</a></p>
                            <p class="form-link"> <a  href="RecuperarClave.php">Recuperar clave</a></p>
                        </div>
                        <input type="hidden" name="opcion" value="1">
                    </form>

                    <br>
                    <div id="data">

                    </div>

                </div>
            </div>

        </section>

        <!-- Scripts -->

        <!--<script src="Recursos/JavaScript/JSPaginaPrincipal/jquery.min.js"></script>-->
        <script src="Recursos/JavaScript/PaginaPrincipal/slider.js"></script>
        <script src="Recursos/JavaScript/PaginaPrincipal/Modal.js"></script>
        <script type="text/javascript" src="Recursos/JavaScript/PaginaPrincipal/ventanaRespuesta.js"></script>
    </body>
    
</html>

<?php
if (@$x==1) {
    echo '<div class="overlay-container">
		
		<div class="window-container zoomout">
			<h3>Mensaje ChampaLibrary </h3> 
			Ingrese un Usuario, Contraseña validos<br/>
			<br/>
                        <br>
			<span class="close">Cerrar</span>
		</div>
	</div>';
}

?>
