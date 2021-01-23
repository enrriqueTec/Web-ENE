<?php 

	
	include "conexion.php";
	$conexion=conexion();
	$ncirugia=htmlspecialchars($_POST['txt_Nombre_Cirugia']);
	echo $ncirugia;
	$fecha=htmlspecialchars($_POST['txt_Fecha_Cirugia']);
	$cirujano=htmlspecialchars($_POST['txt_Cirujano']);
	$anestesiologo=htmlspecialchars($_POST['txt_Anest']);
	$enf1=htmlspecialchars($_POST['txt_Enf1']);
	$enf2=htmlspecialchars($_POST['txt_Enf2']);
	$enf3=htmlspecialchars($_POST['txt_Enf3']);
	$sala=htmlspecialchars($_POST['txt_Sala']);
	$hinicio=htmlspecialchars($_POST['txt_hr_inicio']);
	$hfin=htmlspecialchars($_POST['txt_hr_fin']);

        $sql="INSERT INTO cirugia(nombre,fecha,cirujano,anestesiologo,enf_instrume,enf_circulan1,enf_circulan2,sala,hora_inicio,hora_fin)
								values (?,?,?,?,?,?,?,?,?,?)";

		$stm=$conexion->prepare($sql);
          $stm->bindValue(1,$ncirugia);	
          $stm->bindValue(2,$fecha);
          $stm->bindValue(3,$cirujano);
          $stm->bindValue(4,$anestesiologo);
          $stm->bindValue(5,$enf1);
          $stm->bindValue(6,$enf2);
          $stm->bindValue(7,$enf3);
		   $stm->bindValue(8,$sala);	
		   $stm->bindValue(9,$hinicio);
           $stm->bindValue(10,$hfin);					
	echo $result=$stm->execute();

 ?>