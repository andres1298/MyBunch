<?php

    $serverName = 'localhost';
    $connectionInfo = array("Database"=>"MyBunch", "UID"=>"sa", "PWD"=>"1999", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo);
      

  $cedulaUsuario = json_decode(file_get_contents('SQL/txt/cedula.txt'));


    //PHP PARA AGREGAR EL BUNCH A EL CARRITO
        if(isset($_GET['agregarbunch'])){
            $add_bunch = $_GET['agregarbunch'];
            
            $consultabunch = "SELECT precio FROM Bunch WHERE (idBunch = '$add_bunch')";
            $ejecutarbunch = sqlsrv_query($con, $consultabunch);
            $filabunch = sqlsrv_fetch_array($ejecutarbunch);
            $preciobunch= $filabunch ['precio'];
            
            $addcompra = "INSERT INTO Compra VALUES (GETDATE(), '$preciobunch', 'Proceso', $cedulaUsuario)";
            $ejecutarcompra = sqlsrv_query($con, $addcompra);
            
            $consultacompra = "SELECT TOP 1 idCompra FROM Compra ORDER BY idCompra DESC";
            
            $ejecutarcom = sqlsrv_query($con, $consultacompra);
            //Se obtiene el valor del ID del Bunch
            $filacompra = sqlsrv_fetch_array($ejecutarcom);
            $idcompra = $filacompra ['idCompra'];
            
            $insertarbunchcompra = "INSERT INTO Bunch_Compra VALUES($add_bunch,$idcompra)";
            
            $ejecutarbunchcompra = sqlsrv_query($con, $insertarbunchcompra);
                
                if($ejecutarcom && $ejecutarbunchcompra){
                   echo "<script>alert('Bunch añadido a tu carrito!'); location.href = 'carrito.php'; </script>"; 
                }
         }
    
        //PHP PARA REALIZAR LA COMPRA DEL BUNCH DESDE EL CARRITO
         if(isset($_GET['comprar'])){
            $buy_bunch = $_GET['comprar'];
            //Se realiza la compra
            $buyit = "UPDATE Compra set estado = 'Completado' WHERE idCompra = '$buy_bunch'";
            $purchaseit = sqlsrv_query($con, $buyit);
            
             //Se le suman los puntos al Usuario por adquirir el Bunch
             
            $levelup = "SELECT puntosUsuario FROM Usuario, Nivel WHERE (nivel = idnivel) AND (cedulaUsuario = '$cedulaUsuario')";
            $ejecutarlevel = sqlsrv_query($con, $levelup);
            $puntos = sqlsrv_fetch_array($ejecutarlevel);
            $puntosuser = $puntos ['puntosUsuario'];
            
            $pointsgiven = "SELECT puntosotorgados FROM Bunch, Bunch_Compra, Compra WHERE (idBunch = idBunchRel) AND (idCompra = idCompraRel) AND (idCompra = $buy_bunch)";
            $ejecutarpoints = sqlsrv_query($con, $pointsgiven);
            $addpoints = sqlsrv_fetch_array($ejecutarpoints);
            $puntosbunch = $addpoints ['puntosotorgados'];
             
             $puntosusuario = $puntosbunch+$puntosuser;
             
             if($puntosusuario>=2500){
                 $nivel = 'Bunch Master';
             }
             else if($puntosusuario>=1500){
                 $nivel = 'Diamante';
             }
              else if($puntosusuario>=750){
                 $nivel = 'Platino';
             }
              else if($puntosusuario>=300){
                 $nivel = 'Oro';
             }
              else if($puntosusuario>=150){
                 $nivel = 'Plata';
             }
              else{
                 $nivel = 'Básico';
             }
            
             $getpoints = "UPDATE Usuario SET puntosUsuario = $puntosusuario, idnivel = '$nivel' WHERE cedulaUsuario = $cedulaUsuario";
            $ejecutaradd = sqlsrv_query($con, $getpoints);
             
            if($purchaseit && $ejecutaradd){
                echo "<script> location.href = 'payment/index.html'; </script>"; 
                
            }
         }
               
?>

