
<?php
    
    $serverName = 'localhost';
    $connectionInfo = array("Database"=>"MyBunch", "UID"=>"sa", "PWD"=>"1999", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo);

        ////////////////////
         //INGRESAR PRODUCTOS
        ////////////////////
    if(isset($_POST['ingresar'])){
        
        $nombreproducto = $_POST['nombreproducto'];
        $descripcionproducto = $_POST['descripcionproducto'];
        $tipoproducto = $_POST['tipoproducto'];
        
       
        $insertar = "INSERT INTO Producto(nombreProducto, descripcion, idtipo) VALUES('$nombreproducto','$descripcionproducto','$tipoproducto')";
        
        $ejecutar = sqlsrv_query($con, $insertar);
        
        if($ejecutar){
            echo"<script>alert('Datos Almacenados')</script>";
        }
        
    }
        ////////////////////
         //INGRESAR BUNCHS
        ////////////////////
            if(isset($_POST['ingresarbunch'])){

                
                //Se  obtienen las varibles mediante el POST
                $nombrebunch = $_POST['nombrebunch'];
                $preciobunch = $_POST['precio'];
                $padecimientobunch = $_POST['padecimiento'];
                $medicina = $_POST['medicina'];
                $medicinaadicional = $_POST['medicinaadicional'];
                $alimento = $_POST['alimento'];
                $cuidadopersonal = $_POST['cuidadopersonal'];
                $bonus = $_POST['bonus'];
                if($preciobunch == '$10'){$puntosotorgados=10;}else if($preciobunch == '$20'){$puntosotorgados=40;}else if($preciobunch == '$30'){$puntosotorgados=120;}else if($preciobunch == '$40'){$puntosotorgados=240;}else if($preciobunch == '$50'){$puntosotorgados=400;}
                
                //Primero se agregan los datos al Bunch
                $insertarb = "INSERT INTO Bunch(nombreBunch, precio, puntosotorgados,Padecimiento) VALUES('$nombrebunch','$preciobunch','$puntosotorgados','$padecimientobunch')";
                $ejecutarb = sqlsrv_query($con, $insertarb);
                
                //Se hace una consulta de los datos que acaban de ser almacenados para conseguir el ID del nuevo Bunch
                //Con la consulta se consigue el ultimo dato almacenado
                $consultabunch = "SELECT TOP 1 idBunch FROM Bunch ORDER BY idBunch DESC";

                $ejecutarbunch = sqlsrv_query($con, $consultabunch);
                //Se obtiene el valor del ID del Bunch
                $filabunch = sqlsrv_fetch_array($ejecutarbunch);
                $idbunch = $filabunch ['idBunch'];
                
                //Se almacenan los productos que pertenecen al Bunch
                 $insertarbunchprod =  
                "INSERT INTO Bunch_Producto(idBunchRel,idProductoRel) VALUES($idbunch,$medicina)
                 INSERT INTO Bunch_Producto(idBunchRel,idProductoRel) VALUES($idbunch,$medicinaadicional)
                 INSERT INTO Bunch_Producto(idBunchRel,idProductoRel) VALUES($idbunch,$alimento)
                 INSERT INTO Bunch_Producto(idBunchRel,idProductoRel) VALUES($idbunch,$cuidadopersonal)
                 INSERT INTO Bunch_Producto(idBunchRel,idProductoRel) VALUES($idbunch,$bonus)";
                
                 $ejecutarbunchprod = sqlsrv_query($con, $insertarbunchprod);
                
                if($ejecutarb && $ejecutarbunchprod){
                    echo"<script>alert('Datos Almacenados')</script>";
                }
            }

        ///////////////////////
         //INGRESAR USUARIOS
        ///////////////////////
    if(isset($_POST['ingresaruser'])){
        
            $nombreUsuario = $_POST ['nombre'];
            $primerApellido = $_POST ['apellido1'];
            $segundoApellido = $_POST ['apellido2'];
            $cedulaUsuario = $_POST ['cedula'];
            $correoUsuario = $_POST ['email'];
            $telefono = $_POST ['telefono'];
            $direccion = $_POST ['direccion'];
            $contrasena = $_POST ['password'];
            $contrasena2 = $_POST ['password2'];
            $puntosUsuario = 0;
            $tipoUsuario = 'usuario';
            $nivel = 'Básico';
        
         $consultacorreo = "SELECT correoUsuario,cedulaUsuario FROM Usuario WHERE correoUsuario = '$correoUsuario'";
         $ejecutarcorreo = sqlsrv_query($con, $consultacorreo);
         $correodb = sqlsrv_fetch_array($ejecutarcorreo);
         $correo = $correodb ['correoUsuario'];
         $cedula = $correodb ['cedulaUsuario'];
        
       if((empty($nombreUsuario))||(strlen($nombreUsuario) >15)||strlen($nombreUsuario) <3||is_numeric($nombreUsuario)){
            echo "<script>alert('Por favor, digite un nombre válido')</script>";
        }
        else 
         if($correo === $correoUsuario){
            echo "<script>alert('Este correo ya está registrado, por favor ingresa uno nuevo')</script>";
        }
        else 
         if((empty($primerApellido))||(strlen($primerApellido) >15)||strlen($primerApellido) <3||is_numeric($primerApellido)){
            echo "<script>alert('Por favor, digite un apellido válido')</script>";
        }
          else 
         if(empty($segundoApellido)||(strlen($segundoApellido) >15)||strlen($segundoApellido) <3||is_numeric($segundoApellido)){
            echo "<script>alert('Por favor, digite un apellido válido')</script>";
        }
        else
         if(empty($cedulaUsuario)||(ctype_alpha($cedulaUsuario))){
            echo "<script>alert('Por favor, digite una cedula válida')</script>";
        }
         else
         if(empty($correoUsuario)||!filter_var($correoUsuario, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Por favor, digite un correo válido')</script>";
        }
         else
         if(empty($telefono)||ctype_alpha(str_replace(' ', '', $telefono))|| strlen($telefono) >9||strlen($telefono) <5){
            echo "<script>alert('Por favor, digite un telefono válido')</script>";
        }
          else
         if(empty($direccion)|| strlen($direccion) >255||strlen($direccion) <5){
            echo "<script>alert('Por favor, digite una dirección válida')</script>";
        }
        else
         if(empty($contrasena)){
            echo "<script>alert('Por favor, digite una contraseña válida')</script>";
        }
            else
         if($contrasena!=$contrasena2){
            echo "<script>alert('Las contraseñas no coinciden, inténtenlo de nuevo')</script>";
        }           
        else{ 
                $insertar = "INSERT INTO Usuario(cedulaUsuario,nombreUsuario,primerApellido,segundoApellido,correoUsuario,direccion,telefono,contrasena,puntosUsuario,tipoUsuario,idnivel)
                VALUES ($cedulaUsuario, '$nombreUsuario','$primerApellido','$segundoApellido','$correoUsuario','$direccion','$telefono','$contrasena', $puntosUsuario, '$tipoUsuario', '$nivel')";

                $ejecutar = sqlsrv_query($con, $insertar);

                if($ejecutar){
                   echo"<script>alert('Datos Almacenados')</script>";
                    header("Location: login.php");
                    die();
                }
                else{
                    echo "error";
                }
                
            }
    }
           
                 
    
           
       
     
    
   
?>