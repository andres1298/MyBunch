<?php

    $serverName = 'localhost';
    $connectionInfo = array("Database"=>"MyBunch", "UID"=>"sa", "PWD"=>"1999", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo);
      



        if(isset($_GET['editarbunch'])){
            $editar_bunch = $_GET['editarbunch'];
            
            $consultabunch = "SELECT nombreBunch, nombrePadecimiento,idPadecimiento FROM Bunch,Padecimiento WHERE  (idPadecimiento = Padecimiento) AND (idBunch = '$editar_bunch')";
                
            $ejecutarbunch = sqlsrv_query($con, $consultabunch);
            
            $filabunch = sqlsrv_fetch_array($ejecutarbunch);
            
             $nombrebunch = $filabunch ['nombreBunch'];
             $padecimiento = $filabunch ['nombrePadecimiento'];
             $idpadecimiento = $filabunch ['idPadecimiento'];
             
         }
               
?>


            
        
<!--FORM NUEVO BUNCH-->
				<div style="margin-left:300px;" class="col-md-6 animate-box text-center">
					<h3 style="font-family: Walkway; font-size: 30px;">Modificar <span style="font-family: Another Day in Paradise;  font-size: 55px;">Bunch</span></h3>
                    
					<form  method="POST" action="">

                        <!-- NOMBRE DEL BUNCH-->
                        <div class="row form-group">
							<div class="col-md-12">
								<input type="text" name="nombrebunch" class="form-control" value="<?php echo $nombrebunch;?>">
							</div>
						</div>
                        
                        <!--PRECIO DEL BUNCH-->
                        <div class="row form-group">
							<div class="col-md-12">
                                <select name="precio" class="form-control">
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
                                     <option value="<?php echo $idpadecimiento;?>"><?php echo $padecimiento;?></option>
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
              
                        
                        
						<div style="margin-bottom:50px;" class="form-group text-center">
							<input name="updatebunch" type="submit" value="Agregar Bunch" class="btn btn-primary">
						</div>

					</form>		
				</div>

<?php

    if(isset($_POST['updatebunch'])){
            
            //Se  obtienen las varibles mediante el POST
                $nombrebunch = $_POST['nombrebunch'];
                $preciobunch = $_POST['precio'];
                $padecimientobunch = $_POST['padecimiento'];
                if($preciobunch == '$10'){$puntosotorgados=10;}else if($preciobunch == '$20'){$puntosotorgados=40;}else if($preciobunch == '$30'){$puntosotorgados=120;}else if($preciobunch == '$40'){$puntosotorgados=240;}else if($preciobunch == '$50'){$puntosotorgados=400;}
                
                //Primero se agregan los datos al Bunch
                $updatebunch = "UPDATE Bunch SET nombreBunch = '$nombrebunch', precio = '$preciobunch', puntosotorgados = $puntosotorgados, Padecimiento = $padecimientobunch WHERE idBunch = $editar_bunch";
                
               
                $ejecutarbunch = sqlsrv_query($con, $updatebunch);
            
                if($ejecutarbunch){
               //echo"<script>alert('Datos Actualizados')</script>";
               echo "<script>alert('Datos Actualizados'); location.href = 'controlpanel.php'; </script>";  
               
           }
   
 }
               
?>