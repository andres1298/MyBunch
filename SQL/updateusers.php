<?php

    $serverName = 'localhost';
    $connectionInfo = array("Database"=>"MyBunch", "UID"=>"sa", "PWD"=>"1999", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo);
      



        if(isset($_GET['editarusuario'])){
            $editar_user = $_GET['editarusuario'];
            
            $consultauser = "SELECT cedulaUsuario,nombreUsuario,primerApellido,segundoApellido,correoUsuario,direccion,telefono,contrasena,puntosUsuario,tipoUsuario,nivel FROM Usuario, Nivel WHERE (idnivel = nivel) AND (cedulaUsuario = '$editar_user')";
                
            $ejecutaruser = sqlsrv_query($con, $consultauser);
            
            $filausers = sqlsrv_fetch_array($ejecutaruser);
            
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
         }
               
?>


            
        

           <div style="margin-left:200px;" class="col-md-8 animate-box text-center">
					<h3 style="font-family: Walkway; font-size: 30px;">Modificar Perfil <span style="font-family: Another Day in Paradise;  font-size: 55px;">MyBunch!</span></h3>
                    
					<form  method="POST" action="" >
                        
						<div class="row form-group">
                            <!--NOMBRE DEL USUARIO-->
							<div class="col-md-4">
								<input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombreUsuario;?>">
							</div>
                             <!--PRIMER APELLIDO -->
                            <div class="col-md-4">
								<input type="text" id="apellido1"  name="apellido1" class="form-control" value="<?php echo $primerApellido;?>">
							</div>
                            <!--SEGUNDO APELLIDO -->
                           <div class="col-md-4">
								<input type="text" id="apellido2" name="apellido2" class="form-control" value="<?php echo $segundoApellido;?>" >
							</div> 
						</div>
                        
                        <!-- CEDULA O PASAPORTE-->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="cedula" name="cedula" class="form-control" value="<?php echo $cedulaUsuario;?>" >
							</div>
						</div>
                        
                        <!--CORREO ELECTRONICO -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="email" name="email" class="form-control" value="<?php echo $correoUsuario;?>" >
							</div>
						</div>
                        
                        <!--NUMERO DE TELEFONO -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $telefono;?>" >
							</div>
						</div>
                        
                          <!--DIRECCION DE USUARIO-->
                        <div class="row form-group">
							<div class="col-md-12">
								<input id="direccion" name="direccion" class="form-control" value="<?php echo $direccion;?>" >
							</div>
						</div>
                        
                        <!-- TIPO DEL USUARIO-->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="tipousuario" class="form-control">
                                     <option value="<?php echo $tipoUsuario;?>"><?php echo $tipoUsuario;?></option>
                                     <option value="usuario">Usuario Normal</option>
                                     <option value="administrador">Administrador</option>
                                </select>
							</div>
						</div>
                        
                          <!--NIVEL -->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="nivel" class="form-control">
                                    <option value="<?php echo $nivel;?>"><?php echo $nivel;?></option>
                                    <option value="Básico">Básico</option>
                                    <option value="Bronce">Bronce</option>
                                    <option value="Plata">Plata</option>
                                    <option value="Oro">Oro</option>
                                    <option value="Platino">Platino</option>
                                    <option value="Diamante">Diamante</option>
                                    <option value="Bunch Master">Bunch Master</option>
                                </select>
							</div>
						</div>
                        
                        <!--CONTRASEÑA -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="password" name="password" class="form-control" value="<?php echo $contrasena;?>"  >
							</div>
						</div>
                        
						<div class="form-group">
							<input name="updateuser" type="submit" value="Ingresar Datos" class="btn btn-primary">
                             
						</div>

					</form>		
				</div>

<?php

    if(isset($_POST['updateuser'])){
            
            $nombreUsuario = $_POST ['nombre'];
            $primerApellido = $_POST ['apellido1'];
            $segundoApellido = $_POST ['apellido2'];
            $cedulaUsuario = $_POST ['cedula'];
            $correoUsuario = $_POST ['email'];
            $telefono = $_POST ['telefono'];
            $direccion = $_POST ['direccion'];
            $contrasena = $_POST ['password'];
            $tipoUsuario = $_POST ['tipousuario'];
            $nivel = $_POST ['nivel'];
            if($nivel == 'Básico'){$puntos=0;}else if($nivel == 'Bronce'){$puntos=40;}else if($nivel == 'Plata'){$puntos=150;}
            else if($nivel == 'Oro'){$puntos=300;}else if($nivel == 'Platino'){$puntos=750;}else if($nivel == 'Diamante'){$puntos=1500;}else if($nivel == 'Bunch Master'){$puntos=2500;}else if($nivel == $nivel){$puntos=$puntosUsuario;}
            
            $consultauser = "UPDATE Usuario SET cedulaUsuario = $cedulaUsuario, nombreUsuario = '$nombreUsuario', primerApellido = '$primerApellido', segundoApellido = '$segundoApellido', correoUsuario = '$correoUsuario', direccion = '$direccion', telefono = '$telefono', contrasena = '$contrasena', puntosUsuario = $puntos, tipoUsuario = '$tipoUsuario', idnivel = '$nivel' where cedulaUsuario = $editar_user";
                
            $ejecutaruser = sqlsrv_query($con, $consultauser);
            
           if($ejecutaruser){
               echo "<script>alert('Datos Actualizados'); location.href = 'controlpanel.php'; </script>"; 
                
               
           }
         
   
 }
               
?>