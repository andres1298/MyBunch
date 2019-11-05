<!DOCTYPE HTML>

<?php
include("SQL/selectdata.php");
$cedulaUsuario = json_decode(file_get_contents('SQL/txt/cedula.txt'));
$estado = json_decode(file_get_contents('SQL/txt/estado.txt'));
    if(!($estado== 2)){
        echo "<script>alert('Hey Admin, primero debes iniciar sesión!'); location.href = 'login.php'; </script>"; 
    }
?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyBunch</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="MyBunch Final Project 2018" />
	<meta name="keywords" content="Pharmacy, Drugstore" />
	<meta name="author" content="Andrés Bonilla" />

	<!-- 
	-----------------------------------------------

    My Bunch, Proyecto de Graduación de Sexto 2018 

    F85A16
	------------------------------------------------
	 -->


    <link rel="icon" href="images/dinosauricon.ico">
	<link href="css/fonts.css" rel="stylesheet">
	
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
							<li class="active"><a href="indexadmin.php">Inicio</a></li>
                            <li><a href="newitemsform.php">Formulario Administrador</a></li>
                            <li><a href="controlpanel.php">Panel de Control</a></li>
                            <li><a href="index.php">Vista Usuario</a></li>
                            <li><a href="login.php"> Cerrar Sesión</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/bunchs/gift.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>MyBunch</h1>
							<h2>PERFECT COMBINATION</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span><img class="img-responsive" src="images/bunchs/medicine.svg" alt=""></span>
						<h3>Mental</h3>
						<p>Mantener tu cabeza tranquila, para afrontar tu rutina con la mente fresca</p>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span><img class="img-responsive" src="images/bunchs/chocolate.svg" alt=""></span>
						<h3>Físico</h3>
						<p>Bienestar con tu cuerpo, dejar atrás los malestares que afectan tu día a día</p>
						
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span><img class="img-responsive" src="images/bunchs/dino.svg" alt=""></span>
						<h3>Social</h3>
						<p>La mejor apariencia en los momentos díficiles, para sentirme mejor </p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="fh5co-schedule" class="fh5co-bg" style="background-image: url(images/img_bg_1.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>BUNCHS</h2>
				</div>
			</div>

			<div class="row animate-box">
				
				<div class="fh5co-tabs">
					<ul class="fh5co-tab-nav">
				        <li class="active"><a href="#" data-tab="1"><span class="visible-xs">1</span><span class="hidden-xs">Gripe</span></a></li>
						<li><a href="#" data-tab="2"><span class="visible-xs">2</span><span class="hidden-xs">Asma</span></a></li>
						<li><a href="#" data-tab="3"><span class="visible-xs">3</span><span class="hidden-xs">Dolor de Cabeza</span></a></li>
						<li><a href="#" data-tab="4"><span class="visible-xs">4</span><span class="hidden-xs">Heridas</span></a></li>
						<li><a href="#" data-tab="5"><span class="visible-xs">5</span><span class="hidden-xs">Estomágo</span></a></li>
						<li><a href="#" data-tab="6"><span class="visible-xs">6</span><span class="hidden-xs">Periodo</span></a></li>
						<li><a href="#" data-tab="7"><span class="visible-xs">7</span><span class="hidden-xs">Otros</span></a></li>
					</ul>

					<!-- Tabs -->
					<div class="fh5co-tab-content-wrap">
                        
                          <!--
                        ---------
                        GRIPE
                        ---------
                        -->
                        <div class="fh5co-tab-content tab-content active" data-tab-content="1">
							<ul class="class-schedule">
                        
                      
                        <!--Codigo PHP para hacer la consulta a la base de datos sobre los Bunchs-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////

                         $gripe = "SELECT idBunch,nombreBunch,CONVERT(int,precio) AS precio, nombrePadecimiento FROM Bunch,Padecimiento WHERE Padecimiento = idPadecimiento AND (idPadecimiento = 1)";
                        $ejecutarbunch = sqlsrv_query($con, $gripe);

                            $ibunch = 0;

                             while($filabunch = sqlsrv_fetch_array($ejecutarbunch)){
                                  
                                 $idbunch = $filabunch ['idBunch'];
                                 $nombrebunch = $filabunch ['nombreBunch'];
                                 $preciobunch = $filabunch ['precio'];
                                 $padecimientobunch = $filabunch ['nombrePadecimiento'];

                                 $ibunch = $ibunch+1;
                             

                                ?>
								<li class="text-center">
                                    <?php
                                        if($ibunch===2||$ibunch===5||$ibunch===8||$ibunch===11){
                                            echo "<span><img  src='images/bunchs/chocolate.svg' class='img-responsive' alt=''></span>";
                                        }
                                    else if($ibunch===3||$ibunch===6||$ibunch===9||$ibunch===12){
                                            echo "<span><img  src='images/bunchs/dino.svg' class='img-responsive' alt=''></span>";
                                        }
                                        else{
                                            echo "<span><img  src='images/bunchs/medicine.svg' class='img-responsive' alt=''></span>";
                                        }
                                    ?>
									
									<span class="time">$<?php echo $preciobunch;?></span>
									<h4><?php echo $nombrebunch;?></h4>
									<small>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            //CONSULTA PARA TRAER LOS PRODUCTOS DEL BUNCH
                                            $consultap = "SELECT nombreProducto FROM Producto, TipoProducto, Bunch_Producto,Bunch WHERE (idtipo = idTipoProducto) AND (idBunchRel = idBunch) AND (idProducto = idProductoRel) AND (idtipo = '$i') AND (idBunchRel= '$idbunch')";
                                            $ejercutarp = sqlsrv_query($con, $consultap);      
                                            $filap = sqlsrv_fetch_array($ejercutarp);
                                            $producto = $filap ['nombreProducto'];  
                                         ?>    
                                            <?php echo $producto;?><br>
                                        <?php } ?>
                                    </small><br><br>
                                    <div>
                                        <a class="btn btn-primary" href="index.php?agregarbunch=<?php echo $idbunch;?>">Agregar</a>
						          </div>
								</li>
								<?php } ?>
                                
							</ul>
						</div>
                        
                         <!--
                        ---------
                        ASMA
                        ---------
                        -->
						<div class="fh5co-tab-content tab-content " data-tab-content="2">
							<ul class="class-schedule">
								<!--Codigo PHP para hacer la consulta a la base de datos sobre los Bunchs-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////

                         $gripe = "SELECT idBunch,nombreBunch,CONVERT(int,precio) AS precio, nombrePadecimiento FROM Bunch,Padecimiento WHERE Padecimiento = idPadecimiento AND (idPadecimiento = 2)";
                        $ejecutarbunch = sqlsrv_query($con, $gripe);

                            $ibunch = 0;

                             while($filabunch = sqlsrv_fetch_array($ejecutarbunch)){
                                  
                                 $idbunch = $filabunch ['idBunch'];
                                 $nombrebunch = $filabunch ['nombreBunch'];
                                 $preciobunch = $filabunch ['precio'];
                                 $padecimientobunch = $filabunch ['nombrePadecimiento'];

                                 $ibunch = $ibunch+1;
                             

                                ?>
								<li class="text-center">
									<?php
                                        if($ibunch===2||$ibunch===5||$ibunch===8||$ibunch===11){
                                            echo "<span><img  src='images/bunchs/chocolate.svg' class='img-responsive' alt=''></span>";
                                        }
                                    else if($ibunch===3||$ibunch===6||$ibunch===9||$ibunch===12){
                                            echo "<span><img  src='images/bunchs/dino.svg' class='img-responsive' alt=''></span>";
                                        }
                                        else{
                                            echo "<span><img  src='images/bunchs/medicine.svg' class='img-responsive' alt=''></span>";
                                        }
                                    ?>
									<span class="time">$<?php echo $preciobunch;?></span>
									<h4><?php echo $nombrebunch;?></h4>
									<small>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            //CONSULTA PARA TRAER LOS PRODUCTOS DEL BUNCH
                                            $consultap = "SELECT nombreProducto FROM Producto, TipoProducto, Bunch_Producto,Bunch WHERE (idtipo = idTipoProducto) AND (idBunchRel = idBunch) AND (idProducto = idProductoRel) AND (idtipo = '$i') AND (idBunchRel= '$idbunch')";
                                            $ejercutarp = sqlsrv_query($con, $consultap);      
                                            $filap = sqlsrv_fetch_array($ejercutarp);
                                            $producto = $filap ['nombreProducto'];  
                                         ?>    
                                            <?php echo $producto;?><br>
                                        <?php } ?>
                                    </small><br><br>
                                    <div>
                                        <a class="btn btn-primary" href="index.php?agregarbunch=<?php echo $idbunch;?>">Agregar</a>
						          </div>
								</li>
								<?php } ?>
                                
                                  
							</ul>
								
							
						</div>

                         <!--
                        ---------
                        MIGRAÑA
                        ---------
                        -->
						<div class="fh5co-tab-content tab-content " data-tab-content="3">
							<ul class="class-schedule">
								<!--Codigo PHP para hacer la consulta a la base de datos sobre los Bunchs-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////

                         $gripe = "SELECT idBunch,nombreBunch,CONVERT(int,precio) AS precio, nombrePadecimiento FROM Bunch,Padecimiento WHERE Padecimiento = idPadecimiento AND (idPadecimiento = 3)";
                        $ejecutarbunch = sqlsrv_query($con, $gripe);

                            $ibunch = 0;

                             while($filabunch = sqlsrv_fetch_array($ejecutarbunch)){
                                  
                                 $idbunch = $filabunch ['idBunch'];
                                 $nombrebunch = $filabunch ['nombreBunch'];
                                 $preciobunch = $filabunch ['precio'];
                                 $padecimientobunch = $filabunch ['nombrePadecimiento'];

                                 $ibunch = $ibunch+1;
                             

                                ?>
								<li class="text-center">
									<?php
                                        if($ibunch===2||$ibunch===5||$ibunch===8||$ibunch===11){
                                            echo "<span><img  src='images/bunchs/chocolate.svg' class='img-responsive' alt=''></span>";
                                        }
                                    else if($ibunch===3||$ibunch===6||$ibunch===9||$ibunch===12){
                                            echo "<span><img  src='images/bunchs/dino.svg' class='img-responsive' alt=''></span>";
                                        }
                                        else{
                                            echo "<span><img  src='images/bunchs/medicine.svg' class='img-responsive' alt=''></span>";
                                        }
                                    ?>
									<span class="time">$<?php echo $preciobunch;?></span>
									<h4><?php echo $nombrebunch;?></h4>
									<small>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            //CONSULTA PARA TRAER LOS PRODUCTOS DEL BUNCH
                                            $consultap = "SELECT nombreProducto FROM Producto, TipoProducto, Bunch_Producto,Bunch WHERE (idtipo = idTipoProducto) AND (idBunchRel = idBunch) AND (idProducto = idProductoRel) AND (idtipo = '$i') AND (idBunchRel= '$idbunch')";
                                            $ejercutarp = sqlsrv_query($con, $consultap);      
                                            $filap = sqlsrv_fetch_array($ejercutarp);
                                            $producto = $filap ['nombreProducto'];  
                                         ?>    
                                            <?php echo $producto;?><br>
                                        <?php } ?>
                                    </small><br><br>
                                    <div>
                                        <a class="btn btn-primary" href="index.php?agregarbunch=<?php echo $idbunch;?>">Agregar</a>
						          </div>
								</li>
								<?php } ?>
                                
                                 
							</ul>
							
						</div>

                         <!--
                        ---------
                        GOLPES
                        ---------
                        -->
						<div class="fh5co-tab-content tab-content " data-tab-content="4">
							<ul class="class-schedule">
								<!--Codigo PHP para hacer la consulta a la base de datos sobre los Bunchs-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////

                         $gripe = "SELECT idBunch,nombreBunch,CONVERT(int,precio) AS precio, nombrePadecimiento FROM Bunch,Padecimiento WHERE Padecimiento = idPadecimiento AND (idPadecimiento = 4)";
                        $ejecutarbunch = sqlsrv_query($con, $gripe);

                            $ibunch = 0;

                             while($filabunch = sqlsrv_fetch_array($ejecutarbunch)){
                                  
                                 $idbunch = $filabunch ['idBunch'];
                                 $nombrebunch = $filabunch ['nombreBunch'];
                                 $preciobunch = $filabunch ['precio'];
                                 $padecimientobunch = $filabunch ['nombrePadecimiento'];

                                 $ibunch = $ibunch+1;
                             

                                ?>
								<li class="text-center">
									<?php
                                        if($ibunch===2||$ibunch===5||$ibunch===8||$ibunch===11){
                                            echo "<span><img  src='images/bunchs/chocolate.svg' class='img-responsive' alt=''></span>";
                                        }
                                    else if($ibunch===3||$ibunch===6||$ibunch===9||$ibunch===12){
                                            echo "<span><img  src='images/bunchs/dino.svg' class='img-responsive' alt=''></span>";
                                        }
                                        else{
                                            echo "<span><img  src='images/bunchs/medicine.svg' class='img-responsive' alt=''></span>";
                                        }
                                    ?>
									<span class="time">$<?php echo $preciobunch;?></span>
									<h4><?php echo $nombrebunch;?></h4>
									<small>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            //CONSULTA PARA TRAER LOS PRODUCTOS DEL BUNCH
                                            $consultap = "SELECT nombreProducto FROM Producto, TipoProducto, Bunch_Producto,Bunch WHERE (idtipo = idTipoProducto) AND (idBunchRel = idBunch) AND (idProducto = idProductoRel) AND (idtipo = '$i') AND (idBunchRel= '$idbunch')";
                                            $ejercutarp = sqlsrv_query($con, $consultap);      
                                            $filap = sqlsrv_fetch_array($ejercutarp);
                                            $producto = $filap ['nombreProducto'];  
                                         ?>    
                                            <?php echo $producto;?><br>
                                        <?php } ?>
                                    </small><br><br>
                                    <div>
                                        <a class="btn btn-primary" href="index.php?agregarbunch=<?php echo $idbunch;?>">Agregar</a>
						          </div>
								</li>
								<?php } ?>
                               
							</ul>
						
						</div>

                         <!--
                        ---------
                        GASTRITIS
                        ---------
                        -->
						<div class="fh5co-tab-content tab-content " data-tab-content="5">
							<ul class="class-schedule">
								<!--Codigo PHP para hacer la consulta a la base de datos sobre los Bunchs-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////

                         $gripe = "SELECT idBunch,nombreBunch,CONVERT(int,precio) AS precio, nombrePadecimiento FROM Bunch,Padecimiento WHERE Padecimiento = idPadecimiento AND (idPadecimiento = 5)";
                        $ejecutarbunch = sqlsrv_query($con, $gripe);

                            $ibunch = 0;

                             while($filabunch = sqlsrv_fetch_array($ejecutarbunch)){
                                  
                                 $idbunch = $filabunch ['idBunch'];
                                 $nombrebunch = $filabunch ['nombreBunch'];
                                 $preciobunch = $filabunch ['precio'];
                                 $padecimientobunch = $filabunch ['nombrePadecimiento'];

                                 $ibunch = $ibunch+1;
                             

                                ?>
								<li class="text-center">
									<?php
                                        if($ibunch===2||$ibunch===5||$ibunch===8||$ibunch===11){
                                            echo "<span><img  src='images/bunchs/chocolate.svg' class='img-responsive' alt=''></span>";
                                        }
                                    else if($ibunch===3||$ibunch===6||$ibunch===9||$ibunch===12){
                                            echo "<span><img  src='images/bunchs/dino.svg' class='img-responsive' alt=''></span>";
                                        }
                                        else{
                                            echo "<span><img  src='images/bunchs/medicine.svg' class='img-responsive' alt=''></span>";
                                        }
                                    ?>
									<span class="time">$<?php echo $preciobunch;?></span>
									<h4><?php echo $nombrebunch;?></h4>
									<small>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            //CONSULTA PARA TRAER LOS PRODUCTOS DEL BUNCH
                                            $consultap = "SELECT nombreProducto FROM Producto, TipoProducto, Bunch_Producto,Bunch WHERE (idtipo = idTipoProducto) AND (idBunchRel = idBunch) AND (idProducto = idProductoRel) AND (idtipo = '$i') AND (idBunchRel= '$idbunch')";
                                            $ejercutarp = sqlsrv_query($con, $consultap);      
                                            $filap = sqlsrv_fetch_array($ejercutarp);
                                            $producto = $filap ['nombreProducto'];  
                                         ?>    
                                            <?php echo $producto;?><br>
                                        <?php } ?>
                                    </small><br><br>
                                    <div>
                                        <a class="btn btn-primary" href="index.php?agregarbunch=<?php echo $idbunch;?>">Agregar</a>
						          </div>
								</li>
								<?php } ?>
                                
                                 
							</ul>
						</div>

                         <!--
                        ---------
                        PERIODO
                        ---------
                        -->
						<div class="fh5co-tab-content tab-content " data-tab-content="6">
							<ul class="class-schedule">
								<!--Codigo PHP para hacer la consulta a la base de datos sobre los Bunchs-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////

                         $gripe = "SELECT idBunch,nombreBunch,CONVERT(int,precio) AS precio, nombrePadecimiento FROM Bunch,Padecimiento WHERE Padecimiento = idPadecimiento AND (idPadecimiento = 6)";
                        $ejecutarbunch = sqlsrv_query($con, $gripe);

                            $ibunch = 0;

                             while($filabunch = sqlsrv_fetch_array($ejecutarbunch)){
                                  
                                 $idbunch = $filabunch ['idBunch'];
                                 $nombrebunch = $filabunch ['nombreBunch'];
                                 $preciobunch = $filabunch ['precio'];
                                 $padecimientobunch = $filabunch ['nombrePadecimiento'];

                                 $ibunch = $ibunch+1;
                             

                                ?>
								<li class="text-center">
									<?php
                                        if($ibunch===2||$ibunch===5||$ibunch===8||$ibunch===11){
                                            echo "<span><img  src='images/bunchs/chocolate.svg' class='img-responsive' alt=''></span>";
                                        }
                                    else if($ibunch===3||$ibunch===6||$ibunch===9||$ibunch===12){
                                            echo "<span><img  src='images/bunchs/dino.svg' class='img-responsive' alt=''></span>";
                                        }
                                        else{
                                            echo "<span><img  src='images/bunchs/medicine.svg' class='img-responsive' alt=''></span>";
                                        }
                                    ?>
									<span class="time">$<?php echo $preciobunch;?></span>
									<h4><?php echo $nombrebunch;?></h4>
									<small>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            //CONSULTA PARA TRAER LOS PRODUCTOS DEL BUNCH
                                            $consultap = "SELECT nombreProducto FROM Producto, TipoProducto, Bunch_Producto,Bunch WHERE (idtipo = idTipoProducto) AND (idBunchRel = idBunch) AND (idProducto = idProductoRel) AND (idtipo = '$i') AND (idBunchRel= '$idbunch')";
                                            $ejercutarp = sqlsrv_query($con, $consultap);      
                                            $filap = sqlsrv_fetch_array($ejercutarp);
                                            $producto = $filap ['nombreProducto'];  
                                         ?>    
                                            <?php echo $producto;?><br>
                                        <?php } ?>
                                    </small><br><br>
                                    <div>
                                        <a class="btn btn-primary" href="index.php?agregarbunch=<?php echo $idbunch;?>">Agregar</a>
						          </div>
								</li>
								<?php } ?>
                                
                                
							</ul>
						</div>

                         <!--
                        ---------
                        OTROS
                        ---------
                        -->
						<div class="fh5co-tab-content tab-content " data-tab-content="7">
							<ul class="class-schedule">
								<!--Codigo PHP para hacer la consulta a la base de datos sobre los Bunchs-->
                        <?php

                        ///////////////////////////////
                            //CONSULTA BUNCHS
                        //////////////////////////////

                         $gripe = "SELECT idBunch,nombreBunch,CONVERT(int,precio) AS precio, nombrePadecimiento FROM Bunch,Padecimiento WHERE Padecimiento = idPadecimiento AND (idPadecimiento = 7)";
                        $ejecutarbunch = sqlsrv_query($con, $gripe);

                            $ibunch = 0;

                             while($filabunch = sqlsrv_fetch_array($ejecutarbunch)){
                                  
                                 $idbunch = $filabunch ['idBunch'];
                                 $nombrebunch = $filabunch ['nombreBunch'];
                                 $preciobunch = $filabunch ['precio'];
                                 $padecimientobunch = $filabunch ['nombrePadecimiento'];

                                 $ibunch = $ibunch+1;
                             

                                ?>
								<li class="text-center">
									<?php
                                        if($ibunch===2||$ibunch===5||$ibunch===8||$ibunch===11){
                                            echo "<span><img  src='images/bunchs/chocolate.svg' class='img-responsive' alt=''></span>";
                                        }
                                    else if($ibunch===3||$ibunch===6||$ibunch===9||$ibunch===12){
                                            echo "<span><img  src='images/bunchs/dino.svg' class='img-responsive' alt=''></span>";
                                        }
                                        else{
                                            echo "<span><img  src='images/bunchs/medicine.svg' class='img-responsive' alt=''></span>";
                                        }
                                    ?>
									<span class="time">$<?php echo $preciobunch;?></span>
									<h4><?php echo $nombrebunch;?></h4>
									<small>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            //CONSULTA PARA TRAER LOS PRODUCTOS DEL BUNCH
                                            $consultap = "SELECT nombreProducto FROM Producto, TipoProducto, Bunch_Producto,Bunch WHERE (idtipo = idTipoProducto) AND (idBunchRel = idBunch) AND (idProducto = idProductoRel) AND (idtipo = '$i') AND (idBunchRel= '$idbunch')";
                                            $ejercutarp = sqlsrv_query($con, $consultap);      
                                            $filap = sqlsrv_fetch_array($ejercutarp);
                                            $producto = $filap ['nombreProducto'];  
                                         ?>    
                                            <?php echo $producto;?><br>
                                        <?php } ?>
                                    </small><br><br>
                                    <div>
                                        <a class="btn btn-primary" href="index.php?agregarbunch=<?php echo $idbunch;?>">Agregar</a>
						          </div>
								</li>
								<?php } ?>
							</ul>
						</div>
                            <?php 
                                if(isset($_GET['agregarbunch'])){
                                include("SQL/addbunch.php");
                                }
                            ?>
					</div>
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

