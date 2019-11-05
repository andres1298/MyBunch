<?php

    $serverName = 'localhost';
    $connectionInfo = array("Database"=>"MyBunch", "UID"=>"sa", "PWD"=>"1999", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo);
      



        if(isset($_GET['editarproducto'])){
            $editar_producto = $_GET['editarproducto'];
            
            $consultaprod = "SELECT idProducto,nombreProducto,descripcion,tipo from Producto,TipoProducto where (idtipo = idTipoProducto) and (idProducto = '$editar_producto')";
                
            $ejecutarprod = sqlsrv_query($con, $consultaprod);
            
            $filaprod = sqlsrv_fetch_array($ejecutarprod);
            
            $idproducto = $filaprod ['idProducto'];
            $nombreproducto = $filaprod ['nombreProducto'];                     
            $descripcionproducto = $filaprod ['descripcion'];
            $tipoproducto = $filaprod ['tipo'];
         }
               
?>


            
        

            <div style="margin-left:200px;" class="col-md-8 animate-box text-center">
					<h3 style="font-family: Walkway; font-size: 30px;">Modificar <span style="font-family: Another Day in Paradise;  font-size: 55px;">Producto</span></h3>
                    
					<form method="POST" action="">
                        
                          <!--NOMBRE DEL PRODUCTO -->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" name="nombreproducto" class="form-control" value="<?php echo $nombreproducto;?>">
							</div>
						</div>
                        
                         <!--DESCRIPCION DEL PRODUCTO -->
                         <div class="row form-group">
							<div class="col-md-12">
								<input  name="descripcionproducto" class="form-control" value="<?php echo $descripcionproducto;?>">
							</div>
						</div>
                        
                        <!-- Tipo del Producto-->
                        <div class="row form-group">
							<div class="col-md-12">
								<select name="tipoproducto" class="form-control">
                                     <option value="<?php echo $tipoproducto;?>"><?php echo $tipoproducto;?></option>
                                     <option value="1">Medicamento</option>
                                     <option value="2">Medicina Adicional</option>
                                     <option value="3">Alimento</option>
                                     <option value="4">Cuidado Personal</option>
                                     <option value="5">Artículo Bonus</option>
                                </select>
							</div>
						</div>
                        
                       
                        
						<div style="margin-bottom:50px;" class="form-group text-center">
							<input name="actualizarprod" type="submit" value="Actualizar Producto" class="btn btn-primary">
						</div>

					</form>		
				</div>

<?php

    if(isset($_POST['actualizarprod'])){
            
            $update_nombreproducto = $_POST['nombreproducto'];
            $update_descripcionproducto = $_POST['descripcionproducto'];
            $update_tipoproducto = $_POST['tipoproducto'];
            
            $consultaprod = "UPDATE Producto SET nombreProducto = '$update_nombreproducto', descripcion = '$update_descripcionproducto', idtipo = '$update_tipoproducto' WHERE idProducto = $editar_producto";
                
            $ejecutarprod = sqlsrv_query($con, $consultaprod);
            
           if($ejecutarprod){
               echo "<script>alert('Datos Actualizados'); location.href = 'controlpanel.php'; </script>"; 
                
               
           }
         
   
 }
               
?>