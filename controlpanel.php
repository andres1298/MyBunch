<!DOCTYPE HTML>

<!--Se agrega la el archivo de conexión con la base de datos-->
<?php
include("SQL/selectdata.php");
include("SQL/deletedata.php");
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
	<title>Panel de Control - MyBunch</title>
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
                            <li><a href="newitemsform.php">Formulario Administrador</a></li>
                            <li   class="active"><a href="controlpanel.php">Panel de Control</a></li>
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
					   <img class="img-responsive" style="height:125px; width:300px; margin-left:25px; margin-top:40px; margin-bottom:40px;" src="images/entrance.jpg" alt="trainer">
				        <div class="col-md-4 col-sm-4 animate-box"></div>
			         </div>
                    <div class="row"><div class="col-md-4 col-sm-4 animate-box"></div></div>
          </div>
            <div class="text-center">
                <h3 style="font-family: Walkway; font-size: 30px;">Registros en BD <span style="font-family: Another Day in Paradise;  font-size: 55px;">MyBunch</span></h3>
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#usuarios">Usuarios</a></li>
                    <li><a data-toggle="tab" href="#bunchs">Bunchs</a></li>
                    <li><a data-toggle="tab" href="#productos">Productos</a></li>
                    <li><a data-toggle="tab" href="#ventas">Ventas</a></li>
                  </ul>
	       </div>
        
    <div class="container">
                  
    <div class="tab-content">
     
        
    <!--TABLA USUARIOS-->
    <div id="usuarios" class="tab-pane fade in active">
        
       <h3 class="text-center" style="font-family: Walkway; font-size: 28px; margin-top:20px;">Tabla Usuarios</h3>     
            <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">1er Apellido</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                            

                        </tr>
                    </thead>
                
                    <!--Codigo PHP para hacer la consulta a la base de datos sobre los usuarios-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA USUARIOS
                        //////////////////////////////

                         $consultauser = "SELECT cedulaUsuario,nombreUsuario,primerApellido,segundoApellido,correoUsuario,direccion,telefono,contrasena,puntosUsuario,tipoUsuario,nivel FROM Usuario, Nivel WHERE idnivel = nivel ORDER BY nombreUsuario ASC";
                        $ejecutaruser = sqlsrv_query($con, $consultauser);

                            $iusers = 0;

                             while($filausers = sqlsrv_fetch_array($ejecutaruser)){
                                 $cedulaUsuario = $filausers ['cedulaUsuario'];
                                 $nombreUsuario = $filausers ['nombreUsuario'];
                                 $primerApellido = $filausers ['primerApellido'];
                                 $segundoApellido = $filausers ['segundoApellido'];
                                 $correoUsuario = $filausers ['correoUsuario'];
                                 $direccion = $filausers ['direccion'];
                                 $telefono = $filausers ['telefono'];
                                 $contrasena = $filausers ['contrasena'];
                                 $puntosUsuario = $filausers ['puntosUsuario'];
                                 $tipoUsuario = $filausers ['tipoUsuario'];
                                 $nivel = $filausers ['nivel'];

                                 $iusers = $iusers+1;


                                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $cedulaUsuario; ?></td>
                            <td><?php echo $nombreUsuario; ?></td>
                            <td><?php echo $primerApellido; ?></td>
                            <td><?php echo $correoUsuario; ?></td>
                            <td><?php echo $telefono; ?></td>
                            <td><?php echo $contrasena; ?></td>
                            <td><?php echo $tipoUsuario; ?></td>
                            
                            <td><a href="controlpanel.php?editarusuario=<?php echo $cedulaUsuario;?>">Editar</a></td>
                            <td><a href="controlpanel.php?borrarusuario=<?php echo $cedulaUsuario;?>">Borrar</a></td>
                        </tr>
                    </tbody>
                    
                    <!--Cierre del ciclo PHP-->
                     <?php } ?>  
                
                  <?php 
                        if(isset($_GET['editarusuario'])){
                        include("SQL/updateusers.php");
                        }
                    ?>

            </table>      
    </div>
        
        
    <div id="bunchs" class="tab-pane fade">
        
         <h3 class="text-center" style="font-family: Walkway; font-size: 28px; margin-top:20px;">Tabla Usuarios</h3>     
            <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Bunch</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Experiencia</th>
                            <th scope="col">Padecimiento</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                            

                        </tr>
                    </thead>
                
                    <!--Codigo PHP para hacer la consulta a la base de datos sobre los usuarios-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////

                         $consultabunch = "SELECT idBunch,nombreBunch,CONVERT(int,precio) as precio,puntosotorgados, nombrePadecimiento FROM Bunch,Padecimiento WHERE Padecimiento = idPadecimiento ORDER BY nombreBunch ASC";
                        $ejecutarbunch = sqlsrv_query($con, $consultabunch);

                            $ibunch = 0;

                             while($filabunch = sqlsrv_fetch_array($ejecutarbunch)){
                                 $idbunch = $filabunch ['idBunch'];
                                 $nombrebunch = $filabunch ['nombreBunch'];
                                 $preciobunch = $filabunch ['precio'];
                                 $experienciabunch = $filabunch ['puntosotorgados'];
                                 $padecimientobunch = $filabunch ['nombrePadecimiento'];

                                 $ibunch = $ibunch+1;


                                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $idbunch; ?></td>
                            <td><?php echo $nombrebunch; ?></td>
                            <td>$<?php echo $preciobunch; ?></td>
                            <td><?php echo $experienciabunch; ?></td> 
                            <td><?php echo $padecimientobunch; ?></td>
                            
                            <td><a href="controlpanel.php?editarbunch=<?php echo $idbunch;?>">Editar</a></td>
                            <td><a href="controlpanel.php?borrarbunch=<?php echo $idbunch;?>">Borrar</a></td>
                        </tr>
                    </tbody>
                    
                    <!--Cierre del ciclo PHP-->
                     <?php } ?>  
                
                <?php 
                    if(isset($_GET['editarbunch'])){
                    include("SQL/updatebunch.php");
                    }
                ?>
                  
            </table>
    </div>
    
        
    <!--TABLA PRODUCTOS-->
    <div id="productos" class="tab-pane fade">
       <h3 class="text-center" style="font-family: Walkway; font-size: 28px; margin-top:20px;">Tabla Productos</h3>
            <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                
                    <!--Codigo PHP para hacer la consulta a la base de datos sobre los productos-->
                        <?php


                        ///////////////////////////////
                            //CONSULTA PRODUCTOS
                        //////////////////////////////

                        $consultaprod = "SELECT idProducto,nombreProducto,descripcion,tipo from Producto,TipoProducto where idtipo = idTipoProducto";
                        $ejecutarprod = sqlsrv_query($con, $consultaprod);

                            $iprod = 0;

                             while($filaprod = sqlsrv_fetch_array($ejecutarprod)){
                                 $idproducto = $filaprod ['idProducto'];
                                 $nombreproducto = $filaprod ['nombreProducto'];
                                 $descripcionproducto = $filaprod ['descripcion'];
                                 $tipoproducto = $filaprod ['tipo'];

                                 $iprod = $iprod+1;
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $idproducto; ?></td>
                            <td><?php echo $nombreproducto; ?></td>
                            <td><?php echo $descripcionproducto; ?></td>
                            <td><?php echo $tipoproducto; ?></td>
                            <td><a href="controlpanel.php?editarproducto=<?php echo $idproducto;?>">Editar</a></td>
                            <td><a href="controlpanel.php?borrarproducto=<?php echo $idproducto;?>">Borrar</a></td>
                        </tr>
                    </tbody>
                    
                    <!--Cierre del ciclo PHP-->
                     <?php } ?> 
                
                
                      <!--Si se presiona el boton editar se agrega y ejecuta el archivo updatedata.php-->
                    <?php 
                        if(isset($_GET['editarproducto'])){
                        include("SQL/updateprod.php");
                        }
                    ?>

            </table>
    </div>
        
        
    <div id="ventas" class="tab-pane fade"> 
        
        <h3 class="text-center" style="font-family: Walkway; font-size: 28px; margin-top:20px;">Tabla Ventas</h3>
            <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Compra</th>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Bunch</th>
                            <th scope="col">Monto</th>
                        </tr>
                    </thead>
                
                    <!--Codigo PHP para hacer la consulta a la base de datos sobre los productos-->
                        <?php


                        ///////////////////////////////
                            //CONSULTA VENTAS
                        //////////////////////////////

                        $consultaventas = "SELECT idCompra,cedulaUsuario, nombreUsuario, primerApellido,nombreBunch, CONVERT(int,montoCompra) as montoCompra FROM Usuario, Compra, Bunch_Compra,Bunch WHERE (idUsuario = cedulaUsuario) AND (idBunch = idBunchRel) AND (idCompra = idCompraRel) AND (estado = 'Completado') ORDER BY idCompra ASC";
                        $ejecutarventas = sqlsrv_query($con, $consultaventas);

                            $iventas = 0;

                             while($filaventa = sqlsrv_fetch_array($ejecutarventas)){
                                 
                                 $idcompra = $filaventa ['idCompra'];
                                 $nombreusuario = $filaventa ['nombreUsuario'];
                                 $cedula = $filaventa ['cedulaUsuario'];
                                 $apellido = $filaventa ['primerApellido'];
                                 $nombrebunch = $filaventa ['nombreBunch'];
                                 $monto = $filaventa ['montoCompra'];
                                 
                                 $iventas = $iventas+1;
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $idcompra; ?></td>
                            <td><?php echo $cedula; ?></td>
                            <td><?php echo $nombreusuario; ?></td>
                            <td><?php echo $apellido; ?></td>
                            <td><?php echo $nombrebunch; ?></td>
                            <td>$<?php echo $monto; ?></td>
                            
                        </tr>
                    </tbody>
                    
                    <!--Cierre del ciclo PHP-->
                     <?php } ?> 
                
                
                

            </table>
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
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

