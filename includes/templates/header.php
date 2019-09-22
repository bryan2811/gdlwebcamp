<?php
    // Definir un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    // Definir archivo para cachear (puede ser .php también)
	$archivoCache = 'cache/'.$pagina.'.php';
	// Cuanto tiempo deberá estar este archivo almacenado
	$tiempo = 36000;
	// Checar que el archivo exista, el tiempo sea el adecuado y muestralo
	if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
   	include($archivoCache);
    	exit;
	}
	// Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
	ob_start();
?>


<!doctype html>
    <html class="no-js" lang="">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Bryan Silva">

      <link rel="manifest" href="site.webmanifest">
      <link rel="apple-touch-icon" href="icon.png">
      <!-- Place favicon.ico in the root directory -->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
      <link rel="stylesheet" href="css/all.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" />
      
      <?php 
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        if($pagina == 'invitados' || $pagina == 'index') {
          echo '<link rel="stylesheet" href="css/colorbox.css">';
        } else if($pagina == 'conferencia') {
          echo '<link rel="stylesheet" href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css" />">';
        }
      ?>
      
      <link rel="stylesheet" href="css/main.css">
      
    </head>

    <body class="<?php echo $pagina; ?>">
      <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

    <header class="site-header">
      <div class="hero">
        <div class="contenido-header">
          <nav class="redes-sociales">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </nav>
          <div class="informacion-evento">
            <div class="clearfix">
                <p class="fecha"><i class="fas fa-calendar-alt"></i> 10-12 Dic</p>
                <p class="ciudad"><i class="fas fa-map-marker-alt"></i> CARACAS, VE</p>
            </div>
            <h1 class="nombre-sitio">GdlWebCamp</h1>
            <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
          </div><!--.informacion-evento-->
        </div><!--.contenido-header-->
      </div><!--.hero-->

    </header>

    <div class="barra">
      <div class="contenedor clearfix">
        <div class="logo">
            <a href="index.php">
            <img src="img/logo.svg" alt="logo">
            </a>
        </div><!--.logo-->
        <div class="menu-movil">
          <span></span>
          <span></span>
          <span></span>
        </div><!--.menu-movil-->
        <nav class="navegacion-principal clearfix">
          <a href="conferencia.php">Conferencia</a>
          <a href="calendario.php">Calendario</a>
          <a href="invitados.php">Invitados</a>
          <a href="registro.php">Reservaciones</a>
        </nav>
      </div><!--.contenedor-->
    </div><!--.barra-->