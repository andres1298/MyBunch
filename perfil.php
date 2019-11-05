<!DOCTYPE HTML>
<html>
    <?php
        include("SQL/selectdata.php");
        $cedulaUsuario = json_decode(file_get_contents('SQL/txt/cedula.txt'));
    ?>
    
    
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Perfil - MyBunch</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="MyBunch Final Project 2018" />
	<meta name="keywords" content="Pharmacy, Drugstore" />
	<meta name="author" content="Andrés Bonilla" />

	<!-- 
	-----------------------------------------------

    My Bunch, Proyecto de Graduación de Sexto 2018 

	------------------------------------------------
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

    <link rel="icon" href="images/chocolatebaricon.ico">
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
		
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li ><a href="carrito.php">Carrito</a></li>
							<li class="active"><a href="perfil.php">Perfil</a></li>
                            <li><a href="login.php">Cerrar Sesión</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

        <?php
            
            $profile = "SELECT nombreUsuario,primerApellido,nivel,puntosUsuario FROM Usuario, Nivel WHERE (cedulaUsuario = '$cedulaUsuario') AND (idnivel = nivel)";
            $ejecutarprofile = sqlsrv_query($con,$profile);
            $datosperfil = sqlsrv_fetch_array($ejecutarprofile);
            
            $nombre = $datosperfil['nombreUsuario'];
            $apellido = $datosperfil['primerApellido'];
            $nivel = $datosperfil['nivel'];
            $puntos = $datosperfil['puntosUsuario'];
            //$puntos = 650;
            
            if($puntos<40){
                 $xp = 40;
                $togo = 40-$puntos;
             }
             else if($puntos<150){
                  $xp = 150;
                 $togo = 150-$puntos;
             }
            else if($puntos<300){
                  $xp = 300;
                $togo = 300-$puntos;
             }
            else if($puntos<750){
                  $xp = 750;
                $togo = 750-$puntos;
             }
            else if($puntos<1500){
                  $xp = 1500;
                $togo = 1500-$puntos;
             }
            else if($puntos<2500){
                  $xp = 2500;
                $togo = 2500-$puntos;
             }
            else if($puntos>=2500){
                  $xp = 2500;
                  $togo = 0;
             }
            $porcentaje = ($puntos*100)/$xp;
        ?>
        
	<header>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2 style="font-size: 60px; font-family: Another Day in Paradise; text-transform: none"><?php echo $nombre; echo $apellido;?></h2>
				</div>
			</div>
            <div class="row"><div class="col-md-4 col-sm-4 animate-box"></div></div>
		</div>
        <div class="container text-center" style="margin-top: 25px; width: 65%;">
                <h2><?php echo $nivel;?> Buncher</h2>
                <h2 style="font-size: 25px; font-family:Walkway"><?php echo  $puntos;?>pts</h2>
            <div class="progress" style="height: 35px;">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $porcentaje;?>%;" aria-valuenow="<?php echo $porcentaje;?>" aria-valuemin="0" aria-valuemax="100"></div>
                
            </div>
            <small><?php echo $togo;?>pts para subir de Nivel!</small>
        </div> 
	</header>

	
	<div id="fh5co-trainer">
		
	</div>
           <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////
                        $sale = "SELECT descuento,nivel from Usuario,Nivel WHERE (idnivel = nivel) AND (cedulaUsuario = '$cedulaUsuario')";
                        $ejecutarsale = sqlsrv_query($con, $sale);
                        $filasale = sqlsrv_fetch_array($ejecutarsale);
                        $nivelusuario = $filasale ['nivel'];
                        $descuento = $filasale ['descuento'];
        
            ?>
        
        <div id="fh5co-started" class="fh5co-bg" style="background-image: url(images/img_bg_3.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h2><span>Sólo porque eres un Buncher <?php echo $nivelusuario?></span><br>Adquiere todos tus Bunchs<br> <span> Con un <span class="percent"><?php echo $descuento?>%</span> de Descuento</span></h2>
				</div>
			</div>
		</div>
	</div>


	<footer id="fh5co-footer" class="fh5co-bg" style="background-image: url(images/img_bg_1.jpg);" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>Un poco de MyBunch.</h3>
					<p>El proyecto nació debido a la búsqueda de un giro completo a las farmacias convencionales, donde se pueda tratar a las enfermedades desde todos los ángulos posibles, generando un bienestar en las tres áreas fundamentales, mental, físico y social</p>
					<p><a class="btn btn-primary" href="#">Volver Arriba :)</a></p>
				</div>
				<div class="col-md-8">
					<h3>Algunos de nuestros productos</h3>
					<div class="col-md-4 col-sm-4 col-xs-6">
						<ul class="fh5co-footer-links">
							<li>Pastillas</li>
							<li>Jarabes</li>
                            <li>Antialérgicos</li>
							<li>Antibióticos</li>
							<li>Antiinflamatorios</li>
                        </ul>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6">
						<ul class="fh5co-footer-links">
							<li>Cremas</li>
							<li>Jabones</li>
							<li>Bloqueadores</li>
                            <li>Preservativos</li>
							<li>Bronceadores</li>
							
						</ul>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6">
						<ul class="fh5co-footer-links">
                            <li>Pañales</li>
							<li>Toallas Femeninas</li>
                            <li>Pañuelos</li>
                            <li>Multivitamínicos</li>
                            <li>Alimentos</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; Creado por: Andrés Bonilla Agüero</small> 
						<small class="block">Proyecto de Graduación Desarrollo de Software 2018</small>
					</p>
					
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

