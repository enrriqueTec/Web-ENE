
<?php 
	session_start();

	require_once "conexion.php";
	$conexion=conexion();
	$id_cirugia=$_POST['id_cirugia'];

	$sql="DELETE from cirugia where id_cirugia=?";
	
		$stm=$conexion->prepare($sql);
          $stm->bindValue(1,$id_cirugia);	
         					
	echo $result=$stm->execute();
 ?>