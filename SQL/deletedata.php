
<?php
    
    $serverName = 'localhost';
    $connectionInfo = array("Database"=>"MyBunch", "UID"=>"sa", "PWD"=>"1999", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo);
    

            ///////////////////////
            //  BORRAR PRODUCTO
            ///////////////////////

              if(isset($_GET['borrarproducto'])){
                    $borrar_producto = $_GET['borrarproducto'];

                    $borrarprod = "DELETE FROM Producto WHERE (idProducto = '$borrar_producto')";

                    $ejecutarprod = sqlsrv_query($con, $borrarprod);


                    if($ejecutarprod){
                        echo "<script>alert('Registro Borrado')</script>";
                    }
                 }



            ///////////////////////
            //  BORRAR USUARIO
            ///////////////////////

              if(isset($_GET['borrarusuario'])){
                    $borrar_usuario = $_GET['borrarusuario'];

                    $borraruser = "DELETE FROM Usuario WHERE (cedulaUsuario = '$borrar_usuario')";

                    $ejecutaruser = sqlsrv_query($con, $borraruser);


                    if($ejecutaruser){
                        echo "<script>alert('Registro Borrado')</script>";
                    }
                 }


            ///////////////////////
            //  BORRAR BUNCH
            ///////////////////////

              if(isset($_GET['borrarbunch'])){
                    $borrar_bunch = $_GET['borrarbunch'];

                    $borrarbunch = "DELETE FROM Bunch WHERE (idBunch = '$borrar_bunch')
                                    DELETE FROM Bunch_Producto WHERE idBunchRel = '$borrar_bunch'";

                    $ejecutarbunch = sqlsrv_query($con, $borrarbunch);


                    if($ejecutarbunch){
                        echo "<script>alert('Registro Borrado')</script>";
                    }
                 }


            
            ///////////////////////
            // BORRAR DEL CARRITO
            ///////////////////////

              if(isset($_GET['borrarcarrito'])){
                    $borrar_carrito = $_GET['borrarcarrito'];

                    $borrarcar = "DELETE FROM Compra WHERE (idCompra = '$borrar_carrito')
                                      DELETE FROM Bunch_Compra WHERE idBunchRel = '$borrar_carrito'";

                    $ejecutarborrado = sqlsrv_query($con, $borrarcar);


                    if($ejecutarborrado){
                        echo "<script>alert('Bunch eliminado de tu Carrito'); location.href = 'carrito.php'; </script>"; 
                    }
                 }

?>