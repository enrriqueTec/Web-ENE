
<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();
$sql="SELECT * from cirugia";
 ?>
<div class="row">
    <div class="col-sm-12">
        <center>
            <h2>Cirugías</h2>
        </center>
        <caption>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                Agregar cirugía
                <span class="glyphicon glyphicon-plus"></span>
            </button>
        </caption>
        <div class="table-responsive" style="box-shadow: 3px 10px 5px gray;">
      
            <table class="table table-hover table-condensed table-bordered table-ligth table-striped-dark">

                <tr class="bg-primary">
                <td>id Cirugia</td>
                    <td>Nombre</td>
                    <td>Fecha</td>
                    <td>Cirujano</td>
                    <td>Anestesiólogo</td>
                    <td>Enf. Intrume</td>
                    <td>Enf. Circulan</td>
                    <td>Enf. Circulan</td>
                    <td>Sala</td>
                    <td>Hora inicio</td>
                    <td>Hora fin</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
            
                <?php 
              if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){

						$idp=$_SESSION['consulta'];
                        $stm=$conexion->prepare("SELECT * from cirugia where id_cirugia=?");
                        $stm->bindValue(1,$idp);
                        
                    }else{
						
                         $stm=$conexion->prepare($sql);
                       
					}
				    }else{
					
                     $stm=$conexion->prepare($sql);
                        
				}
					$result=$conexion->query($sql);
                    $stm->execute();
				while ($ver=$stm->fetch()){ 

                    $datos=$ver[0]."||".
                           $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5]."||".
						   $ver[6]."||".
                           $ver[7]."||".
                           $ver[8]."||".
                           $ver[9]."||".
                           $ver[10];
                
			 ?>

                <tr>
                    <td><?php echo $ver[0] ?></td>
                    <td><?php echo $ver[1] ?></td>
                    <td><?php echo $ver[2] ?></td>
                 <!--//////////////////////////////////////////////////////////////////////////////////////// -->
                    <?php 
                 $c="SELECT nombre, primer_ap, segundo_ap from doctores where id_doctor='$ver[3]'";
                $cirujano=$conexion->query($c);
               
                foreach ($cirujano as $val):
                
                ?>
                    <td><?php echo $val[0]." ".$val[1]." ".$val[2] ?></td>
                    <?php endforeach; ?>

                 <!--//////////////////////////////////////////////////////////////////////////////////////// -->
                    <?php 
                 $an="SELECT nombre, primer_ap, segundo_ap from doctores where id_doctor='$ver[4]'";
                $anestesiologo=$conexion->query($an);
               
                foreach ($anestesiologo as $ane):
                
                ?>
                     <td><?php echo $ane[0]." ".$ane[1]." ".$ane[2] ?></td>
                    <?php endforeach; ?>
                <!--//////////////////////////////////////////////////////////////////////////////////////// -->
                <?php 
                 $enf1="SELECT nombre, primer_ap, segundo_ap from enfermero where id_enfermero='$ver[5]'";
                $enfermero1=$conexion->query($enf1);
               
                foreach ($enfermero1 as $ef1):
                
                ?>
                     <td><?php echo $ef1[0]." ".$ef1[1]." ".$ef1[2] ?></td>
                    <?php endforeach; ?>
                
                 <!--//////////////////////////////////////////////////////////////////////////////////////// -->
                 <?php 
                 $enf2="SELECT nombre, primer_ap, segundo_ap from enfermero where id_enfermero='$ver[6]'";
                $enfermero2=$conexion->query($enf2);
               
                foreach ($enfermero2 as $ef2):
                
                ?>
                     <td><?php echo $ef2[0]." ".$ef2[1]." ".$ef2[2] ?></td>
                    <?php endforeach; ?>

                <!--//////////////////////////////////////////////////////////////////////////////////////// -->
                <?php 
                 $enf3="SELECT nombre, primer_ap, segundo_ap from enfermero where id_enfermero='$ver[5]'";
                $enfermero3=$conexion->query($enf3);
               
                foreach ($enfermero3 as $ef3):
                

                    
                ?>
                     <td><?php echo $ef3[0]." ".$ef3[1]." ".$ef3[2] ?></td>
                    <?php endforeach; ?>

                 <!--//////////////////////////////////////////////////////////////////////////////////////// -->
                    <td><?php echo $ver[8] ?></td>
                    <td><?php echo $ver[9] ?></td>
                    <td><?php echo $ver[10] ?></td>
				
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>