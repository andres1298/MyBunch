<!DOCTYPE HTML>

<!--Se agrega la el archivo de conexión con la base de datos-->
<?php
include("SQL/insertdata.php");
$cedulaUsuario = json_decode(file_get_contents('SQL/txt/cedula.txt'));
$estado = json_decode(file_get_contents('SQL/txt/estado.txt'));
       if(!($estado== 2)){
        echo "<script>alert('Primero debes iniciar sesión!'); location.href = 'login.php'; </script>"; 
    }
?>



<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nuevos Productos - MyBunch</title>
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
							<li><a href="indexadmin.php">Inicio</a></li>
                            <li class="active"><a href="newitemsform.php">Formulario Administrador</a></li>
                            <li><a href="controlpanel.php">Panel de Control</a></li>
                            <li><a href="login.php">Cerrar Sesión</a></li>
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
					   
				<img class="img-responsive" style="height:125px; width:300px; margin-left:25px; margin-top:40px;" src="images/entrance.jpg" alt="trainer">

				    
                
				<div class="col-md-4 col-sm-4 animate-box"></div>
          
			</div>
            <div class="row"><div class="col-md-4 col-sm-4 animate-box"></div>
            </div>
		</div>
        
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
                
                <!--FORM NUEVO BUNCH-->
				<div class="col-md-6 animate-box text-center">
					<h3 style="font-family: Walkway; font-size: 30px;">Agregar nuevo <span style="font-family: Another Day in Paradise;  font-size: 55px;">Bunch</span></h3>
                    
					<form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                        <!-- NOMBRE DEL BUNCH-->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" name="nombrebunch" class="form-control" placeholder="Nombre del Bunch" maxlength="15">
							</div>
						</div>
                        
                        <!--PRECIO DEL BUNCH-->
                        <div class="row form-group">
							<div class="col-md-12">
                                <select name="precio" class="form-control">
                                     <option selected disabled>Precio del Bunch</option>
                                     <option value="$10">$10</option>
                                     <option value="$20">$20</option>
                                     <option value="$30">$30</option>
                                     <option value="$40">$40</option>
                                     <option value="$50">$50</option>
                                </select>
                            </div>
                        </div>
                        
                      <!-- Tipo del Producto-->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="padecimiento" class="form-control">
                                     <option selected disabled>Padecimiento...</option>
                                     <option value="1">Gripe</option>
                                     <option value="2">Asma</option>
                                     <option value="3">Dolor de Cabeza</option>
                                     <option value="4">Golpes</option>
                                     <option value="5">Gastritis</option>
                                     <option value="6">Periódo</option>
                                     <option value="7">Otros</option>
                                </select>
							</div>
						</div>
              
                        <label style="margin-top:30px;" for="message">Seleccione los productos del Bunch</label>
                        <!--PRODUCTOS = MEDICINAS -->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="medicina" class="form-control">
                                     <option selected disabled>Medicina...</option>
                                
                                <?php
                                //CONSULTA PARA TRAER LOS PRODUCTOS 'MEDICINAS'

                                $consultap = "SELECT nombreProducto, tipo,idProducto FROM Producto, TipoProducto WHERE (idtipo = idTipoProducto) AND (idtipo = 1)";
                                $ejercutarp = sqlsrv_query($con, $consultap);
                                    $imed = 0;
                                     while($filap = sqlsrv_fetch_array($ejercutarp)){
                                         $nombreproducto = $filap ['nombreProducto'];
                                         $idproducto = $filap ['idProducto'];
                                         $imed = $imed+1;
                                        ?>
                                    <option value="<?php echo $idproducto;?>"><?php echo $nombreproducto;?></option>
                                    
                                    <!--Cierre del ciclo PHP-->
                                     <?php } ?>  
                                    
                                </select>
							</div>
						</div>
                        
                        <!--PRODUCTOS = MEDICINAS ADICIONALES -->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="medicinaadicional" class="form-control">
                                     <option selected disabled>Medicina Adicional...</option>
                                
                                <?php
                                //CONSULTA PARA TRAER LOS PRODUCTOS 'MEDICINAS ADICIONAL'

                                $consultap = "SELECT nombreProducto, tipo,idProducto FROM Producto, TipoProducto WHERE (idtipo = idTipoProducto) AND (idtipo = 2)";
                                $ejercutarp = sqlsrv_query($con, $consultap);
                                    $imed = 0;
                                     while($filap = sqlsrv_fetch_array($ejercutarp)){
                                         $nombreproducto = $filap ['nombreProducto'];
                                         $idproducto = $filap ['idProducto'];
                                         $imed = $imed+1;
                                        ?>
                                    <option value="<?php echo $idproducto;?>"><?php echo $nombreproducto;?></option>
                                    
                                    <!--Cierre del ciclo PHP-->
                                     <?php } ?>  
                                    
                                </select>
							</div>
						</div>
                        
                         <!--PRODUCTOS = ALIMENTOS -->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="alimento" class="form-control">
                                     <option selected disabled>Alimento...</option>
                                
                                <?php
                                //CONSULTA PARA TRAER LOS PRODUCTOS 'ALIMENTOS'

                                $consultap = "SELECT nombreProducto, tipo,idProducto FROM Producto, TipoProducto WHERE (idtipo = idTipoProducto) AND (idtipo = 3)";
                                $ejercutarp = sqlsrv_query($con, $consultap);
                                    $imed = 0;
                                     while($filap = sqlsrv_fetch_array($ejercutarp)){
                                         $nombreproducto = $filap ['nombreProducto'];
                                         $idproducto = $filap ['idProducto'];
                                         $imed = $imed+1;
                                        ?>
                                    <option value="<?php echo $idproducto;?>"><?php echo $nombreproducto;?></option>
                                    
                                    <!--Cierre del ciclo PHP-->
                                     <?php } ?>  
                                    
                                </select>
							</div>
						</div>
                        
                         <!--PRODUCTOS = CUIDADO PERSONAL -->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="cuidadopersonal" class="form-control">
                                     <option selected disabled>Cuidado Personal...</option>
                                
                                <?php
                                //CONSULTA PARA TRAER LOS PRODUCTOS 'CUIDADO PERSONAL'

                                $consultap = "SELECT nombreProducto, tipo,idProducto FROM Producto, TipoProducto WHERE (idtipo = idTipoProducto) AND (idtipo = 4)";
                                $ejecutarp = sqlsrv_query($con, $consultap);
                                    $imed = 0;
                                     while($filap = sqlsrv_fetch_array($ejecutarp)){
                                         $nombreproducto = $filap ['nombreProducto'];
                                         $idproducto = $filap ['idProducto'];
                                         $imed = $imed+1;
                                        ?>
                                    <option value="<?php echo $idproducto;?>"><?php echo $nombreproducto;?></option>
                                    
                                    <!--Cierre del ciclo PHP-->
                                     <?php } ?>  
                                    
                                </select>
							</div>
						</div>
                        
                         <!--PRODUCTOS = BONUS -->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="bonus" class="form-control">
                                     <option selected disabled>Bonus...</option>
                                
                                <?php
                                //CONSULTA PARA TRAER LOS PRODUCTOS 'BONUS'

                                $consultap = "SELECT nombreProducto, tipo,idProducto FROM Producto, TipoProducto WHERE (idtipo = idTipoProducto) AND (idtipo = 5)";
                                $ejecutarp = sqlsrv_query($con, $consultap);
                                    $imed = 0;
                                     while($filap = sqlsrv_fetch_array($ejecutarp)){
                                         $nombreproducto = $filap ['nombreProducto'];
                                         $idproducto = $filap ['idProducto'];
                                         $imed = $imed+1;
                                        ?>
                                    <option value="<?php echo $idproducto;?>"><?php echo $nombreproducto;?></option>
                                    
                                    <!--Cierre del ciclo PHP-->
                                     <?php } ?>  
                                    
                                </select>
							</div>
						</div>
                        
                        
						<div style="margin-bottom:50px;" class="form-group text-center">
							<input name="ingresarbunch" type="submit" value="Agregar Bunch" class="btn btn-primary" href="newitemsform.php">
						</div>

					</form>		
				</div>
                
                  <!--FORM NUEVO PRODUCTO-->
                <div class="col-md-6 animate-box text-center">
					<h3 style="font-family: Walkway; font-size: 30px;">Agregar nuevo <span style="font-family: Another Day in Paradise;  font-size: 55px;">Producto</span></h3>
                    
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        
                          <!--NOMBRE DEL PRODUCTO -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" name="nombreproducto" class="form-control" placeholder="Nombre del Producto">
							</div>
						</div>
                        
                         <!--DESCRIPCION DEL PRODUCTO -->
                         <div class="row form-group">
							<div class="col-md-12">
								<textarea  name="descripcionproducto" cols="15" rows="4" class="form-control" placeholder="Descripción del Producto"></textarea>
							</div>
						</div>
                        
                        <!-- Tipo del Producto-->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="tipoproducto" class="form-control">
                                     <option selected disabled>Tipo de Producto</option>
                                     <option value="1">Medicamento</option>
                                     <option value="2">Medicina Adicional</option>
                                     <option value="3">Alimento</option>
                                     <option value="4">Cuidado Personal</option>
                                     <option value="5">Artículo Bonus</option>
                                </select>
							</div>
						</div>
                        
                       
                        
						<div style="margin-bottom:50px;" class="form-group text-center">
							<input name="ingresar" type="submit" value="Agregar Producto" class="btn btn-primary">
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

