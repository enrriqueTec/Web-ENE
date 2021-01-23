<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id_cirugia=$_POST['id_cirugia_up'];
	$txt_Nombre_Cirugia=$_POST['txt_Nombre_Cirugia_up'];
	$txt_Fecha_Cirugia=$_POST['txt_Fecha_Cirugia_up'];
	$txt_Cirujano=$_POST['txt_Cirujano_up'];
	$txt_Anest=$_POST['txt_Anest_up'];
	$txt_Enf1=$_POST['txt_Enf1_up']:
	$txt_Enf2=$_POST['txt_Enf2_up']:
	$txt_Enf3=$_POST['txt_Enf3_up'];
	$txt_Sala=$_POST['txt_Sala_up'];
	$txt_hr_inicio=$_POST['txt_hr_inicio_up'];
	$txt_hr_fin=$_POST['txt_hr_fin_up'];

	$sql="UPDATE cirugia set nombre=?, fecha=?, cirujano=?, anestesiologo=?, enf_instrume=?, enf_circula1=?, enf_circulan2=?, sala=?, hora_inicio=?, hora_fin=?  where id_cirugia=?";
	$stm=$conexion->prepare($sql);
          $stm->bindValue(1,$txt_Nombre_Cirugia);	
          $stm->bindValue(2,$txt_Fecha_Cirugia);
          $stm->bindValue(3,$txt_Cirujano);
          $stm->bindValue(4,$txt_Anest);
          $stm->bindValue(5,$txt_Enf1);
          $stm->bindValue(6,$txt_Enf2);
          $stm->bindValue(7,$txt_Enf3);
          $stm->bindValue(8,$txt_Sala);
          $stm->bindValue(9,$txt_hr_inicio);
          $stm->bindValue(10,$txt_hr_fin);
          $stm->bindValue(11,$id_cirugia);					
	echo $result=$stm->execute();

 ?>