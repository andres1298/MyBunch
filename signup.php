<!DOCTYPE HTML>

<!--Se agrega la el archivo de conexión con la base de datos-->
<!--Se agrega la el archivo de conexión con la base de datos-->
<?php
include("SQL/insertdata.php");
?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crea tu Usuario - MyBunch</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="MyBunch Final Project 2018" />
	<meta name="keywords" content="Pharmacy, Drugstore" />
	<meta name="author" content="Andrés Bonilla" />

	<!-- 
	-----------------------------------------------

    My Bunch, Proyecto de Graduación de Sexto 2018 

	------------------------------------------------
	 -->
        <link rel="icon" href="images/dinosauricon.ico">

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
    <script src="js/validacion.js"></script>
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
					<div class="col-xs-12 text-right menu-1">
						<ul>
							<li><a href="nologgedindex.php">Inicio</a></li>
							<li ><a href="contacto.php">Contacto</a></li>
                            <li class="active"><a href="signup.php">Crear Cuenta</a></li>
                            <li><a href="login.php">Iniciar Sesión</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	
	
        <div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 animate-box"></div>
				    <div class="col-md-4 col-sm-4 animate-box">
					   
						<img class="img-responsive" style="height:125px; width:300px; margin-left:25px;" src="images/entrance.jpg" alt="trainer">
				    
                
				<div class="col-md-4 col-sm-4 animate-box"></div>
          
			</div>
            <div class="row"><div class="col-md-4 col-sm-4 animate-box"></div>
            </div>
		</div>
        
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3 style="font-family: Walkway; font-size: 25px;">Información de Contacto</h3>
						<ul>
							<li class="address">Alauelita, San José<br>Colegio Técnico Don Bosco</li>
							<li class="phone">+506 8615-1354</li>
							<li class="email">andres.bonilla1298@gmail.com</li>
							<li class="url">localhost:8080</li>
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3 style="font-family: Walkway; font-size: 30px;">Únete a <span style="font-family: Another Day in Paradise;  font-size: 55px;">MyBunch!</span></h3>
                    
					<form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
                        
						<div class="row form-group">
                            <!--NOMBRE DEL USUARIO-->
							<div class="col-md-4">
								<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="<?php if(isset($nombreUsuario)) echo $nombreUsuario ?>">
							</div>
                             <!--PRIMER APELLIDO -->
                            <div class="col-md-4">
								<input type="text" id="apellido1"  name="apellido1" class="form-control" placeholder="Apellido 1" value="<?php if(isset($primerApellido)) echo $primerApellido ?>" >
							</div>
                            <!--SEGUNDO APELLIDO -->
                           <div class="col-md-4">
								<input type="text" id="apellido2" name="apellido2" class="form-control" placeholder="Apellido 2" value="<?php if(isset($segundoApellido)) echo $segundoApellido ?>" >
							</div> 
						</div>
                        
                        <!-- CEDULA O PASAPORTE-->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="cedula" name="cedula" class="form-control" placeholder="Número de Cédula / #-####-####" maxlength="9" value="<?php if(isset($cedulaUsuario)) echo $cedulaUsuario ?>" >
							</div>
						</div>
                        
                        <!--CORREO ELECTRONICO -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="email" name="email" class="form-control" placeholder="Correo Electrónico" value="<?php if(isset($correoUsuario)) echo $correoUsuario ?>" >
							</div>
						</div>
                        
                        <!--NUMERO DE TELEFONO -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Número de Télefono / ####-####" maxlength="9" value="<?php if(isset($telefono)) echo $telefono ?>" >
							</div>
						</div>
                        
                          <!--DIRECCION DE USUARIO-->
                        <div class="row form-group">
							<div class="col-md-12">
								<textarea   id="direccion" name="direccion" cols="15" rows="4" class="form-control" placeholder="Dirección de Domicilio" value="<?php if(isset($direccion)) echo $direccion ?>" ></textarea>
							</div>
						</div>
                        
                        <!--CONTRASEÑA -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña"  >
							</div>
						</div>
                        
                        <!--CONFIRMACION DE CONTRASEÑA -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="password" id="password2" name="password2" class="form-control" placeholder="Confirme Contraseña"  >
							</div>
						</div>
                      
                        
                        <!--FOTO DE PERFIL 
                            <label for="subject">Foto de Perfil</label>
                            <div class="row form-group">
							<div class="col-md-12">
								<input type="file" name="foto" class="form-control">
							</div>
						    </div>-->
                        
						<div class="form-group">
							<input name="ingresaruser" type="submit" value="Ingresar Datos" class="btn btn-primary">
                       
                             <a style="margin-left:15px;" href="login.php">Ya tienes cuenta? Ingresa ya!</a>
				
						</div>
                        

					</form>		
				</div>
			</div>
			
		</div>
	</div>
	</div>
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

