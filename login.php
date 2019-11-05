<!DOCTYPE HTML>
<?php
include("SQL/conexion_sql_server.php");
 file_put_contents('SQL/txt/estado.txt', json_encode(0));
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ingresar - MyBunch</title>
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
                            <li class="active"><a href="login.php">Inicio Sesión</a></li>
							<li><a href="nologgedindex.php">Ver Tienda</a></li>
							<li><a href="contacto.php">Contacto</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	
	
    <div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 animate-box"></div>
				    <div class="col-md-8 col-sm-4 animate-box">
                        
						<img class="img-responsive" style="height:125px; width:300px; margin-left:35px; margin-top:15px;" src="images/entrance.jpg">     
			         </div>
            </div>
        
	       <div id="fh5co-contact">
			<div class="row">
				<div class="col-md-3 col-md-push-1">
				</div>
				<div class="col-md-6 animate-box text-center">
					<h3 style="font-family: Walkway; font-size: 35px;">Ingresa a<span style="font-family: Another Day in Paradise;  font-size: 55px;"> MyBunch</span></h3>
					<form action="" method="POST">
      
                        
                        <!--CORREO ELECTRONICO -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" name="email" class="form-control" placeholder="Correo Electrónico">
							</div>
						</div>
                        
                        <!--CONTRASEÑA -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="password" name="password" class="form-control" placeholder="Contraseña">
							</div>
						</div>
                        
						<div class="form-group col-md-11 text-center" style="margin-top:15px;">
							<input type="submit" name="validar" value="Ingresar" class="btn btn-primary">
						</div>
                        
                        <div class="form-group col-md-11 text-center">
                             <a style="margin-left:15px;" href="signup.php">No tienes cuenta? Crea una!</a>
						</div>

					</form>		
				</div>
			</div>
		  </div>
	</div>
</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
        
        <?php
            
        if(isset($_POST['validar'])){
            $correo = $_POST['email'];
            $contrasena = $_POST['password'];
        
             $login = "SELECT cedulaUsuario,CONVERT(varchar(7),tipoUsuario) as tipoUsuario,correoUsuario FROM Usuario WHERE correoUsuario = '$correo' AND contrasena = '$contrasena'";
        
             $ejecutar = sqlsrv_query($con, $login);
            
            $filausers = sqlsrv_fetch_array($ejecutar);
            
             $cedulaUsuario = $filausers ['cedulaUsuario'];
             $correoUsuario = $filausers ['correoUsuario'];
             $tipoUsuario = $filausers ['tipoUsuario'];
             $estadoUsuario = 1;
            
            if($ejecutar){
                if($tipoUsuario == "usuario"){
                    file_put_contents('SQL/txt/cedula.txt', json_encode($cedulaUsuario));
                    file_put_contents('SQL/txt/estado.txt', json_encode(1));
                    header("Location: index.php");
                    die();
                }
                else
                if($tipoUsuario == "adminis"){
                file_put_contents('SQL/txt/cedula.txt', json_encode($cedulaUsuario));
                file_put_contents('SQL/txt/estado.txt', json_encode(2));
                  header("Location: indexadmin.php");
                    die();          
                }
                else{
                    echo "<script>alert('Datos Incorrectos')</script>";
                }
            }
        }
        
        ?>
	
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

